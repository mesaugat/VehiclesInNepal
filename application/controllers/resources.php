<?php 
	class Resources extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('resource');
			$this->load->helper('form');
		}

		function index() {
			$page['pageTitle'] = 'Download Resources';
			$this->load->view('header', $page);
			$this->load->view('resource_index');
			$this->load->view('footer');
		}

		function json() {
			if ($this->input->post()) {
				$table = $this->input->post('table');
				if (empty($table)) {
					redirect('/resources');
				} else {
					$file = FCPATH . 'public/jsonp/' . $table . '.json';
					$this->_downloadfile($file, $table);
					// redirect('../public/jsonp/' . $table . '.json');
				}
				/* HighCharts JSON
					$index = 1;
					$table = $this->input->post('table');
					$query = $this->resource->get_table($table);
					$col_count = $this->resource->get_num_fields($table);	// number of fields in the table
					$field = $this->resource->get_fields($table);
					$result = array();
					for ($index=1; $index < $col_count; $index++) {
						$series[$index]['name'] = $field[$index]; 	// field name
						foreach ($query as $values) {
							$key = array_keys($values);		// associative array index
							$series[$index]['data'][] = $values[$key[$index]];
						}
						array_push($result, $series[$index]);
					}

					$file = FCPATH . 'public/json/' . $table . '.json';		// FCPATH => '/'
					$handle = fopen($file, 'w');
					$json = json_encode($result, JSON_NUMERIC_CHECK);
					file_put_contents($file, $json);		// put json into a file
					$this->_downloadfile($file, $table);
					$handle = fclose($handle);
					$this->output->set_output($json);	
				*/	
			} else {
				$this->load->view('header');
				$this->load->view('error_index');
				$this->load->view('footer');
			}
		// end of function
		}

		function xml() {
			if ($this->input->post()) {
				$table = $this->input->post('table');
				if (empty($table)) {
					redirect('/resources');
				} else {
					$table = $this->input->post('table');
					$file = FCPATH . 'public/xml/' . $table . '.xml';
					$this->_downloadfile($file, $table);
				}
				//redirect('../public/xml/' . $table . '.xml');

				/* XML Creation
					$table = $this->input->post('table');
					$result = $this->resource->get_table_object($table);
					// load dbutil()
					$this->load->dbutil();
					$config = array (
									'root' => 'result',
									'element' => 'row',
									'newline' => "\n",
									'tab' => "\t"
								);
					$XML = $this->dbutil->xml_from_result($result, $config);
					$file = FCPATH . 'public/xml/' . $table . '.xml';
					$handle = fopen($file, 'w');
					file_put_contents($file, $XML);		// put xml contents to file
					$this->_downloadfile($file, $table);	// download xml
					fclose($handle);
				
					$this->output->set_content_type('text/xml; charset=utf-8');
					$this->output->set_output($XML);
				*/
			} else {
				$this->load->view('header');
				$this->load->view('error_index');
				$this->load->view('footer');
			}
		}	// end of function

		function csv() {
			if ($this->input->post()) {
				$table = $this->input->post('table');
				if (empty($table)) {
					redirect('/resources');
				} else {
					$file = FCPATH . 'public/csv/' . $table . '.csv';	// file location
					$this->_downloadfile($file, $table);
				}
				/* CSV Creation
					$result = $this->resource->get_table_object($table);
					$this->load->dbutil();
					$delimiter = ",";
					$newline = "\r\n";
					$result = $this->dbutil->csv_from_result($result, $delimiter, $newline);
					$file = FCPATH . 'public/csv/' . $table . '.csv';	// file location
					$handle = fopen($file, 'w');
					file_put_contents($file, $result);
					fclose($handle);
					$this->_downloadfile($file, $table);
				*/
			} else {
				$this->load->view('header');
				$this->load->view('error_index');
				$this->load->view('footer');
			}
		}	// end of function

		function generate_table() {
			if ($this->input->post()) {
				$table = $this->input->post('table');
				$result = $this->resource->get_table_object($table);
				// Table Library
				$this->load->library('table');
				echo $this->table->generate($result);
			} else {
				$this->load->view('header');
				$this->load->view('error_index');
				$this->load->view('footer');
			}
		}

		function dynamic_json() {
			if ($this->input->post()) {
				$year = $this->input->post('year');
				$results = $this->resource->get_vehicle_numbers($year);
				$col_count = $this->resource->get_num_fields('vehicle_numbers');
				// for ($index=1; $index < $col_count; $index++) {
				// 	foreach ($results as $values) {
				// 		$key = array_keys($values);
				// 		if ($index == 1) {
				// 			$series['name'] = 'Vehicles';		// Vehicles is stored as name for the series
				// 		}
				// 		$series['data'][] = $values[$key[$index]];
				// 	}
				// }
				// $result = array();
				// array_push($result, $series);
				$json = array();
				for ($index=1; $index < $col_count; $index++) {
					foreach ($results as $result) {
						$key = array_keys($result);
						$row[0] = $key[$index];
						$row[1] = $result[$key[$index]];
						array_push($json, $row);
					}
				}
				echo json_encode($json, JSON_NUMERIC_CHECK);
			} else {
				$this->load->view('header');
				$this->load->view('error_index');
				$this->load->view('footer');
			}
		}
		
		private function _downloadfile($file, $table) {
			if (file_exists($file)) {
				header('Content-Description: File Transfer');
				header('Content-Type: text/' . $table .'; name=' . $table . '.' . pathinfo($file, PATHINFO_EXTENSION));
				header('Content-Disposition: attachment; filename=' . $table . '.' . pathinfo($file, PATHINFO_EXTENSION));
				ob_clean();		// erase the output buffer
        		flush();		// flushes the write buffers of PHP, attempts to push current output all the way to the browser
       			readfile($file);	// output the file - download
       			exit();
			}
		}	// end of function
	
	} 	// end of class
?>
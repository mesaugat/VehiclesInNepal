<?php  
	class Vehicles extends CI_Controller {
		function __construct()
		{
			parent::__construct();
		}

		function index() {
			$page['year'] = $this->_year();		// Get year for dropdown in the view
			$this->load->helper('form');
			$page['pageTitle'] = 'Vehicle Statistics';
			$this->load->view('header', $page);
			$this->load->view('vehicle_index', $page);
			$this->load->view('footer');
		}

		private function _year() {
			$this->load->model('resource');
			$table = 'vehicle_numbers';
			$year = $this->resource->get_year($table);
			foreach ($year as $result) {
				$output[$result->year] = $result->year;
			}
			return $output;
		}
	}
?>
<?php 
	class Errors extends CI_Controller {
		public function __construct() {
			parent::__construct();
		}

		public function index() {
			$page['pageTitle'] = 'Error 404';
			$this->output->set_status_header(404);
			$this->load->view('header', $page);
			$this->load->view('error_index');
			$this->load->view('footer');
		}
	}
?>
<?php  
	class Accidents extends CI_Controller {
		function __construct()
		{
			parent::__construct();
		}

		function index() {
			$page['pageTitle'] = 'Accident Statistics';
			$this->load->view('header', $page);
			$this->load->view('accident_index');
			$this->load->view('footer');
		}
	}
?>
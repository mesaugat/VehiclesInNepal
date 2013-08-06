<?php  
	class Vehicles extends CI_Controller {
		function __construct()
		{
			parent::__construct();
		}

		function index() {
			$this->load->helper('form');
			$page['pageTitle'] = 'Vehicle Statistics';
			$this->load->view('header', $page);
			$this->load->view('vehicle_index');
			$this->load->view('footer');
		}
	}
?>
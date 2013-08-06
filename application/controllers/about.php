<?php  
	class About extends CI_Controller {	
		function __construct()
		{
			parent::__construct();
		}

		function index() {
			$page['pageTitle'] = 'About';
			$this->load->view('header', $page);
			$this->load->view('about_index');
			$this->load->view('footer');
		}
	}
?>
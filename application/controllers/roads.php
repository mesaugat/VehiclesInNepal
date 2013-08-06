<?php  
	class Roads extends CI_Controller {
		function __construct()
		{
			parent::__construct();
		}

		function index() {
			$page['pageTitle'] = 'Road Statistics';
			$this->load->view('header', $page);
			$this->load->view('road_index');
			$this->load->view('footer');
		}
	}
?>
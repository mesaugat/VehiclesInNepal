<?php  
	class Contact extends CI_Controller {
		function __construct()
		{
			parent::__construct();
		}

		function index() {
			if ($this->input->post()) {
				// Email Validation
				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');				
				if ($this->form_validation->run() == TRUE) {
					// Email SMTP
					$config = array(
								'protocol' => 'smtp',
								'smtp_host' => 'smtp.wlink.com.np',
								'wordwrap' => TRUE,
								'wrapchars' => 95,
								'mailtype' => 'text',
								'charset' => 'utf-8',
								'validate' => TRUE,
								'crlf' => "\r\n",
								'newline' => "\r\n"
							);
					
					$this->load->library('email');
					$this->email->initialize($config);

					$name = $this->input->post('name');
					$email = $this->input->post('email');
					$message = $this->input->post('message');

					$this->email->from($email, $name);
					$this->email->to('acharya_saugat@hotmail.com');
					//$this->email->cc('trpansh1989@gmail.com');
					$this->email->subject('Message - Vehicles In Nepal');
					$this->email->message($message);	

					$this->email->send();

					$alert['success'] = 'Thank you! Your message has been recieved.';
				} else {
					$alert['error'] = validation_errors();
				}
			} 
			$page['pageTitle'] = 'Contact';
			$this->load->view('header', $page);
			if (isset($alert)) {
				$this->load->view('contact_index', $alert);
			} else {
				$this->load->view('contact_index');
			}
			$this->load->view('footer');	

		} // end of function

	}	// end of class
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->model('user_management');

         $this->load->library('form_validation');

         if($this->session->userdata('isLoggedIn') ) {
		        redirect('lands');
		    } 

		    $data = array(
			"lang" => "english"
			);
			$this->session->set_userdata($data);
			$language = $this->session->userdata('lang');
    }
	public function index()
	{

		$this->load->view('login');
		
	}

	public function login_user()
	{

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('login');
            }
            else
            {
		        $username = $this->input->post('username');
				$password = $this->input->post('password');

				$salted_pass = $this->salt_pass($password);
		        $result = $this->user_management->check_user($username, $salted_pass);
		        if($result == true)
		        	redirect('Dashboard');
		        else
		        	redirect('login');
            }
		
	}

	public function salt_pass($pass)
	{
		return md5($pass);
	}

}

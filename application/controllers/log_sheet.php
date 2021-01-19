<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_sheet extends CI_Controller {

	public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->model('user_management');
        $this->load->model('land_management');

        $language = $this->session->userdata('lang');
		$this->lang->load('log', $language);

         if(!$this->session->userdata('isLoggedIn') ) {
		        redirect('login');
		    } 
    }

	public function index()
	{
		if($this->session->userdata('role') != 3 && $this->session->userdata('role') != 1) {
		        redirect('lands');
		  }
		$this->list_logs();
		
	}


	public function list_logs()
	{
		if($this->session->userdata('role') != 3 && $this->session->userdata('role') != 1) {
		        redirect('lands');
		  }
		  
		$data['log_data'] = $this->land_management->get_logs();
		$data['login_data'] = $this->land_management->get_loginLogs();
		$data['title'] = "logs";
		$this->load->view('logs', $data);
	
	}

}

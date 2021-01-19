<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class block extends CI_Controller {

	public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->model('user_management');
        $this->load->model('land_management');
		$language = $this->session->userdata('lang');
		$this->lang->load('woreda', $language);
         if(!$this->session->userdata('isLoggedIn') ) {
		        redirect('login');
		    } 
    }

	public function index()
	{
		$this->list_blocks();
		
	}


	public function list_blocks()
	{
		$data['block_data'] = $this->land_management->get_block();
			$data['title'] = "woreda";
		$this->load->view('block2', $data);
		
	}

	public function get_block()
	{
		$block_data = $this->land_management->get_block();
		echo json_encode($block_data);
		
	}

	public function add_block()
	{
		$title = $this->input->post('title');
		$woreda_id = $this->input->post('woreda_id');

		$result = $this->land_management->add_block2($title, $woreda_id);
		if($result)
		  echo true;
		else
		  echo false;
	}

	public function view_block($id=null)
	{
	 if($id == null)
	 $id = $this->input->post('view_id');

     $block_data = $this->land_management->get_block($id);
     echo json_encode($block_data);
	}

	public function edit_block()
	{
		
	
		$id = $this->input->post('edit_id');
		$woreda = $this->input->post('woreda');
		$title = $this->input->post('title');

		$result = $this->land_management->edit_block($id, $woreda, $title);
		if($result)
		  echo true;
		else
		  echo false;
	
	}

	public function delete_block()
	{
		
	}
}

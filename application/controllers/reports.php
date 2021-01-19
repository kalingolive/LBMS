<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->model('user_management');
        $this->load->model('land_management');

        $language = $this->session->userdata('lang');
		$this->lang->load('report', $language);

         if(!$this->session->userdata('isLoggedIn') ) {
		        redirect('login');
		    } 
    }

	public function index()
	{
		$this->list_report();
		
	}


	public function list_report()
	{
		
		$data['title'] = "Report";
		$this->load->view('report', $data);
		
	}

	public function get_dashboard()
	{
		$data['land_data'] = $this->land_management->get_land();
		$data['transfer_data'] = $this->land_management->get_transfer_size();
		$data['transfer_type'] = $this->land_management->get_transfer_type();
		$data['land_type'] = $this->land_management->get_land_byType();
		echo json_encode($data);
		
	}

	public function add_woreda()
	{
		$title = $this->input->post('title');
		$desc = $this->input->post('description');

		$result = $this->land_management->add_woreda($title, $desc);
		if($result)
		  echo true;
		else
		  echo false;
	}

	public function view_woreda($id=null)
	{
	 if($id == null)
	 $id = $this->input->post('view_id');

     $woreda_data = $this->land_management->get_woreda($id);
     echo json_encode($woreda_data);
	}

	public function edit_woreda()
	{
		$id = $this->input->post('edit_id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');

		$result = $this->land_management->edit_woreda($id, $title, $description);
		echo $result;
	}

	public function delete_woreda()
	{
	 if($id == null)
     $id = $this->input->post('delete_id');

     $result = $this->land_management->delete_woreda($id);
     echo $result;
	}
}
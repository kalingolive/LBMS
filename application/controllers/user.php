<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->model('user_management');
        $this->load->model('land_management');

        $language = $this->session->userdata('lang');
		$this->lang->load('user', $language);

      if(!$this->session->userdata('isLoggedIn') ) {
		        redirect('login');
		    }     
    }


	public function index()
	{
		if($this->session->userdata('role') != 3 && $this->session->userdata('role') != 2) {
		        redirect('lands');
		  }
		$this->list_users();
	}

	public function list_users()
	{
		if($this->session->userdata('role') != 3 && $this->session->userdata('role') != 2) {
		        redirect('lands');
		  }
		$data['user_data'] = $this->user_management->get_user();
		$data['controller'] = $this;
		//$data['transfer_data'] = $this->land_management->get_transfer_size();
		$data['title'] = "users";
		$this->load->view('users', $data);
	}

	public function view_user($id=null)
	{
		if($this->session->userdata('role') != 3 && $this->session->userdata('role') != 2) {
		        redirect('lands');
		  }

	 if($id == null)
	 $id = $this->input->post('view_id');

     $user_data = $this->user_management->get_user($id);
     echo json_encode($user_data);
	}

	public function add_user()
	{
		if($this->session->userdata('role') != 3 && $this->session->userdata('role') != 2) {
		        redirect('lands');
		  }

		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$username = $this->input->post('uname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$sex = $this->input->post('sex');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$status = $this->input->post('status');

		if(isset($_FILES['profile_image']))
		 {
		 	$img_src = 'uploads/users/profile/' . 	$username.'-'.$email.'.jpg';
		 }
		 else
		 	$img_src = '';

		$result = $this->user_management->add_user($fname, $lname, $username, $email, $phone, $sex, $password, $role, $status, $img_src);
		
		if($result)
		{
			move_uploaded_file($_FILES['profile_image']['tmp_name'], 
								'uploads/users/profile/' . 	$username.'-'.$email.'.jpg');
			echo true;
		}
		else
			echo false;
	}

	public function edit_user()
	{
		if($this->session->userdata('role') != 3 && $this->session->userdata('role') != 2) {
		        redirect('lands');
		  } 

		$id = $this->input->post('user_id');
		$fname = $this->input->post('fname_edit');
		$lname = $this->input->post('lname_edit');
		$username = $this->input->post('uname_edit');
		$email = $this->input->post('email_edit');
		$phone = $this->input->post('phone_edit');
		$sex = $this->input->post('sex_edit');
		$password = $this->input->post('password_edit');
		$role = $this->input->post('role_edit');
		$status = $this->input->post('status_edit');

		if(isset($_FILES['profile_image_edit']))
		 {
		 	$img_src = 'uploads/users/profile/' . 	$username.'-'.$email.'.jpg';
		 }
		 else
		 	$img_src = '';

		$result = $this->user_management->edit_user($id, $fname, $lname, $username, $email, $phone, $sex, $password, $role, $status, $img_src);
		
		if($result)
		{
			move_uploaded_file($_FILES['profile_image_edit']['tmp_name'], 
								'uploads/users/profile/' . 	$username.'-'.$email.'.jpg');
			echo json_encode(TRUE);
		}
		else
			echo json_encode(FALSE);
	}

	public function delete_user($id=null)
    {
    	if($this->session->userdata('role') != 3 && $this->session->userdata('role') != 2) {
		        redirect('lands');
		  }

     if($id == null)
     $id = $this->input->post('delete_id');

     $result = $this->user_management->delete_user($id);
     echo $result;
    }

	public function view_profile($id = null)
	{
	  if($this->session->userdata('id') != $id) // if the user is trying to another user's profile
	  {
	  	if($this->session->userdata('role') != 3 ) // check if the user user is super administrator
	  	 $id = $this->session->userdata('id');
	  }
	 $data['user_data'] = $this->user_management->get_user($id);
	 $data['log_data'] = $this->land_management->get_logs($id);
	 $data['controller'] = $this;
	 $data['title'] = "Employee Profile";
	 //$data['transfer_data'] = $this->land_management->get_transfer_size();
	 $this->load->view('view_profile', $data);
     //echo json_encode($user_data);
	}

	public function change_pass()
	{
		$id = $this->input->post('edit_id');
		$old_pass = $this->input->post('old_password');
		$new_pass = $this->input->post('new_password');
		$result = $this->user_management->change_password($id, $old_pass, $new_pass);
        echo $result;
	}

	public function logout()
	{
		$this->user_management->logout();
	}


}

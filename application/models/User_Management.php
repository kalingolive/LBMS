<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Management extends CI_Model {

		function __construct()
		{

		    parent::__construct();
		    $this->load->database();
		    $this->load->library('session');
		}

    public function get_user($id = null)
    {
      if($id == null)
      {
       $query = $this->db->get('users');
       $result = $query->result();
       return $result;
      }
      else
      {
       $this->db->where('id', $id);
       $query = $this->db->get('users');
       $result = $query->result();
       return $result;
      }
      
    }

	public function check_user($username, $pass)
    {
        $this->db->where('user_name', $username);
        $this->db->where('password', $pass);
        $this->db->where('is_active', '1');
        $query = $this->db->get('users');

        if($query->num_rows() > 0)
        {
        	$result = $query->row();
        	$this->set_session($result->first_name,$result->last_name,$result->user_name, $result->id,$result->email,$result->role,$result->is_active, $result->img_src);
		    $ip_address = $this->get_client_ip();
            $data = array(
                       'last_login' => date('Y-m-d H:i:s'),
		               'last_ip' => $this->input->ip_address()
		            );

        	$this->db->update('users', $data, array('id' => $result->id));

          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Employee - User/Employee Login";
          $updated_data = "User/Employee";
          $privilage = $this->session->userdata('role');
          $detail = "User/employee with the name (".$result->first_name." ".$result->last_name.") and with email (".$result->email.") has signed in";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 4;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////

        	return true;
        }
        else
        	return false;
	}

    	public function set_session($fname,$lname,$uname,$id,$email,$role,$is_active, $img_src) {
        // session->set_userdata is a CodeIgniter function that
        // stores data in a cookie in the user's browser.  Some of the values are built in
        // to CodeIgniter, others are added (like the IP address).  See CodeIgniter's documentation for details.
        $this->session->set_userdata( array(
                'id'=>$id,
                'name'=> $fname . ' ' . $lname,
                'email'=>$email,
                'username'=>$uname,
                'role'=>$role,
                'is_active'=>$is_active,
                'img_src'=>$img_src,
                'isLoggedIn'=>true
            )
        );
       }

       public function add_user($fname, $lname, $username, $email, $phone, $sex, $password, $role, $status, $img_src)
        {
        
            $data = array(
              'first_name' => $fname,
              'last_name' => $lname,
              'user_name' => $username,
              'password' => $this->salt_pass($password),
              'email' => $email,
              'phone' => $phone,
              'sex' => $sex,
              'role' => $role,
              'is_active' => $status,
              'registered_on' => date('Y-m-d H:i:s'),
              'img_src' => $img_src
                );

            if($this->session->userdata('role') == 2 && ($role == 1 || $role == 3 || $role == 2)) //if employee
              {
                return FALSE;
                //die();
              }
              elseif($this->session->userdata('role') == 1 && ($role == 3)) //if admin
              {
                return FALSE;
                //die();
              }

            $result = $this->db->insert('users', $data);
            if($result)
            {
              ///////////////////////////////////////////////////////////////////////////////////////////
              ///////////////////////////  add the action to the log ///////////////////////////////////
              $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
              $action = "Employee - User/Employee registration";
              $updated_data = "User/Employee";
              $privilage = $this->session->userdata('role');
              $detail = "New user/employee with the name (".$fname." ".$lname.") and with email (".$email.") has been added (Registered)";
              $ip_address = $this->input->ip_address();
              $date = date('Y-m-d');
              $time = date('H:m:s');
              $level = 1;
              $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
              ///////////////////////////////////////////////////////////////////////////////////////////
              ///////////////////////////////////////////////////////////////////////////////////////////

              return TRUE;
            }
            
        }

        public function edit_user($id, $fname, $lname, $username, $email, $phone, $sex, $password, $role, $status, $img_src)
        {
          
            $data = array(
              'first_name' => $fname,
              'last_name' => $lname,
              'user_name' => $username,
              'password' => $this->salt_pass($password),
              'email' => $email,
              'phone' => $phone,
              'sex' => $sex,
              'role' => $role,
              'is_active' => $status,
              'img_src' => $img_src
                );
          
             $data = array_filter($data, function($value){
              return $value !== "";
             });

              $this->db->select('role');
              $this->db->where('id', $id);
              $query = $this->db->get('users');
              $result = $query->result();

             if($this->session->userdata('role') == 2 && ($result[0]->role == 1 || $result[0]->role == 3)) //if employee
              {
                return FALSE;
               // die();
              }
              if($this->session->userdata('role') == 1 && ($result[0]->role == 3)) //if admin
              {
                return FALSE;
               // die();
              }
              if($this->session->userdata('role') == 3 && $result[0]->role == 3) //if super admin
              {
                if($this->session->userdata('id') != $id)
                 return FALSE;
               // die();
              }
              if($this->session->userdata('role') == 1 && ($this->session->userdata('id') != $id))
              {
                if($result[0]->role == 2)
                {

                }
                else
                {
                   return FALSE;
                  //die(); 
                }
                
              }

            $this->db->set($data, FALSE);
            $this->db->where('id' , $id);
            $result = $this->db->update('users');
            if($result)
            {
              if($this->session->userdata('id') == $id )
              {
                $this->db->where('id', $id);
                $this->db->where('is_active', '1');
                $query = $this->db->get('users');

                if($query->num_rows() > 0)
                {
                $result = $query->row();
                $this->set_session($result->first_name,$result->last_name,$result->user_name, $result->id,$result->email,$result->role,$result->is_active, $result->img_src);
                }
              }

              ///////////////////////////////////////////////////////////////////////////////////////////
              ///////////////////////////  add the action to the log ///////////////////////////////////
              $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
              $action = "Employee - User/Employee Updation";
              $updated_data = "User/Employee";
              $privilage = $this->session->userdata('role');
              $detail = "User/employee with the name (".$fname." ".$lname.") and with email (".$email.") has been updated (Modified)";
              $ip_address = $this->input->ip_address();
              $date = date('Y-m-d');
              $time = date('H:m:s');
              $level = 2;
              $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
              ///////////////////////////////////////////////////////////////////////////////////////////
              ///////////////////////////////////////////////////////////////////////////////////////////
              return TRUE;
            }
            else
              return FALSE;
        }

        public function delete_user($id = null){
          if($this->session->userdata('id') == 3) // if super admin
          {
              if($this->session->userdata('id') == $id)
                return FALSE;
              else
              {
                  $this->db->select('role');
                  $this->db->where('id', $id);
                  $query = $this->db->get('users');
                  $result = $query->result();

                  if($result[0]->role == 3)
                   {
                     return FALSE;
                     die();
                   }
                 elseif($this->session->userdata('role') == 1 && ($this->session->userdata('id') != $id))
                  {
                    if($role == 2)
                    {

                    }
                    else
                    {
                      return FALSE;
                      die(); 
                    }
                    
                  }

                  $this->db->select('img_src');
                  $this->db->where('id', $id);
                  $query = $this->db->get('users');
                  $result = $query->result();

                  unlink($result[0]->img_src); //delete profile image

                  $this->db->where('id', $id);
                  $result = $this->db->delete('users');
                  if($result)
                  {
                    ///////////////////////////////////////////////////////////////////////////////////////////
                    ///////////////////////////  add the action to the log ///////////////////////////////////
                    $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
                    $action = "Employee - User/Employee Deletion";
                    $updated_data = "User/Employee";
                    $privilage = $this->session->userdata('role');
                    $detail = "User/employee with the id (".$id.") has been removed (Deleted)";
                    $ip_address = $this->input->ip_address();
                    $date = date('Y-m-d');
                    $time = date('H:m:s');
                    $level = 3;
                    $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
                    ///////////////////////////////////////////////////////////////////////////////////////////
                    ///////////////////////////////////////////////////////////////////////////////////////////
                    return TRUE;
                  }
                  else
                    return FALSE;
              }
          } 

          if($this->session->userdata('id') == 2) //if employee
          {
            return FALSE;
          }

          if($this->session->userdata('id') == 1) // if administrator
          {
            $this->db->select('role');
            $this->db->where('id', $id);
            $query = $this->db->get('users');
            $result = $query->result();

            if($result[0]->role == 2)
            {
              $this->db->select('img_src');
              $this->db->where('id', $id);
              $query = $this->db->get('users');
              $result = $query->result();

              unlink($result[0]->img_src); //delete profile image

              $this->db->where('id', $id);
              $result = $this->db->delete('users');
              if($result)
              {
                ///////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////  add the action to the log ///////////////////////////////////
                $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
                $action = "Employee - User/Employee Deletion";
                $updated_data = "User/Employee";
                $privilage = $this->session->userdata('role');
                $detail = "User/employee with the id (".$id.") has been removed (Deleted)";
                $ip_address = $this->input->ip_address();
                $date = date('Y-m-d');
                $time = date('H:m:s');
                $level = 3;
                $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
                ///////////////////////////////////////////////////////////////////////////////////////////
                ///////////////////////////////////////////////////////////////////////////////////////////
                return TRUE;
              }
              else
                return FALSE; 
            }
            elseif($this->session->userdata('id') == $id)
                return FALSE;
            else
                return FALSE;
          }
          
         }

       public function change_password($id, $old_pass, $new_pass)
       {

        $this->db->select('password');
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        $result = $query->result();
        if($result[0]->password == $this->salt_pass($old_pass))
        {
          $data = array(
          'password' => $this->salt_pass($new_pass),
            );
          $this->db->set($data, FALSE);
          $this->db->where('id' , $id);
          $result = $this->db->update('users');  
          if($result)
          {
            ///////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////  add the action to the log ///////////////////////////////////
            $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
            $action = "Employee - User/Employee Password Change";
            $updated_data = "User/Employee";
            $privilage = $this->session->userdata('role');
            $detail = "User/employee with the id (".$id.") has changed his/her password";
            $ip_address = $this->input->ip_address();
            $date = date('Y-m-d');
            $time = date('H:m:s');
            $level = 3;
            $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
            ///////////////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////////////
            return TRUE;
          }
          else
            return FALSE;
        }
        else
            return FALSE;
       }

	   public function logout()
		{
		    $newdata = array(
            'id'=>'',
            'name'=> '',
            'email'=> '',
            'username'=> '',
            'is_active'=> '',
            'isLoggedIn'=>false
               );

           $this->session->set_userdata($newdata);
           redirect('login');
		}

        // Function to get the client ip address
    public function get_client_ip() {
        $ipString = @getenv("HTTP_X_FORWARDED_FOR"); 
         $addr     = explode(",",$ipString); 
        return $addr[sizeof($addr)-1];
    }

    public function salt_pass($pass)
    {
        if($pass == "")
            return "";
        else
        return md5($pass);
    }

    public function add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level)
    {
      $data = array(
        'user_id' => $this->session->userdata('id'),
          'user' => $user,
          'action' => $action,
          'updated_data' => $updated_data,
          'detail' => $detail,
          'privilage' => $privilage,
          'ip_address' => $ip_address,
          'date' => $date,
          'time' => $time,
          'level' => $level,
            );

        $result = $this->db->insert('log_sheet', $data);
        if($result)
          return TRUE;
        else
          return FALSE;
    }


}

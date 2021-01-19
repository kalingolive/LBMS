<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Land_management extends CI_Model {

    function __construct()
    {

        parent::__construct();
        $this->load->database();

    }

  public function add_land($woreda, $block, $parcel, $desc, $area, $land_type, $status, $img_src)
    {
        $parcel_id = '';
        $this->db->where('id', $parcel);
        $query = $this->db->get('parcel');
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            $parcel_id = $result->parcel_id;
        }
        $data = array(
          'land_code' => 'DD-'.$woreda.'-'.$desc.'-'.$block.'-'.$parcel_id,
          'land_type_id' => $land_type,
          'area_size' => $area,
          'parcel_id' => $parcel,
          'status' => $status,
          'entry_date' => date('Y-m-d'),
          'user_id' => $this->session->userdata('id'),
          'img_src' => $img_src
            );

        $result = $this->db->insert('land', $data);
        if($result)
        {
          $land_code ='DD-'.$woreda.'-'.$desc.'-'.$block.'-'.$parcel_id;

          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank - land registration";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "New land added to land bank with the land code (".$land_code.")";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 1;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////

          return $land_code;
        }
        
    }

    public function add_prep_land($land_desc,$land_size, $address, $family_displaced, $compensation, $img_src)
    {
        $data = array(
		 'description' => $land_size,
          'land_size' => $land_size,
          'address' => $address,
          'no_family_displaced' => $family_displaced,
          'compensation_estm' => $compensation,
          'img_src' => $img_src
            );

        $result = $this->db->insert('land_preparation', $data);
        if($result)
        {
          $id = $this->db->insert_id();
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank - land preparation";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "New land prepration added to land bank with the id (".$id.") & address (".$address.")";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 1;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////

          return $id;
        }
        
    }

    public function add_family_land($assigned_id, $land_address, $land_type, $land_taken_size, $land_left_size, $comps_residence, $comps_farm, $comps_paid, $comps_unpaid, $residence_given_size, $farm_given_size, $land_id)
    {
        $data = array(
          'assigned_id' => $assigned_id,
          'address' => $land_address,
          'taken_land_type' => $land_type,
          'land_taken_size' => $land_taken_size,
          'land_left_size' => $land_left_size,
          'comps_for_residence' => $comps_residence,
          'comps_for_farm' => $comps_farm,
          'comps_paid' => $comps_paid,
          'comps_unpaid' => $comps_unpaid,
          'residence_given_land_size' => $residence_given_size,
          'farm_given_land_size' => $farm_given_size,
          'prep_land_id' => $land_id,
            );

        $result = $this->db->insert('family_land', $data);
        if($result)
        {
          $id = $this->db->insert_id();
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank - land preparation - Displaced Family Land";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "New displaced family land prepration added to land bank with the id (".$id.") & address (".$land_address.")";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 1;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////

          return $id;
        }
        
    }

    public function add_family_info($family_land_id, $owner_name, $partner_name, $family_size, $land_conf_image, $size_conf_image, $id_card_image)
    {
        $data = array(
          'owner_name' => $owner_name,
          'partner_name' => $partner_name,
          'size_of_family' => $family_size,
          'land_id' => $family_land_id,
          'conf_document' => $land_conf_image,
          'family_size_conf' => $size_conf_image,
          'id_card' => $id_card_image,
            );

        $result = $this->db->insert('displaced_family', $data);
        if($result)
        {
          $id = $this->db->insert_id();
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank - land preparation - Displaced Family Info";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "New displaced family info added to land bank with for land id (".$family_land_id.") & name (".$owner_name.")";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 1;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////

          return TRUE;
        }
        else
          return FALSE;
        
    }

    public function get_land($key = null)
    {
        if($key == null)
        {
          //$land_data = array();
            $this->db->select ('land.land_code,land.id as land_id, land.area_size,land.desc, land.status, land.entry_date, land.img_src, par.parcel_id as parcel,par.id as parcel_id, lt.title as l_title, lt.description as l_description, block.title as b_title, woreda.id as woreda_id,woreda.title as w_title, woreda.description as w_description, prep.id as prep_id, prep.description as prep_desc');
            $this->db->from('land as land');
            $this->db->join('land_types as lt', 'ON land.land_type_id = lt.id');
            $this->db->join('parcel as par', 'ON land.parcel_id = par.id');
            $this->db->join('block', 'ON par.block_id = block.id');
            $this->db->join('woreda', 'ON block.woreda_id = woreda.id');
			$this->db->join('land_preparation as prep', 'ON prep.id = land.land_prep_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
        else
        {
            $land_data = array();
            $this->db->select ('land.land_code,land.id as land_id, land.area_size,land.desc, land.status, land.entry_date, land.img_src, par.parcel_id as parcel,par.id as parcel_id, lt.title as l_title, lt.description as l_description, block.title as b_title, woreda.id as woreda_id,woreda.title as w_title, woreda.description as w_description, prep.id as prep_id, prep.description as prep_desc');
            $this->db->from('land as land');
            $this->db->join('land_types as lt', 'ON land.land_type_id = lt.id');
            $this->db->join('parcel as par', 'ON land.parcel_id = par.id');
            $this->db->join('block', 'ON par.block_id = block.id');
            $this->db->join('woreda', 'ON block.woreda_id = woreda.id');
				$this->db->join('land_preparation as prep', 'ON prep.id = land.land_prep_id');
            $this->db->where('land.parcel_id', $key);
            $query = $this->db->get();
            $result = $query->result();

            $this->db->where('land_code', $result[0]->land_code);
            $query2 = $this->db->get('coordinates');
            $result2 = $query2->result();

            $data['land_detail'] = $result;
            $data['land_coord'] = $result2;
            return $data;
        }

    }

    public function get_prep_land($key = null)
    {
        if($key == null)
        {
          //$land_data = array();
            $this->db->select("*");
            $query = $this->db->get("land_preparation");
            $result = $query->result();
            return $result;
        }
        else
        {
            $this->db->select("*");
            $this->db->where("id", $key);
            $query = $this->db->get("land_preparation");
            $result = $query->result();

            $this->db->where('prep_land_id', $key);
            $query2 = $this->db->get('prep_coordinate');
            $result2 = $query2->result();
            
            $data['land_detail'] = $result;
            $data['land_coord'] = $result2;
            return $data;
        }

    }

    public function add_block($woreda, $block)
    {
        $this->db->where('title', $block);
        $this->db->where('woreda_id', $woreda);
        $query = $this->db->get('block');
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result->id;
        }
        else
        {
            $data = array(
          'title' => $block,
          'woreda_id' => $woreda
            );

        $this->db->insert('block', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
        }
    }

    public function add_parcel($parcel, $block_id)
    {
        $this->db->where('parcel_id', $parcel);
        $this->db->where('block_id', $block_id);
        $query = $this->db->get('parcel');
        if($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result->id;
        }
        else
        {
            $data = array(
          'parcel_id' => $parcel,
          'block_id' => $block_id
            );

        $this->db->insert('parcel', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
        }
    }

    public function add_coordinates($land_code, $coordinates)
    {
     // $data = array();
      $error = 0;
      for($i = 0; $i < sizeof($coordinates); $i++) {
         $data = array(
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][0]
              ),
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][1]
              )
          );
         $result = $this->db->insert_batch('coordinates', $data);
         if(!$result)
          $error = 1;
      }

      if($error == 0)
        return TRUE;
      else
        return FALSE;
    }

    public function add_prep_coordinates($land_id, $coordinates)
    {
     // $data = array();
      $error = 0;
      for($i = 0; $i < sizeof($coordinates); $i++) {
         $data = array(
            array(
              'prep_land_id' => $land_id,
              'coordinate' => $coordinates[$i][0]
              ),
            array(
              'prep_land_id' => $land_id,
              'coordinate' => $coordinates[$i][1]
              )
          );
         $result = $this->db->insert_batch('prep_coordinate', $data);
         if(!$result)
          $error = 1;
      }

      if($error == 0)
        return TRUE;
      else
        return FALSE;
    }

    public function update_coordinates($land_code, $coordinates)
    {
     // $data = array();
      $error = 0;

      $this->db->where('land_code', $land_code);
      $result = $this->db->delete('coordinates');
      if(!$result)
        $error = 1;
      for($i = 0; $i < sizeof($coordinates); $i++) {
         $data = array(
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][0]
              ),
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][1]
              )
          );
         $result = $this->db->insert_batch('coordinates', $data);
         if(!$result)
          $error = 1;
      }

      if($error == 0)
        return TRUE;
      else
        return FALSE;
    }

    public function edit_prep_coordinates($land_id, $coordinates)
    {
     // $data = array();
      $error = 0;

      $this->db->where('prep_land_id', $land_id);
      $result = $this->db->delete('prep_coordinate');
      if(!$result)
        $error = 1;
      for($i = 0; $i < sizeof($coordinates); $i++) {
         $data = array(
            array(
              'prep_land_id' => $land_id,
              'coordinate' => $coordinates[$i][0]
              ),
            array(
              'prep_land_id' => $land_id,
              'coordinate' => $coordinates[$i][1]
              )
          );
         $result = $this->db->insert_batch('prep_coordinate', $data);
         if(!$result)
          $error = 1;
      }

      if($error == 0)
        return TRUE;
      else
        return FALSE;
    }

    public function get_family_info($key)
    {
      if($key == null)
      {
        $this->db->select("*");
        $this->db->from("family_land as fl");
        $this->db->join("displaced_family as df", "ON fl.id = df.land_id");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }
      else
      {
        $this->db->select("*");
        $this->db->from("family_land as fl");
        $this->db->join("displaced_family as df", "ON fl.id = df.land_id");
        $this->db->where("prep_land_id", $key);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }
      
    }

     public function add_woreda($title, $desc)
    {
          $data = array(
          'title' => $title,
          'description' => $desc
            );

        $result = $this->db->insert('woreda', $data);

        if($result)
        {
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank - Woreda Registration";
          $updated_data = "Woreda";
          $privilage = $this->session->userdata('role');
          $detail = "New Woreda added to land bank with the title (".$title.")";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 1;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////
           return TRUE;
        }
         else
           return FALSE;
        
    }

    public function get_woreda($id = null)
    {
      if($id != null)
      $this->db->where('id', $id);
    
      $query = $this->db->get('woreda');
      $result = $query->result();
      return $result;
    }

    public function list_landType()
    {
        $query = $this->db->get('land_types');
        $result = $query->result();
        return $result;
    }

    public function edit_land($parcel_id,$woreda, $block, $parcel, $desc, $land_type, $area_size, $status, $new_parcel_id, $img_src,$land_prep_edit)
    {
      if($img_src == '')
      {
        $data = array (
            'land_code' => 'DD-'.$woreda.'-'.$desc.'-'.$block.'-'.$parcel,
          'land_type_id' => $land_type,
          'area_size' => $area_size,
          'parcel_id' => $new_parcel_id,
          'desc' => $desc,
		  'land_prep_id'=>$land_prep_edit,
          'status' => $status,
          'user_id' => $this->session->userdata('id')
            );
      }
      else
      {
        $data = array (
            'land_code' => 'DD-'.$woreda.'-'.$desc.'-'.$block.'-'.$parcel,
          'land_type_id' => $land_type,
          'area_size' => $area_size,
          'parcel_id' => $new_parcel_id,
          'desc' => $desc,
          'status' => $status,
		  'land_prep_id'=>$land_prep_edit,
          'user_id' => $this->session->userdata('id'),
          'img_src' => $img_src
            );
      }

        $this->db->set($data, FALSE);
        $this->db->where('parcel_id' , $parcel_id);
        $result = $this->db->update('land');
        if($result)
        {
          $land_code ='DD-'.$woreda.'-'.$desc.'-'.$block.'-'.$parcel;

          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank - land details updation";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "Land with the land code (".$land_code.") has been updated (edited)";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 2;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////

          return $land_code;
        }
    }

     public function edit_prep_land($edit_id,$desc, $land_size, $address, $family_displaced, $compensation, $img_src)
    {
      if($img_src == '')
      {
        $data = array(
          'land_size' => $land_size,
		  'description'=>$desc,
          'address' => $address,
          'no_family_displaced' => $family_displaced,
          'compensation_estm' => $compensation
            );
      }
      else
      {
        $data = array(
          'land_size' => $land_size,
          'address' => $address,
          'no_family_displaced' => $family_displaced,
          'compensation_estm' => $compensation,
          'img_src' => $img_src
            );
      }

        $this->db->set($data, FALSE);
        $this->db->where('id' , $edit_id);
        $result = $this->db->update('land_preparation');
        if($result)
        {
          $id = $this->db->insert_id();

          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank - land preparation details updation";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "Land preparation with the id (".$id.") & address (".$address.") has been updated";
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

    public function delete_land($id){
      $this->db->where('parcel_id', $id);
      $result = $this->db->delete('land');
      if($result)
      {
      $this->db->where('id', $id);
      $result2 = $this->db->delete('parcel');
      if($result)
      {
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////  add the action to the log ///////////////////////////////////
        $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
        $action = "Land Bank - land deletion";
        $updated_data = "Land Bank";
        $privilage = $this->session->userdata('role');
        $detail = "Land with the land code (".$land_code.") has been deleted (removed)";
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

    public function get_alloc_transfer($key = null)
    {
        if($key == null)
        {
          //$land_data = array();
            $this->db->select('*');
            $this->db->from('land_transfer_alloc');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
        else
        {
            $land_data = array();
            $this->db->select ('land.area_size, land.entry_date, at.id as transfer_id, at.landbank_code, at.land_code, at.transferred_to, at.project_title, transferred_area, at.approval_letter, at.project_proposal, at.land_use, at.bank_statement, at.compensation, at.EIA, at.siteplan, at.transfer_date, at.reclaim_date, at.status, at.title_deed, woreda.title as w_title, woreda.description as w_description, block.title as b_title');
            $this->db->from('land as land');
            $this->db->join('land_transfer_alloc as at', 'ON land.land_code = at.landbank_code');
            $this->db->join('parcel as par', 'ON land.parcel_id = par.id');
            $this->db->join('block', 'ON par.block_id = block.id');
            $this->db->join('woreda', 'ON block.woreda_id = woreda.id');
            $this->db->where('at.land_code', $key);
            $query = $this->db->get();
            $result = $query->result();

            $this->db->where('land_code', $result[0]->land_code);
            $query2 = $this->db->get('alloc_coordinates');
            $result2 = $query2->result();

            $data['land_detail'] = $result;
            $data['land_coord'] = $result2;
            return $data;
        }

    }

    public function get_bid_transfer($key = null)
    {
        if($key == null)
        {
          //$land_data = array();
            $this->db->select('*');
            $this->db->from('land_transfer_bid');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
        else
        {
            $land_data = array();
            $this->db->select ('land.area_size, land.entry_date, bt.id as transfer_id, bt.landbank_code, bt.land_code, bt.transferred_to, bt.sex, bt.transferred_area, bt.winning_letter, bt.transfer_date, bt.land_use, bt.siteplan, bt.bid_round, bt.status, bt.title_deed, woreda.title as w_title, woreda.description as w_description, block.title as b_title');
            $this->db->from('land as land');
            $this->db->join('land_transfer_bid as bt', 'ON land.land_code = bt.landbank_code');
            $this->db->join('parcel as par', 'ON land.parcel_id = par.id');
            $this->db->join('block', 'ON par.block_id = block.id');
            $this->db->join('woreda', 'ON block.woreda_id = woreda.id');
            $this->db->where('bt.land_code', $key);
            $query = $this->db->get();
            $result = $query->result();

            $this->db->where('land_code', $result[0]->land_code);
            $query2 = $this->db->get('bid_coordinates');
            $result2 = $query2->result();

            $data['land_detail'] = $result;
            $data['land_coord'] = $result2;
            return $data;
        }

    }

    public function get_transfer_size()
    {
      //$land_data = array();
            $this->db->select('landbank_code, SUM(transferred_area) as total_area_alloc');
            $this->db->from('land_transfer_alloc');
            $this->db->where('status', '1');
            $this->db->group_by('landbank_code');
            $query = $this->db->get();
            $result = $query->result();
            $alloc_transfers = array();
            foreach ($result as $row ) 
            { 
              $alloc_transfers[$row->landbank_code][] = $row;
            }

            $this->db->select('landbank_code, SUM(transferred_area) as total_area_bid');
            $this->db->from('land_transfer_bid');
            $this->db->where('status', '1');
            $this->db->group_by('landbank_code');
            $query = $this->db->get();
            $result = $query->result();
            $bid_transfers = array();
            foreach ($result as $row ) 
            { 
              $bid_transfers[$row->landbank_code][] = $row;
            }

            $data[1] = $alloc_transfers;
            $data[2] = $bid_transfers;

            return $data;
    }

    public function get_transfer_type()
    {
      //$land_data = array();
            $this->db->select('landbank_code, SUM(transferred_area) as total_area_alloc,land_use');
            $this->db->from('land_transfer_alloc');
            $this->db->where('status', '1');
            $this->db->group_by('land_use');
            $query = $this->db->get();
            $result = $query->result();
            $alloc_transfers = array();
            foreach ($result as $row ) 
            { 
              $alloc_transfers[$row->land_use][] = $row;
            }

            $this->db->select('landbank_code, SUM(transferred_area) as total_area_bid,land_use');
            $this->db->from('land_transfer_bid');
            $this->db->where('status', '1');
            $this->db->group_by('land_use');
            $query = $this->db->get();
            $result = $query->result();
            $bid_transfers = array();
            foreach ($result as $row ) 
            { 
              $bid_transfers[$row->land_use][] = $row;
            }

            $data[1] = $alloc_transfers;
            $data[2] = $bid_transfers;

            return $data;
    }

    public function get_land_byType()
    {
      //$land_data = array();
            $this->db->select('land.land_code, SUM(land.area_size) as total_area ,lt.title, lt.id');
            $this->db->from('land as land');
            $this->db->join('land_types as lt', 'ON land.land_type_id = lt.id');
            $this->db->group_by('lt.title');
            $query = $this->db->get();
            $result = $query->result();
            $land_data= array();
            foreach ($result as $row ) 
            { 
              $land_data[$row->title][] = $row;
            }

            $data = $land_data;

            return $data;
    }

    public function add_alloc_transfer($land_bank_code, $land_code, $trans_to, $proj_title, $area, $proj_prop, $land_use, $bank_img_src,$comp_img_src, $eia, $trans_date, $reclaim_date, $approval_img_src, $site_img_src, $title_img_src, $max_area)
    {


          $data = array(
          'landbank_code' => $land_bank_code,
          'land_code' => $land_code,
          'transferred_to' => $trans_to,
          'project_title' => $proj_title,
          'transferred_area' => $area,
          'approval_letter' => $approval_img_src,
          'project_proposal' => $proj_prop,
          'land_use' => $land_use,
          'bank_statement' => $bank_img_src,
          'compensation' => $comp_img_src,
          'eia' => $eia,
          'siteplan' => $site_img_src,
          'title_deed' => $title_img_src,
          'transfer_date' => $trans_date,
          'reclaim_date' => $reclaim_date,
            );

        $result = $this->db->insert('land_transfer_alloc', $data);
        if($result)
        {
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank Transfer - Merit Transfer Registration";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "Land with the land code (".$land_code.") and size of (".$area." KM) has been transferred with merit to (".$trans_to.") from banked land (".$land_bank_code.")";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 1;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////
          return TRUE;
        }
        else
          return FALSE;

    }


    public function add_bid_transfer($land_bank_code, $land_code, $trans_to, $area, $sex, $land_use, $bid_round, $win_img_src, $trans_date, $site_img_src, $title_img_src, $max_area)
    {


          $data = array(
          'landbank_code' => $land_bank_code,
          'land_code' => $land_code,
          'transferred_to' => $trans_to,
          'transferred_area' => $area,
          'sex' => $sex,
          'bid_round' => $bid_round,
          'land_use' => $land_use,
          'winning_letter' => $win_img_src,
          'siteplan' => $site_img_src,
          'title_deed' => $title_img_src,
          'transfer_date' => $trans_date,
            );

        $result = $this->db->insert('land_transfer_bid', $data);
        if($result)
        {
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank Transfer - Bid Transfer Registration";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "Land with the land code (".$land_code.") and size of (".$area." KM) has been transferred with bid to (".$trans_to.") from banked land (".$land_bank_code.")";
          $ip_address = $this->input->ip_address();
          $date = date('Y-m-d');
          $time = date('H:m:s');
          $level = 1;
          $this->add_log($user, $action, $updated_data, $privilage, $detail, $ip_address, $date, $time, $level);
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////////
          return TRUE;
        }
        else
          return FALSE;

    }

    public function add_alloc_coordinates($land_code, $coordinates)
    {
     // $data = array();
      $error = 0;
      for($i = 0; $i < sizeof($coordinates); $i++) {
         $data = array(
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][0]
              ),
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][1]
              )
          );
         $result = $this->db->insert_batch('alloc_coordinates', $data);
         if(!$result)
          $error = 1;
      }

      if($error == 0)
        return TRUE;
      else
        return FALSE;
    }

    public function add_bid_coordinates($land_code, $coordinates)
    {
     // $data = array();
      $error = 0;
      for($i = 0; $i < sizeof($coordinates); $i++) {
         $data = array(
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][0]
              ),
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][1]
              )
          );
         $result = $this->db->insert_batch('bid_coordinates', $data);
         if(!$result)
          $error = 1;
      }

      if($error == 0)
        return TRUE;
      else
        return FALSE;
    }

    public function update_alloc_coordinates($land_code, $coordinates)
    {
     // $data = array();
      $error = 0;

      $this->db->where('land_code', $land_code);
      $result = $this->db->delete('alloc_coordinates');
      if(!$result)
        $error = 1;
      for($i = 0; $i < sizeof($coordinates); $i++) {
         $data = array(
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][0]
              ),
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][1]
              )
          );
         $result = $this->db->insert_batch('alloc_coordinates', $data);
         if(!$result)
          $error = 1;
      }

      if($error == 0)
        return TRUE;
      else
        return FALSE;
    }

    public function update_bid_coordinates($land_code, $coordinates)
    {
     // $data = array();
      $error = 0;

      $this->db->where('land_code', $land_code);
      $result = $this->db->delete('bid_coordinates');
      if(!$result)
        $error = 1;
      for($i = 0; $i < sizeof($coordinates); $i++) {
         $data = array(
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][0]
              ),
            array(
              'land_code' => $land_code,
              'coordinate' => $coordinates[$i][1]
              )
          );
         $result = $this->db->insert_batch('bid_coordinates', $data);
         if(!$result)
          $error = 1;
      }

      if($error == 0)
        return TRUE;
      else
        return FALSE;
    }

    public function edit_alloc_transfer($id,$land_bank_code, $land_code, $trans_to, $proj_title, $area, $proj_prop, $land_use, $bank_img_src,$comp_img_src, $eia, $trans_date, $reclaim_date, $approval_img_src, $site_img_src, $max_area)
    {
      
        $data = array(
          'landbank_code' => $land_bank_code,
          'land_code' => $land_code,
          'transferred_to' => $trans_to,
          'project_title' => $proj_title,
          'transferred_area' => $area,
          'approval_letter' => $approval_img_src,
          'project_proposal' => $proj_prop,
          'land_use' => $land_use,
          'bank_statement' => $bank_img_src,
          'compensation' => $comp_img_src,
          'eia' => $eia,
          'siteplan' => $site_img_src,
          'transfer_date' => $trans_date,
          'reclaim_date' => $reclaim_date,
            );
      
         $data = array_filter($data, function($value){
          return $value !== "";
         });

        $this->db->set($data, FALSE);
        $this->db->where('id' , $id);
        $result = $this->db->update('land_transfer_alloc');
        if($result)
        {
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank Transfer - Merit Transfer Entry Update";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "Land with the land code (".$land_code.") and size of (".$area." KM) which has been transferred with merit to (".$trans_to.") from banked land (".$land_bank_code.") has been updated (Modified)";
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

     public function edit_bid_transfer($id, $land_bank_code, $land_code, $trans_to, $area, $sex, $land_use, $bid_round, $win_img_src, $trans_date, $site_img_src, $max_area)
    {
      
        $data = array(
          'landbank_code' => $land_bank_code,
          'land_code' => $land_code,
          'transferred_to' => $trans_to,
          'transferred_area' => $area,
          'sex' => $sex,
          'bid_round' => $bid_round,
          'land_use' => $land_use,
          'winning_letter' => $win_img_src,
          'siteplan' => $site_img_src,
          'transfer_date' => $trans_date,
            );
      
         $data = array_filter($data, function($value){
          return $value !== "";
         });

        $this->db->set($data, FALSE);
        $this->db->where('id' , $id);
        $result = $this->db->update('land_transfer_bid');
        if($result)
        {
          ///////////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////  add the action to the log ///////////////////////////////////
          $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
          $action = "Land Bank Transfer - Bid Transfer Updation";
          $updated_data = "Land Bank";
          $privilage = $this->session->userdata('role');
          $detail = "Land with the land code (".$land_code.") and size of (".$area." KM) which has been transferred with bid to (".$trans_to.") from banked land (".$land_bank_code.") has been edited (Modified)";
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

    public function delete_alloc_transfer($land_code){
      $this->db->where('land_code', $land_code);
      $result = $this->db->delete('land_transfer_alloc');
      if($result)
      {
      $this->db->where('land_code', $land_code);
      $result2 = $this->db->delete('alloc_coordinates');
      if($result2)
      {
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////  add the action to the log ///////////////////////////////////
        $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
        $action = "Land Bank Transfer - Merit Transfer Entry Deletion";
        $updated_data = "Land Bank";
        $privilage = $this->session->userdata('role');
        $detail = "Land with the land code (".$land_code.") which has been transferred with merit has been Deleted";
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

      public function delete_bid_transfer($land_code){
      $this->db->where('land_code', $land_code);
      $result = $this->db->delete('land_transfer_bid');
      if($result)
      {
      $this->db->where('land_code', $land_code);
      $result2 = $this->db->delete('bid_coordinates');
      if($result2)
      {
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////  add the action to the log ///////////////////////////////////
        $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
        $action = "Land Bank Transfer - Bid Transfer Entry Deletion";
        $updated_data = "Land Bank";
        $privilage = $this->session->userdata('role');
        $detail = "Land with the land code (".$land_code.") which has been transferred with bid has been Deleted";
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
  
  public function edit_woreda($id, $title, $description){
      $data = array(
              'title' => $title,
              'description' => $description,
                );
      $this->db->set($data, FALSE);
      $this->db->where('id' , $id);
      $result = $this->db->update('woreda');    
      if($result)
      {
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////  add the action to the log ///////////////////////////////////
        $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
        $action = "Land Bank - Woreda Updation";
        $updated_data = "Land Bank - Woreda";
        $privilage = $this->session->userdata('role');
        $detail = "Woreda with the id (".$id.") has been Updated (modified)";
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



//------------------------------------------EDIT BLOCK-----------------------------------
public function edit_block($id, $woreda, $title){
      $data = array(
              'title' => $title,
              'woreda_id' => $woreda,
                );
      $this->db->set($data, FALSE);
      $this->db->where('id' , $id);
      $result = $this->db->update('block');    
      if($result)
      {
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////  add the action to the log ///////////////////////////////////
        $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
        $action = "Land Bank - Woreda Updation";
        $updated_data = "Land Bank - Block";
        $privilage = $this->session->userdata('role');
        $detail = "Block with the id (".$id.") has been Updated (modified)";
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


  public function delete_woreda($id){
      $this->db->where('id', $id);
      $result = $this->db->delete('woreda');
      if($result)
      {
        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////  add the action to the log ///////////////////////////////////
        $user = $this->session->userdata('name')." (".$this->session->userdata('username').")";
        $action = "Land Bank - Woreda deletion";
        $updated_data = "Land Bank - Woreda";
        $privilage = $this->session->userdata('role');
        $detail = "Woreda with the id (".$id.") has been deleted (removed)";
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
  

    public function get_land_size($key)
    {
      $transfer_data = $this->get_transfer_size();

      $this->db->select('area_size');
      $this->db->where('land_code', $key);
      $query = $this->db->get('land');

       if(!empty($transfer_data[1][$key]))
          $total_area_alloc = $transfer_data[1][$key][0]->total_area_alloc;
        else
          $total_area_alloc = 0;

        if(!empty($transfer_data[2][$key]))
          $total_area_bid = $transfer_data[2][$key][0]->total_area_bid;
        else
          $total_area_bid = 0;

        $total_area_occupied = $total_area_alloc + $total_area_bid;

        $result = $query->result();

        $area_size = $result[0]->area_size;

        $remain[0] = array("area_size" => ($area_size - $total_area_occupied));

      return $remain;
    }

    public function get_logs($user_id = null)
    {
      if($user_id != null)
      {
        $this->db->select("lg.id as log_id,lg.user, lg.action, lg.updated_data, lg.detail, lg.date, lg.time, lg.privilage, lg.ip_address, lg.level");
        $this->db->from('log_sheet as lg');
        $this->db->where('level != ', 4);
        $this->db->where('user_id', $user_id);
       // $this->db->_protect_identifiers=false;
        $this->db->order_by('lg.date ASC, lg.time DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }
      else
      {
        $this->db->select("lg.id as log_id,lg.user, lg.action, lg.updated_data, lg.detail, lg.date, lg.time, lg.privilage, lg.ip_address, lg.level");
        $this->db->from('log_sheet as lg');
        $this->db->where('level != ', 4);
       // $this->db->_protect_identifiers=false;
        $this->db->order_by('lg.date ASC, lg.time DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
      }
    }

    public function get_Loginlogs()
    {
        $this->db->select("lg.id as log_id,lg.user, lg.action, lg.updated_data, lg.detail, lg.date, lg.time, lg.privilage, lg.ip_address, lg.level");
        $this->db->from('log_sheet as lg');
        $this->db->where('level', 4);
       // $this->db->_protect_identifiers=false;
        $this->db->order_by('lg.date ASC, lg.time DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
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
	
	
	
	  public function get_block($id = null)
    {
      if($id != null)
      $this->db->where('id', $id);
    
      $query = $this->db->get('block_woreda');
      $result = $query->result();
      return $result;
    }

 public function add_block2($title, $woreda_id)
    {
      
            $data = array(
          'title' => $title,
          'woreda_id' => $woreda_id
            );

        $result=$this->db->insert('block', $data);
        //$insert_id = $this->db->insert_id();
        if($result)
          return TRUE;
        else
          return FALSE;
        
    }



}

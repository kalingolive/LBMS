<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid_transfer extends CI_Controller {

	public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->model('user_management');
        $this->load->model('land_management');

        $language = $this->session->userdata('lang');
		$this->lang->load('bid', $language);

         if(!$this->session->userdata('isLoggedIn') ) {
		        redirect('login');
		    } 
    }

	public function index()
	{

		$this->list_transfers();
	}

	public function list_transfers()
	{
		$data['transfer_data'] = $this->land_management->get_bid_transfer();
		$data['title'] = "bid";
		$this->load->view('bid_transfer', $data);
	}

	public function view_bid_transfer($id=null)
	{
	 if($id == null)
	 $id = $this->input->post('view_id');

     $transfer_data = $this->land_management->get_bid_transfer($id);
     echo json_encode($transfer_data);
	}

	public function get_lands($key = null)
	{
		if($key == null)
     	  $land_data = $this->land_management->get_land();
        else
          $land_data = $this->land_management->get_land($key);
     echo json_encode($land_data);
	}

	public function get_land_size($key)
	{
     $land_data = $this->land_management->get_land_size($key);
     echo json_encode($land_data);
	}

	public function add_transfer()
	{
		$land_bank_code = $this->input->post('land');
		$land_code = $this->input->post('land_code');
		$trans_to = $this->input->post('trans_to');
		$area = $this->input->post('area');
		$sex = $this->input->post('sex');
		$land_use = $this->input->post('land_use');
		$bid_round = $this->input->post('bid_round');
		$trans_date = $this->input->post('trans_date');
		$coord_size = $this->input->post('coord_size');
		$max_area = $this->input->post('max_area');
		//$coordinates = $this->input->post('coordinates');
		$coordinates = array();
		for($i=0;$i<$coord_size;$i++)
		{
                
			$coordinates[$i] = array( 
			$this->input->post('coordinate_X'.($i+1)), 
			$this->input->post('coordinate_Y'.($i+1))
			); 
                					
                //$coordinates[$i][1] = $this->input->post('coordinate_Y'.$i);
		}

		$trans_date =date('Y/m/d', strtotime($this->input->post('trans_date')));

		//to mysql date format change
		$trans_date = date('Y-m-d', strtotime(str_replace('-', '/', $trans_date)));

		if(isset($_FILES['winLetter_image']))
		 {
		 	$win_image_src = 'uploads/transfers/bid/' . 	$land_code.'-winLetter.jpg';
		 }
		 else
		 	$win_image_src = '';

		if(isset($_FILES['sitePlan_image']))
		{
 			$site_img_src = 'uploads/transfers/bid/' . 	$land_code.'-sitePlan.jpg';
		}
		else
			$site_img_src = '';
		
		
	

		$result = $this->land_management->add_bid_transfer($land_bank_code, $land_code, $trans_to, $area, $sex, $land_use, $bid_round, $win_image_src, $trans_date, $site_img_src, $max_area);
		if($result)
		{
			$result = $this->land_management->add_bid_coordinates($land_code, $coordinates);
			if($result)
			{
				if(isset($_FILES['winLetter_image']))
				{
				move_uploaded_file($_FILES["winLetter_image"]['tmp_name'], 
									'uploads/transfers/bid/' . 	$land_code.'-winLetter.jpg');
				}

			   if(isset($_FILES['sitePlan_image']))
				{
				move_uploaded_file($_FILES["sitePlan_image"]['tmp_name'], 
									'uploads/transfers/bid/' . 	$land_code.'-sitePlan.jpg');
			    }
				echo true;
			}
			else
				echo false;
		}

	}

	public function edit_transfer()
	{
		$id = $this->input->post('edit_id');
		$land_bank_code = $this->input->post('land_edit');
		$land_code = $this->input->post('land_code_edit');
		$trans_to = $this->input->post('trans_to_edit');
		$area = $this->input->post('area_edit');
		$sex = $this->input->post('sex_edit');
		$land_use = $this->input->post('land_use_edit');
		$bid_round = $this->input->post('bid_round_edit');
		$trans_date = $this->input->post('trans_date_edit');
		$coord_size = $this->input->post('coord_size_edit');
		$max_area = $this->input->post('max_area_edit');

		$coordinates = array();
		for($i=0;$i<$coord_size;$i++)
		{
                
			$coordinates[$i] = array( 
			$this->input->post('update_coordinate_X'.($i+1)), 
			$this->input->post('update_coordinate_Y'.($i+1))
			); 
                					
                //$coordinates[$i][1] = $this->input->post('coordinate_Y'.$i);
		}

		$trans_date =date('Y/m/d', strtotime($this->input->post('trans_date_edit')));
		//to mysql date format change
		$trans_date = date('Y-m-d', strtotime(str_replace('-', '/', $trans_date)));

		//$approval_img_src = 'uploads/transfers/bidation/' . 	$land_code.'-approval.jpg';
		//$site_img_src = 'uploads/transfers/bidation/' . 	$land_code.'-sitePlan.jpg';

		if(isset($_FILES['winLetter_image_edit']))
		 {
		 	$win_image_src = 'uploads/transfers/bid/' . 	$land_code.'-winLetter.jpg';
		 }
		 else
		 	$win_image_src = '';

		if(isset($_FILES['sitePlan_image_edit']))
		{
 			$site_img_src = 'uploads/transfers/bid/' . 	$land_code.'-sitePlan.jpg';
		}
		else
			$site_img_src = '';
		
		$result = $this->land_management->edit_bid_transfer($id, $land_bank_code, $land_code, $trans_to, $area, $sex, $land_use, $bid_round, $win_image_src, $trans_date, $site_img_src, $max_area);
		
		if($result)
		{
			$result = $this->land_management->update_bid_coordinates($land_code, $coordinates);
			if($result)
			{

				if(isset($_FILES['winLetter_image_edit']))
				{
				move_uploaded_file($_FILES["winLetter_image_edit"]['tmp_name'], 
									'uploads/transfers/bid/' . 	$land_code.'-winLetter.jpg');
				}

			   if(isset($_FILES['sitePlan_image_edit']))
				{
				move_uploaded_file($_FILES["sitePlan_image_edit"]['tmp_name'], 
									'uploads/transfers/bid/' . 	$land_code.'-sitePlan.jpg');
			    }
				echo true;
		    }
		}
		else
			echo false;
	}

	public function delete_transfer($id=null)
    {
     if($id == null)
     $id = $this->input->post('delete_id');

     $result = $this->land_management->delete_bid_transfer($id);
     echo $result;
    }

	public function list_landTypes()
	{
		$landType_data = $this->land_management->list_landType();
		echo json_encode($landType_data);
	}

	public function print_land($land_code = null)
	{
	    $data['land_details'] = $this->land_management->get_bid_transfer($land_code);
	    $data['controller']=$this; 
	    $data['title'] = "bid";
		$this->load->view('print_bid_land', $data);
	}

	public function UTMtoGeog($Easting,$Northing,$UtmZone,$SouthofEquator=false) //Convert UTM Coordinates to Geographic
		{
		  //Declarations
		  //Symbols as used in USGS PP 1395: Map Projections - A Working Manual
		  $k0 = 0.9996;//scale on central meridian
		  $a = 6378137.0;//equatorial radius, meters. 
		  $f = 1/298.2572236;//polar flattening.
		  $b = $a*(1-$f);//polar axis.
		  $e = sqrt(1 - $b*$b/$a*$a);//eccentricity
		  $drad = pi()/180;//Convert degrees to radians)
		  $phi = 0;//latitude (north +, south -), but uses phi in reference
		  $e0 = $e/sqrt(1 - $e*$e);//e prime in reference
		  $lng = 0;//Longitude (e = +, w = -)
		  $lng0 = 0;//longitude of central meridian
		  $lngd = 0;//longitude in degrees
		  $M = 0;//M requires calculation
		  $x = 0;//x coordinate
		  $y = 0;//y coordinate
		  $k = 1;//local scale
		  $zcm = 0;//zone central meridian
		  //End declarations
		  //Convert UTM Coordinates to Geographic
		  $k0 = 0.9996;//scale on central meridian
		  $b = $a*(1-$f);//polar axis.
		  $e = sqrt(1 - ($b/$a)*($b/$a));//eccentricity
		  $e0 = $e/sqrt(1 - $e*$e);//Called e prime in reference
		  $esq =(1 - ($b/$a)*($b/$a));//e squared for use in expansions
		  $e0sq =$e*$e/(1-$e*$e);// e0 squared - always even powers
		  $x = $Easting;
		  if ($x<160000 || $x>840000)
		    echo "Outside permissible range of easting values \n Results may be unreliable \n Use with caution\n";
		  $y = $Northing;
		  if ($y<0)
		    echo "Negative values not allowed \n Results may be unreliable \n Use with caution\n";
		  if ($y>10000000)
		    echo "Northing may not exceed 10,000,000 \n Results may be unreliable \n Use with caution\n";
		  $zcm =3 + 6*($UtmZone-1) - 180;//Central meridian of zone
		  $e1 =(1 - sqrt(1 - $e*$e))/(1 + sqrt(1 - $e*$e));//Called e1 in USGS PP 1395 also
		  $M0 =0;//In case origin other than zero lat - not needed for standard UTM
		  $M =$M0 + $y/$k0;//Arc length along standard meridian. 
		  if ($SouthofEquator === true)
		    $M=$M0+($y-10000000)/$k;
		  $mu =$M/($a*(1 - $esq*(1/4 + $esq*(3/64 + 5*$esq/256))));
		  $phi1 =$mu + $e1*(3/2 - 27*$e1*$e1/32)*sin(2*$mu) + $e1*$e1*(21/16 -55*$e1*$e1/32)*sin(4*$mu);//Footprint Latitude
		  $phi1 =$phi1 + $e1*$e1*$e1*(sin(6*$mu)*151/96 + $e1*sin(8*$mu)*1097/512);
		  $C1 =$e0sq*pow(cos($phi1),2);
		  $T1 =pow(tan($phi1),2);
		  $N1 =$a/sqrt(1-pow($e*sin($phi1),2));
		  $R1 =$N1*(1-$e*$e)/(1-pow($e*sin($phi1),2));
		  $D =($x-500000)/($N1*$k0);
		  $phi =($D*$D)*(1/2 - $D*$D*(5 + 3*$T1 + 10*$C1 - 4*$C1*$C1 - 9*$e0sq)/24);
		    $phi =$phi + pow($D,6)*(61 + 90*$T1 + 298*$C1 + 45*$T1*$T1 -252*$e0sq - 3*$C1*$C1)/720;
		    $phi =$phi1 - ($N1*tan($phi1)/$R1)*$phi;
		        
		  //Longitude
		  $lng =$D*(1 + $D*$D*((-1 -2*$T1 -$C1)/6 + $D*$D*(5 - 2*$C1 + 28*$T1 - 3*$C1*$C1 +8*$e0sq + 24*$T1*$T1)/120))/cos($phi1);
		  $lngd = $zcm+$lng/$drad;
		  
		  return array(floor(1000000*$phi/$drad)/1000000,floor(1000000*$lngd)/1000000); //Latitude,Longitude
		}
}

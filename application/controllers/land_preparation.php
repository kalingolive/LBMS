<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Land_preparation extends CI_Controller {

	public function __construct()
    {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->model('user_management');
        $this->load->model('land_management');

        $language = $this->session->userdata('lang');
		$this->lang->load('land_prep', $language);


         if(!$this->session->userdata('isLoggedIn') ) {
		        redirect('login');
		    } 
    }

	public function index()
	{
		$this->list_land_preparations();
	}

	public function list_land_preparations()
	{
		$data['land_data'] = $this->land_management->get_prep_land();
		$data['title'] = "land_preparation";
		$this->load->view('Land_preparations', $data);
	}

	public function view_land($id=null)
	{
	 if($id == null)
	 $id = $this->input->post('view_id');

     $data['land_data'] = $this->land_management->get_prep_land($id);
     $data['land_data_json'] = json_encode($data['land_data']);
     $data['title'] = "land_preparation";
	$this->load->view('Land_preparation_edit', $data);
	}

	public function add_form()
	{
		$data['title'] = "land_preparation";
		$this->load->view('Land_preparation_add', $data);
	}

	public function add_land()
	{
		$land_desc = $this->input->post('add_land_size');
		$land_size = $this->input->post('add_land_desc');
		$address = $this->input->post('add_land_address');
		$family_displaced = $this->input->post('add_family_displaced');
		$compensation = $this->input->post('add_compensation');
		$coord_size = $this->input->post('coord_size');
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

		$img_src = $_FILES["land_image"]["name"];

		$land_id = $this->land_management->add_prep_land($land_desc,$land_size, $address, $family_displaced, $compensation, $img_src);
		
		$result = $this->land_management->add_prep_coordinates($land_id, $coordinates);
		if($result)
		{
			move_uploaded_file($_FILES['land_image']['tmp_name'], 
								'uploads/preparation/' . 	$_FILES["land_image"]["name"]);
			echo true;
		}
		else
			echo false;
	}

	public function edit_land()
	{
		$land_size = $this->input->post('update_land_size');
		$land_desc = $this->input->post('update_land_desc');
		$address = $this->input->post('update_land_address');
		$family_displaced = $this->input->post('update_family_displaced');
		$compensation = $this->input->post('update_compensation');
		$coord_size = $this->input->post('update_coord_size');
		$edit_id = $this->input->post('edit_id');
		//$coordinates = $this->input->post('coordinates');

		$coordinates = array();
		for($i=0;$i<$coord_size;$i++)
		{
                
			$coordinates[$i] = array( 
			$this->input->post('update_coordinate_X'.($i+1)), 
			$this->input->post('update_coordinate_Y'.($i+1))
			); 
                					
                //$coordinates[$i][1] = $this->input->post('coordinate_Y'.$i);
		}

        
        if(isset($_FILES['update_land_image']))
        {
        	$img_src = $_FILES["update_land_image"]["name"];
        }
        else
        	$img_src = "";

		$result = $this->land_management->edit_prep_land($edit_id,$land_desc,$land_size, $address, $family_displaced, $compensation, $img_src);
		
		if($result)
		{
		   $result2 = $this->land_management->edit_prep_coordinates($edit_id, $coordinates);
		   if($result2)
			{
				if(isset($_FILES['update_land_image']))
        		{
				move_uploaded_file($_FILES['land_image']['tmp_name'], 
									'uploads/preparation/' . 	$_FILES["land_image"]["name"]);
			    }
				echo true;
			}
			else
				echo false;
		}
		else
			    echo false;

		
	}

	public function delete_land($id=null)
    {
     if($id == null)
     $id = $this->input->post('delete_id');

     $result = $this->land_management->delete_prep_land($id);
     echo $result;
    }

	public function family_info($land_id)
	{
		$data["family_data"] = $this->land_management->get_family_info($land_id);
		$data['title'] = "land_preparation";
		$data['land_id'] = $land_id;
	    $this->load->view('Family_info', $data);
	}

	public function add_family_info()
	{
		$land_id = $this->input->post('land_id');

		$owner_name = $this->input->post('add_owner_name');
		$partner_name = $this->input->post('add_partner_name');
		$family_size = $this->input->post('add_family_size');
		$assigned_id = $this->input->post('add_assigned_id');
		$land_address = $this->input->post('add_family_land_address');
		$land_type = $this->input->post('add_family_land_type');
		$land_taken_size = $this->input->post('add_family_land_taken_size');
		$land_left_size = $this->input->post('add_family_land_left_size');
		$comps_residence = $this->input->post('add_family_comps_residence');
		$comps_farm = $this->input->post('add_family_comps_farm');
		$comps_paid = $this->input->post('add_family_comps_paid');
		$comps_unpaid = $this->input->post('add_family_comps_unpaid');
		$residence_given_size = $this->input->post('add_family_residence_given_size');
		$farm_given_size = $this->input->post('add_family_farm_given_size');
		//$coordinates = $this->input->post('coordinates');

		$land_conf_image = $_FILES["land_conf_image"]["name"];
		$size_conf_image = $_FILES["size_conf_image"]["name"];
		$id_card_image = $_FILES["id_card_image"]["name"];

		$family_land_id = $this->land_management->add_family_land($assigned_id, $land_address, $land_type, $land_taken_size, $land_left_size, $comps_residence, $comps_farm, $comps_paid, $comps_unpaid, $residence_given_size, $farm_given_size, $land_id);
		
		$result = $this->land_management->add_family_info($family_land_id, $owner_name, $partner_name, $family_size, $land_conf_image, $size_conf_image, $id_card_image);
		if($result)
		{
			move_uploaded_file($_FILES['land_conf_image']['tmp_name'], 
								'uploads/preparation/displaced_family/' . 	$_FILES["land_conf_image"]["name"]);

			move_uploaded_file($_FILES['size_conf_image']['tmp_name'], 
								'uploads/preparation/displaced_family/' . 	$_FILES["size_conf_image"]["name"]);

			move_uploaded_file($_FILES['id_card_image']['tmp_name'], 
								'uploads/preparation/displaced_family/' . 	$_FILES["id_card_image"]["name"]);
			echo true;
		}
		else
			echo false;
	}

	public function print_land($id = null)
	{
	    $data['land_details'] = $this->land_management->get_prep_land($id);
	    $data['controller']= $this; 
	    $data['title'] = "land_preparation";
		$this->load->view('print_prep_land', $data);
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
		
		
		
		
		
		
		
		public function get_land_prep()
	{
		$prep_data = $this->land_management->get_prep_land();
		echo json_encode($prep_data);
		
	}
}

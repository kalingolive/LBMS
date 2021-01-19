<?php

class Language extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_management');
        $this->load->model('land_management');
		$this->load->helper('language');
	}

	public function index($lang) {
		$data = array('lang' => $lang);
		$this->session->set_userdata($data);
		redirect($_SERVER['HTTP_REFERER']);
	}

}

?>
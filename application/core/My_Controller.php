<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        
    }
	
	public function checkLogin()
	{
		$userData = $this->session->userdata();
		$a = count($userData);
		if($a<=1){
			redirect(site_url('login'));
		}

	}
	public function getDataUser(){
		$userData = $this->session->userdata();
		return $userData;
	}
	public function isAdmin(){
		$user = $this->getDataUser();
		if ($user['level'] != 'Super User' && $user['level'] != 'Admin') show_404();
	}

}



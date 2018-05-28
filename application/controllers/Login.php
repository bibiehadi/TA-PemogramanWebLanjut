<?php
if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url');
        
    }

    public function index(){
        $this->load->view('login');
    	$session = $this->session->userdata('isLogin');
    	if ($session == false) {
    	redirect('login/login_form');
    	}else{
    		redirect('index');
    	}
    	
    }

    public function login_form(){

      if ($this->session->userdata('isLogin')) redirect('index');

    	$this->form_validation->set_rules('username','username', 'required|trim');

    	$this->form_validation->set_rules('password','password', 'required|trim|md5');

    	$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

    	if ($this->form_validation->run()==false) {
    		$this->load->view('login');
    	}else{
    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
    		$cek = $this->login_model->takeUser($username,$password);
        if ($cek) {
            if ($cek->level=='admin') {
              $data = $this->login_model->userDataUser($username);
              $level = 'Admin';
            }else if($cek->level=='super'){
              // $data=$cek;
              $level = 'Super User';
            }else{
              $data = $this->login_model->userDataMHS($username);
              $level = 'Mahasiswa';
            }

            if ($cek->level=='admin') {

                $userData = array(
                  'username' => $cek->username,
                  'nama' => $data->nama,
                  'level' => $level,
                  'photo' => $cek->photo,
                  'isLogin' => true
                  );  

                $this->session->set_userdata($userData);
            		// var_dump($userData);
            		redirect('dashboard');
             }
             else if ($cek->level=='super') {
                $userData = array(
                  'username' => $cek->username,
                  'level' => $level,
                  'photo' => $cek->photo,
                  'isLogin' => true
                );
                $this->session->set_userdata($userData);
                // var_dump($userData);
                redirect('dashboard');
             }
            else{
                $userData = array(
                  'username' => $cek->username,
                  'nama'=> $data->Nama,
                  'level' => $level,
                  'photo' => $cek->photo,
                  'isLogin' => true
                );
                $this->session->set_userdata($userData);
                    redirect('dashboard');   
            }
        }
    		else{ 

                $this->session->set_flashdata("msg","<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Login: Cek username , password dan level anda!</div></div>");
              ?>
    			     <script>
		                 history.go(-1);
		          
               </script>
              <?php

               // redirect('login');
         }
    	
    }
  }

     public function logout(){
   		$this->session->sess_destroy();
   		redirect('login/login_form');
  }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends My_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->checkLogin();
		$this->isAdmin();
	}

	public function index($offset=null){
		$numRow = $this->db->query('SELECT * FROM tbl_user');
		$config['base_url']=base_url()."index.php/user/index";
		$config['total_rows']=$numRow->num_rows();
		$config['per_page']=10;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$page = ($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['offset']=$offset;
		$data['page'] = $offset+1;
		$search = $this->input->post('search');
		
		$query=$this->user_model->listUser($search,$config["per_page"],$offset);
		$this->pagination->initialize($config);
		$str_links =$this->pagination->create_links();
		$data['results']=$query;
		$data['links'] = explode('&nbsp;',$str_links );
		$data['judul'] ='List User';
			$this->load->view('templates/header',$data);
			// $data['user']=$this->user_model->listUser();
			$this->load->view('pages/user',$data);
			$this->load->view('templates/footer');

		
		
	}

	public function delete($username){
		$where = array('username' => $username);
		$this->user_model->deleteUser($where,'tbl_user');
		redirect(site_url('user'));
	}

	public function insertUser(){
		$data['judul'] = 'Form Buat User Baru';
		$this->load->view('templates/header',$data);
		$this->load->view('pages/user_insert');
		$this->load->view('templates/footer');
	}

	public function insert(){
		if ($this->input->post('submit')) {
			$level = $this->input->post('Level');
			$data = $this->data();
			$this->user_model->insertUser($data);
			if ($level=='admin') {
				$this->insertPegawai();
			}else{
				$this->insertToMHS();
			}
			
			redirect(site_url('user'));
		}
		
	}

	function insertPegawai(){
		$nip=$this->input->post('Username');
		$data= array(
			'nip' =>$nip,
			// 'tanggal_lahir' => 'now()'
		);
		// var_dump($data);
		$this->user_model->insertPEG($data);
	}

	function insertToMHS(){
		$nrp = $this->input->post('Username');
		$data = array(
			'nrp' =>$nrp,
			'tanggal_lahir'=>'now()'
		);
		$this->user_model->insertMhs($data);
	}


	public function updateForm($username){
		$data['judul'] = 'Update Data User';
		$this->load->view('templates/header',$data);
		$where = array('username'=>$username);
		$data['user']=$this->user_model->update($where,'tbl_user')->result();
		$this->load->view('pages/user_update',$data);
		$this->load->view('templates/footer');
	}

	public function update(){
		$username = $this->input->post('Username');
		$level = $this->input->post('Level');
		$data = array(
			'username' => $username,
			'level' => $level
		);
		$where = array('username'=>$username);
		$this->user_model->updateUser($where,$data,'tbl_user');
		$iyaa['data']=$data;
		// var_dump($where);
		// var_dump($iyaa);

		redirect(site_url('user'));
	}

	function data(){
		$username = $this->input->post('Username');
		$password = $this->input->post('Password');
		$level = $this->input->post('Level');
		$data = array(
			'username' => $username,
			'password' => md5($password),
			'level' => $level
		);
		return $data;
	}

}
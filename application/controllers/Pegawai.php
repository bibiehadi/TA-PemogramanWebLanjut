<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends My_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->helper(array('form','url'));
		$this->checkLogin();
		$this->isAdmin();
	}

	public function index($offset=null){
		$this->load->library('pagination');
		$query = $this->db->get('tbl_pegawai');

		$config['base_url']=base_url()."index.php/pegawai/index";
		$config['total_rows']=$query->num_rows();
		$config['per_page']=10;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$page = ($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['offset']=$offset;
		$search = $this->input->post('search');
		$data['pegawai']=$this->pegawai_model->listPegawai($search,$config["per_page"],$offset);
		$this->pagination->initialize($config);
		$str_links =$this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );

		$data['judul']="List Pegawai";
		$this->load->view('templates/header',$data);
		// $data['pegawai']= $this->pegawai_model->listPegawai();
		$this->load->view('pages/pegawai',$data);
		$this->load->view('templates/footer');
	}

	public function insertPeg(){
		$data['judul'] = "Insert Data Pegawai";
		$this->load->view('templates/header',$data);
		$this->load->view('pages/pegawai_insert');
		$this->load->view('templates/footer');
	}

	public function insert(){
		$data = $this->data();
		$this->pegawai_model->insertPeg($data);
		redirect(site_url('pegawai'));
	}

	public function update_form($nip){
		$data['judul']="Update Data Pegawai";
		$this->load->view('templates/header',$data);
		$where = array('NIP' => $nip);
		$data['pegawai'] = $this->pegawai_model->getData($where,'tbl_pegawai')->result();
		$this->load->view('pages/pegawai_update',$data);
		$this->load->view('templates/footer');
	}

	public function update(){
		$nip = $this->input->post('nip');
		$data = $this->data();
		$where = array('NIP'=>$nip);
		$this->pegawai_model->updatePeg($where,$data,'tbl_pegawai');
		redirect(site_url('pegawai'));
	}

	public function delete($nip){
		$where = array('NIP' => $nip);
		$user = array('username' => $nip);
		$this->load->model('user_model');
		$this->pegawai_model->deletePeg($where,'tbl_pegawai');
		$this->user_model->deleteUser($user,'tbl_user');
		redirect(site_url('pegawai'));
	}

	function data(){
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$unit = $this->input->post('unit');
		$data = array(
			'NIP' => $nip,
			'Nama' => $nama,
			'JK' => $jk,
			'Alamat' => $alamat,
			'Unit' => $unit
		);
		return $data;
	}
}
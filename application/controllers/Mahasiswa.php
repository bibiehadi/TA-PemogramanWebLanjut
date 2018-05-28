<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends My_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mhs_model');
		$userData = $this->session->userdata();
		// var_dump($userData);
		$this->checkLogin();
		
		
	}

	public function index($offset= null){
		$this->isAdmin();
		$this->load->library('pagination');
		$query = $this->db->query('SELECT * FROM tbl_mhs');
		$config['base_url']=base_url()."index.php/mahasiswa/index";
		$config['total_rows']=$query->num_rows();
		$config['per_page']=10;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		// $config['url_segment']=3;
		$page = ($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['offset']=$offset;
		$search = $this->input->post('search');
		$data['results']=$this->mhs_model->listMhs($search,$config["per_page"],$offset);
		$this->pagination->initialize($config);
		$str_links =$this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$data['judul']="List Mahasiswa";
		$data['page'] = $offset+1;
		$this->load->view('templates/header',$data);
		// $data['mahasiswa'] = $this->mhs_model->listMhs();
		$this->load->view('pages/mahasiswa',$data);
		$this->load->view('templates/footer');
	}

	// public function insertMhs(){
	// 	$data['judul'] = "Insert Data Mahasiswa";
	// 	$this->load->view('templates/header',$data);
	// 	$this->load->view('pages/mahasiswa_insert');
	// 	$this->load->view('templates/footer');
	// }

	// public function insert(){
	// 	$mhs = $this->data();
	// 	$this->mhs_model->insertMhs($mhs);
	// 	redirect(site_url('mahasiswa'));
	// }

	public function update_form($nrp){
		$this->isAdmin();
		$data['judul']="Update Data Mahasiswa";
		$this->load->view('templates/header',$data);
		$where = array('NRP' => $nrp);
		$data['mahasiswa'] = $this->mhs_model->getData($where,'tbl_mhs')->result();
		$this->load->view('pages/mahasiswa_update',$data);
		$this->load->view('templates/footer');
	}

	public function update(){
		if ($this->input->post('submit')){
				$nrp = $this->input->post('nrp');
				$data = $this->data();
				$where = array('NRP'=>$nrp);
				$this->mhs_model->updateMhs($where,$data,'tbl_mhs');
				$this->session->set_flashdata("msg","<div class=\"col-md-10\"><div class=\"alert alert-success\" id=\"alert\">Update data berhasil !</div></div>");
				redirect(site_url('dashboard'));
			}else{
				$this->session->set_flashdata("msg","<div class=\"col-md-10\"><div class=\"alert alert-danger\" id=\"alert\">Update data gagal! ".$upload['error']."</div></div>");
				?><script type="text/javascript">history.go(-1);</script>
				<?php
			}
		
		// echo 'aa';

		
	}

	// function img(){
	// 	// $this->load->library('upload');
	// 	$nrp = $this->input->post('nrp');
	// 	$nmFT = "foto_".$nrp;
	// 	$config['upload_path'] = ('./fotoProfil');
	// 	$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG';
	// 	$config['max_size']='1024';
	// 	$config['file_name']=$nmFT;
	// 	$config['remove_space']=TRUE;

	// 	$this->load->library('upload',$config);
	// 	$this->upload->initialize($config);
	// 	if ($this->upload->do_upload('fotoProfil')) {
	// 		$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
	// 		return $return;
	// 	}else if($this->upload->do_upload('fotoProfil')==null){
	// 		$return = array('result' => 'success', 'file' => array('file_name'=>'people.jpg'),'error' => '');
	// 		return $return;
	// 	}
	// 	else{
	// 		$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
	// 		return $return;
	// 	}
	// }

	public function delete($nrp){
		$this->isAdmin();
		$where = array('NRP' => $nrp);
		$user = array('username' =>$nrp);
		$this->mhs_model->deleteMhs($where,'tbl_mhs');
		$this->load->model('user_model');
		$this->user_model->deleteUser($user,'tbl_user');
		redirect(site_url('mahasiswa'));
	}

	function data(){
		$nrp = $this->input->post('nrp');
		$nama = $this->input->post('nama');
		$tmpLahir = $this->input->post('tmpLahir');
		$tglLahir = $this->input->post('tglLahir');
		$jk = $this->input->post('jk');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$program = $this->input->post('program');
		$data = array(
			'NRP' => $nrp,
			'Nama' => $nama,
			'Tempat_Lahir' => $tmpLahir,
			'Tanggal_Lahir' => $tglLahir,
			'JK' => $jk,
			'Agama' => $agama,
			'Alamat' => $alamat,
			'Program_Studi' => $program
		);
		return $data;
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends My_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('pegawai_model');
		$this->load->helper('url');
		$this->checkLogin();
		$this->isAdmin();
	}

	public function update(){
		$nip = $this->input->post('nip');
		$data = $this->data();
		$where = array('NIP'=>$nip);
		$this->pegawai_model->updatePeg($where,$data,'tbl_pegawai');
		redirect(site_url('pegawai'));
	}

	public function updateForm($nip){
		if($nip!=$this->session->userdata('username')) show_404();
		$data['judul']="Edit Data Diri";
		$this->load->view('templates/header',$data);
		$where = array('NIP' => $nip);
		$data['pegawai'] = $this->pegawai_model->getData($where,'tbl_pegawai')->result();
		$this->load->view('pages/pegawai_update',$data);
		$this->load->view('templates/footer');
	}

	public function formUpload($nip){
		if($nip!=$this->session->userdata('username')) show_404();
		$data['judul']="Merubah Foto Profil";
		$this->load->view('templates/header',$data);
		$where = array('NIP' => $nip);
		$data['data'] = $this->pegawai_model->getData($where,'tbl_pegawai')->result();
		$this->load->view('pages/upload_foto',$data);
		$this->load->view('templates/footer');
	}
	public function updateFoto(){
		$this->load->model('user_model');
		if ($this->input->post('submit')){
			$upload = $this->img();
			// var_dump($upload);
			if ($upload['result']=='success') {
				# code...
				$foto = $upload['file']['file_name'];
				$nip = $this->input->post('nip');
				// $mhs = $this->data();
				// $data = array_merge($mhs,$foto);
				$where = array('username'=>$nip);
				$this->user_model->setFoto($where,$foto,'tbl_user');
				$this->session->set_flashdata("msg","<div class=\"col-md-10\"><div class=\"alert alert-success\" id=\"alert\">Update data berhasil !</div></div>");
				$a=$upload['file']['file_name'];
				// var_dump($a);
				redirect(site_url('profil/formUpload/'.$this->session->userdata('username')));
			}else{
				$this->session->set_flashdata("msg","<div class=\"col-md-10\"><div class=\"alert alert-danger\" id=\"alert\">Update data gagal! ".$upload['error']."</div></div>");
				?><script type="text/javascript">history.go(-1);</script>
				
				<?php
			}
		}
		// echo 'aa';

		
	}

	function img(){
		// $this->load->library('upload');
		$nip = $this->input->post('nip');
		$nmFT = "foto_".$nip;
		$config['upload_path'] = ('./fotoProfil');
		$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG';
		$config['max_size']='1024';
		$config['file_name']=$nmFT;
		$config['remove_space']=TRUE;

		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('fotoProfil')) {
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else if($this->upload->do_upload('fotoProfil')==null){
			$return = array('result' => 'success', 'file' => array('file_name'=>'people.jpg'),'error' => '');
			return $return;
		}
		else{
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
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
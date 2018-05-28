<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilMhs extends My_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('mhs_model');
		$this->load->helper('url');
		// $this->checkLogin();
		// $this->isAdmin();
	}
	public function update(){
		$nrp = $this->input->post('nrp');
		$data = $this->data();
		$where = array('NRP'=>$nip);
		$this->mahasiswa_model->updateMhs($where,$data,'tbl_mhs');
		redirect(site_url('mahasiswa'));
	}	


	public function updateForm($nrp){
		// if($nrp!=$this->session->userdata('username')) show_404();
		$data['judul']="Edit Data Diri";
		$this->load->view('templates/header',$data);
		$where = array('NRP' => $nrp);
		$data['mahasiswa'] = $this->mhs_model->getData($where,'tbl_mhs')->result();
		$this->load->view('pages/mahasiswa_update',$data);
		$this->load->view('templates/footer');
	}

	public function formUpload($nrp){
		if($nrp!=$this->session->userdata('username')) show_404();
		$data['judul']="Merubah Foto Profil";
		$this->load->view('templates/header',$data);
		$where = array('NRP' => $nrp);
		$data['data'] = $this->mhs_model->getData($where,'tbl_mhs')->result();
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
				$nrp = $this->input->post('nrp');
				// $mhs = $this->data();
				// $data = array_merge($mhs,$foto);
				$where = array('username'=>$nrp);
				$this->user_model->setFoto($where,$foto,'tbl_user');
				$this->session->set_flashdata("msg","<div class=\"col-md-10\"><div class=\"alert alert-success\" id=\"alert\">Update data berhasil !</div></div>");
				// $a=$upload['file']['file_name'];
				// var_dump($a);
				redirect(site_url('profilMhs/formUpload/'.$this->session->userdata('username')));
			}else{
				$this->session->set_flashdata("msg","<div class=\"col-md-10\"><div class=\"alert alert-danger\" id=\"alert\">Update data gagal! ".$upload['error']."</div></div>");
				?><script type="text/javascript">history.go(-1);</script>
				
				<?php
			}
		}
		// echo 'aa';

		
	}

	public function img(){
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
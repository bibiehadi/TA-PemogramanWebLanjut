<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends My_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('pengajuan_model');
		$this->load->helper(array('form','url'));
		// $this->load->library('m_pdf');
		$this->checkLogin();
		
	}
	
	public function index($offset = null){
		$this->isAdmin();
		$this->load->library('pagination');
		$query = $this->pengajuan_model->getRow();
		$config['base_url']=base_url()."index.php/pengajuan/index";
		$config['total_rows']=$query;
		$config['per_page']=10;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		// $config['url_segment']=3;
		$page = ($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['offset']=$offset;
		$data['pages'] = $offset+1;
		$search = $this->input->post('search');
		$data['pengajuan']=$this->pengajuan_model->openpengajuan(false,$search,$config["per_page"],$offset);
		$this->pagination->initialize($config);
		$str_links =$this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );


		$data['judul']= "List Mahasiswa yang Mengajukan Pembuatan KTM";
		$this->load->view('templates/header',$data);
		
		$this->load->view('pages/index',$data);
		$this->load->view('templates/footer');
	}

	public function cetakList(){
		// $data['pengajuan'] = $this->pengajuan_model->openpengajuan();
		// $source = $this->load->view('pages/index',$data);
		// $html = $source;

		// $pdfFilePath = "listpengajuan.pdf";
		// $css = base_url().'assets/vendor/bootstrap/css/bootstrap.min.css';
		// $stylesheet = file_get_contents($css);

		// $pdf=$this->m_pdf->load();
		// $pdf->AddPage('L');
		// $pdf->WriteHTML($stylesheet,1);
		// $pdf->WriteHTML($html);	

		// $pdf->Output($pdfFilePath,2);
		// exit();
		$this->load->library('pdf');
		$data['pengajuan'] = $this->pengajuan_model->openpengajuan();
		$this->pdf->load_view('pages/index',$data);
		$this->pdf->Output();
	}

	public function viewDetail($id){
		$this->isAdmin();
		$data['judul']= "Data-Data Kelengkapan Pengajuan";
		$this->load->view('templates/header',$data);
		$data['pengajuan']=$this->pengajuan_model->openpengajuan($id);
		$this->load->view('pages/pengajuan_detail',$data);
		$this->load->view('templates/footer');
	}


	public function updatePengajuan(){
		$this->isAdmin();
		// if ($this->input->post('submit')) {
			$id = $this->input->post('id');
			$data =$this->data1();
			$where=array('id'=>$id);
			$this->pengajuan_model->update($where,$data);
			redirect(site_url('pengajuan'));
		// }
		
	}

	function data1(){
		// $id = $this->input->post('id');
		// $nrp = $this->input->post('nrp');
		$status = $this->input->post('status');
		$note = $this->input->post('note');
		$data = array(
			'status' => $status,
			'Note' => $note
		);
		return $data;
	}	

 	public function form_kehilangan(){
	 	$data['judul'] = 'Form Pengajuan KTM Mahasiswa';
	 	$this->load->view('templates/header',$data);
	 	$this->load->view('pages/pengajuan_kehilangan');
	 	$this->load->view('templates/footer');
	}


	// public function form_baru(){
	//  	$data['judul'] = 'Form Pembuatan KTM Mahasiswa Baru';
	//  	$this->load->view('templates/header',$data);
	//  	$this->load->view('pages/pengajuan_baru');
	//  	$this->load->view('templates/footer');
	// }

	public function insertPeng(){
		$this->form_validation->set_rules(
			'nrp','NRP','required|is_unique[tbl_pengajuan.NRP]',
			array(
				'is_unique'=>$this->session->set_flashdata("msg","<div class=\"col-md-10\"><div class=\"alert alert-danger\" id=\"alert\"> Anda sudah melakukan pengajuan sebelumnya!! </div></div>")
			)
		);
		if ($this->form_validation->run()==False) {
			$this->form_kehilangan();
		}else{
		if ($this->input->post('submit')){
			$upload = $this->filePengajuan();
			// var_dump($upload);
			if ($upload['result']=='success') {
				# code...
				$foto = array(
                  'src_surat'=>$upload['file']['file_name']
                );
				$nrp = $this->input->post('nrp');
				$dataPengajuan = $this->data();
				$data = array_merge($dataPengajuan,$foto);
				$where = array('NRP'=>$nrp);
				$this->pengajuan_model->insertPengajuan($data);
				redirect(site_url('dashboard'));
			}else{
				$this->session->set_flashdata("msg","<div class=\"col-md-10\"><div class=\"alert alert-danger\" id=\"alert\"> Pengajuan KTM gagal! ".$upload['error']."</div></div>");
				?><script type="text/javascript">history.go(-1);</script>
				
				<?php
			}
		}

		// $dataPengajuan = $this->data();
		// var_dump($data);
		}
	}

	function filePengajuan(){
		// $this->load->library('upload');
		$nrp = $this->input->post('nrp');
		$nmFile = "bukti_".$nrp;
		$config['upload_path'] = ('./bukti');
		$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|pdf';
		$config['max_size']='2048';
		$config['file_name']=$nmFile;
		// $config['remove_space']=TRUE;

		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('srt_kehilangan')) {
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' =>'');
			return $return;
		}else if($this->upload->do_upload('srt_kehilangan')==null){
			$return = array('result' => 'success', 'file' => 'maba.jpg','error' => '');
			return $return;
		}		else{
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	function data(){
		$nrp = $this->input->post('nrp');
		// $foto = $this->input->post('foto');
		$tgl = date("Ymd");
		$surat = $this->input->post('srt_kehilangan');

		$data = array(
			'NRP' => $nrp,
			'tgl_pengajuan' => $tgl,
			'src_surat' => $surat
		);
		return $data;
	}

	// public function data(){
		// $nip 
	// }
}

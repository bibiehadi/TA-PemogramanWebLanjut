<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->checkLogin();
	}

	public function index(){
		$this->load->model('dashboard_model');
		if ($this->session->userdata('level')!='Mahasiswa') {
			$data['judul']='Dashboard';
			$data['peng'] = $this->dashboard_model->pengajuan();
			$data['mhs'] = $this->dashboard_model->mahasiswa();
			$data['user'] = $this->dashboard_model->user();
			$data['sukses'] = $this->dashboard_model->pengajuanSukses();
			$pieChart0 = $this->dashboard_model->getChart0();
			$pieChart1 = $this->dashboard_model->getChart1();
			$pieChart2 = $this->dashboard_model->getChart2();
			$pieChart3 = $this->dashboard_model->getChart3();
			$pieChart4 = $this->dashboard_model->getChart4();
			$totPengajuan = $this->dashboard_model->pengajuan();
			$data['peng0']=($pieChart0/$totPengajuan)*100;
			$data['peng1']=($pieChart1/$totPengajuan)*100;
			$data['peng2']=($pieChart2/$totPengajuan)*100;
			$data['peng3']=($pieChart3/$totPengajuan)*100;
			$data['peng4']=($pieChart4/$totPengajuan)*100;
			$this->load->view('templates/header',$data);
			$this->load->view('pages/dashboard',$data);
			$this->load->view('templates/footer');
		}
		if ($this->session->userdata('level')=='Mahasiswa') {
			$data['judul']='Dashboard';
			$where = array('NRP'=> $this->session->userdata('username'));
			$data['data'] = $this->dashboard_model->getData($where);
			$this->load->view('templates/header',$data);
			$this->load->view('pages/dashboardmhs',$data);
			$this->load->view('templates/footer');
		}
	}
}
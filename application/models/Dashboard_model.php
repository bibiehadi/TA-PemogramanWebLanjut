<?php 


class Dashboard_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function pengajuan(){
		$this->db->Select('m.*,p.*,u.photo');
		$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p,tbl_user as u');
		$this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP');
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function getChart0(){
		$this->db->Select('m.*,p.*,u.photo');
		$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p,tbl_user as u');
		$this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP and p.status=0');
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function getChart1(){
		$this->db->Select('m.*,p.*,u.photo');
		$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p,tbl_user as u');
		$this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP and p.status=1');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getChart2(){
		$this->db->Select('m.*,p.*,u.photo');
		$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p,tbl_user as u');
		$this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP and p.status=2');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getChart3(){
		$this->db->Select('m.*,p.*,u.photo');
		$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p,tbl_user as u');
		$this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP and p.status=3');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getChart4(){
		$this->db->Select('m.*,p.*,u.photo');
		$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p,tbl_user as u');
		$this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP and p.status=4');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function pengajuanSukses(){
		$this->db->FROM('tbl_pengajuan');
		$this->db->WHERE('status = 4');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function mahasiswa(){
		$query = $this->db->get('tbl_mhs');
		return $query->num_rows();
	}

	public function user(){
		$query = $this->db->get('tbl_user');
		return $query->num_rows();
	}

	public function getData($where){
		$this->db->where($where);
		$query = $this->db->get('tbl_pengajuan');
		return $query->result_array();
	}
}
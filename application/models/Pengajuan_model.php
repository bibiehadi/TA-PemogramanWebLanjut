<?php 

class Pengajuan_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function listPengajuan(){
		return $this->db->get('tbl_pengajuan');
	}

	public function insertPengajuan($data){
		$this->db->insert('tbl_pengajuan',$data);
	}

	public function openPengajuan($id = false,$key = false,$limit=false, $offset=false){

		if ($id == false && $key == false) {
			$this->db->Select('m.*,p.*,u.photo');
			$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p,tbl_user as u');
			$this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP');
			$this->db->order_by('p.id');
			$this->db->limit($limit,$offset);
			$query = $this->db->get();
			// $query = $this->db->query("SELECT m.*, p.* FROM tbl_mhs as m, tbl_pengajuan as p WHERE m.NRP = p.NRP order by p.id");
			return $query->result_array();
		}

		if ($id != false) {
			$this->db->Select('m.*,p.*,u.photo');
			$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p, tbl_user as u');
			$this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP and p.id='.$id);
			$query = $this->db->get();
			return $query->result();
		}
			// $this->db->Select('m.*,p.*,u.photo');
			// $this->db->FROM('tbl_mhs as m,tbl_pengajuan as p,tbl_user as u');
			// $this->db->WHERE('m.NRP = p.NRP and u.username=m.NRP');
			// $this->db->like()
			// $this->db->limit($limit,$offset);
			// $query = $this->db->get();
			// return $query->result_array();
	}
	public function getRow(){
			$this->db->Select('m.*,p.*');
			$this->db->FROM('tbl_mhs as m,tbl_pengajuan as p');
			$this->db->WHERE('m.NRP = p.NRP');
			$this->db->order_by('p.id');
			$query = $this->db->get();
			return $query->num_rows();
	}

	public function update($id,$data){
		// $query = $this->db->query("UPDATE tbl_pengajuan set status='$data' where id='$id'");
		// $this->db->update('tbl_pengajuan');
		$this->db->set($data);
		$this->db->where($id);
		$this->db->update('tbl_pengajuan');
	}
	public function updatePengajuan($where,$data,$tabel){
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}
} 
?>
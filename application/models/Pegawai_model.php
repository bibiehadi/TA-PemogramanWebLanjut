<?php 
/**
* 
*/
class Pegawai_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function listPegawai($key = false, $limit=false, $offset=false){
		if ($key == false) {
			$this->db->limit($limit,$offset);
			return $this->db->get('tbl_pegawai')->result_array();
		}
		$this->db->like('NIP',$key);
		$this->db->or_like('Nama',$key);
		$this->db->or_like('Alamat',$key);
		$this->db->or_like('Unit',$key);
		$this->db->limit($limit,$offset);
		return $this->db->get('tbl_pegawai')->result_array();
	}

	public function insertPeg($data){
		$this->db->insert('tbl_pegawai',$data);
	}

	public function getData($where,$tabel){
		return $this->db->get_where($tabel,$where);
	}

	public function updatePeg($where,$data,$tabel){
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function deletePeg($where,$tabel){
		$this->db->where($where);
		$this->db->delete($tabel);
	}
}

 ?>
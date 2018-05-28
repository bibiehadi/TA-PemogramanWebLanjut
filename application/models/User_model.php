<?php 
class User_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function listUser($key = false,$limit=false,$offset=false){
		if ($key == false) {
			// return $this->db->get('tbl_user')->result_array();
			$this->db->limit($limit,$offset);
			$data = $this->db->get("tbl_user");
			return $data->result_array();
		}
		$this->db->from('tbl_user');
		$this->db->like('username', $key);
		$this->db->or_like('level',$key);
		$this->db->limit($limit,$offset);
		$query = $this->db->get()->result_array();
		return $query;
		

	}

	public function deleteUser($where,$tabel){
		$this->db->where($where);
		$this->db->delete($tabel);
	}

	public function insertUser($data){
		$this->db->insert('tbl_user',$data);
		// $err = $this->db->error();
		// return $error;
	}

	public function insertMHS($data){
		$this->db->insert('tbl_mhs',$data);	
	}

	public function insertPEG($data){
		$this->db->insert('tbl_pegawai',$data);	
	}

	public function update($where,$tabel){
		return $this->db->get_where($tabel,$where);
	}
	public function updateUser($where,$data,$tabel){
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function setFoto($where,$data,$tabel){
		$this->db->set('photo',$data);
		$this->db->where($where);
		$this->db->update($tabel);
	}

	public function getData($where){
		$this->db->where($where);
		return $this->db->get('tbl_user');
	}

	public function fetchData($limit, $offset){
		$this->db->limit($limit,$offset);
		$data = $this->db->get("tbl_user");
		return $data->result_array();
	}
}
 ?>
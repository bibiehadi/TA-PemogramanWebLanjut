<?php 

/**
* 
*/
class Mhs_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listMhs($key=false,$limit=false,$offset=false){
		if ($key == false) {
			$this->db->limit($limit,$offset);
			$query = $this->db->get('tbl_mhs');
			return $query->result_array();
		}
		$this->db->from('tbl_mhs');
		$this->db->like('NRP',$key);
		$this->db->or_like('Nama',$key);
		$this->db->or_like('Tempat_Lahir',$key);
		$this->db->or_like('Program_Studi',$key);
		$this->db->or_like('Alamat',$key);
		$this->db->or_like('Agama',$key);
		$this->db->limit($limit,$offset);
		$query =$this->db->get();
		return $query->result_array();
		
	}


	public function insertMhs($data){
		$this->db->insert('tbl_mhs',$data);
	}

	public function getData($where,$tabel){
		return $this->db->get_where($tabel,$where);
	}

	public function updateMhs($where,$data,$tabel){
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function deleteMhs($where,$tabel){
		$this->db->where($where);
		$this->db->delete($tabel);
	}
	// public function fetchData($limit, $offset){
	// 	$this->db->limit($limit,$offset);
	// 	$data = $this->db->get("tbl_mhs");
	// 	return $data->result_array();
	// }


}
?>
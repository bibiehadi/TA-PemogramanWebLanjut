<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function takeUser($username,$password){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get();
		return $query->row();
	}	

	public function userDataMHS($username){
		$this->db->select('Nama');
   		$this->db->where('NRP', $username);
   		$query = $this->db->get('tbl_mhs');
   		return $query->row();
	}

	public function userDataUser($username){
		$this->db->select('Nama');
   		$this->db->where('NIP', $username);
   		$query = $this->db->get('tbl_pegawai');
   		return $query->row();
	}
}
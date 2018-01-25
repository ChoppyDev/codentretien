<?php
Class Login_Database extends CI_model{
	
	public function login($data){

		$condition = "username="."'".$data['username']."' AND password= '".$data['password']."' ";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return true;

		} else {
			return false;
		}
	}

	public function read_user_information($username){

		$condition = "username=" . "'".$username."'";
		$this->db->select('*');
		$this->db->from("users");
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		} else{
			return false;
		}
	}
}

?>
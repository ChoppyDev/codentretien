<?php
Class Login_Database extends CI_model{
	
	public function login($data){

		$condition = "user_login="."'".$data['username']."' AND user_password= '".$data['password']."' ";
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

		$condition = "user_login=" . "'".$username."'";
		$this->db->select('*');
		$this->db->from("users");
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		$sql = $this->db->last_query();
		
		if($query->num_rows() == 1){
			return $query->result();
		} else{
			return false;
		}
	}

	public function user_registration($data){
		$this->db->insert('users', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else {
			return false;
		}
	}

	public function user_update_infos($userID, $data){
		$this->db->set($data);
		$this->db->where('user_id', $userID);
		$this->db->update('users');

		//echo $this->db->last_query();
	}
}

?>
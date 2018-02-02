<?php 
Class Read_Database extends CI_model{

	public function read_Users_data(){
		$this->db->select('*');
		$this->db->from('users');
		$result = $this->db->get();
		echo json_encode($result->result());	
	}

	public function user_grid_data(){
		$this->db->select('user_id, user_login, group.labelGroup, user_firstName, user_lastName');
		$this->db->from('users');
		$this->db->join('group','group.idGroup = users.user_idGroup');

		$result = $this->db->get();
		$sql = $this->db->last_query();

		echo json_encode($result->result());		
	}

	public function get_groups(){
		$this->db->select('*');
		$this->db->from('group');

		$result = $this->db->get();
		
		return $result->result();
	}
}

?>
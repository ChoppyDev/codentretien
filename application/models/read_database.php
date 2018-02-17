<?php
Class Read_Database extends CI_model{

	public function read_Users_data(){
		$this->db->select('*');
		$this->db->from('users');
		$result = $this->db->get();
		echo json_encode($result->result());
	}

	public function user_grid_data(){
		$this->db->select('user_id, user_login, user_firstName, user_lastName, group.labelGroup, user_email');
		$this->db->from('users');
		$this->db->join('group','group.idGroup = users.user_idGroup');
		$this->db->order_by('user_id', 'ASC');

		$result = $this->db->get();
		$sql = $this->db->last_query();

		echo json_encode($result->result());
	}

	public function checkDouble($username){
		$this->db->select("user_login");
		$this->db->from("users");
		$this->db->where("user_login", $username);

		if($this->db->get()->result()){
				return true;
		}
		return false; 
	}

	public function get_groups(){
		$this->db->select('*');
		$this->db->from('group');
		$this->db->order_by('idGroup', 'ASC');

		$result = $this->db->get();

		return $result->result();
	}

	public function get_permissions(){
		$this->db->select("*");
		$this->db->from('permissions');

		$result = $this->db->get();

		return $result->result();
	}

	public function permissionsGroupList($group){
		$this->db->select("*");
		$this->db->from('map_permissions');
		$this->db->where('idGroup',$group);

		$result = $this->db->get();

		return $result->result();
	}

	public function get_rooms(){
		$this->db->select('*');
		$this->db->from('room');

		$result = $this->db->get();
		
		return $result->result();
	}

/**
* Get group from specific user
* @param int idUser
* @param bool minimized		return minimized data if == TRUE
*/
	public function get_user_infos($idUser, $minimized){
		$this->db->select(($minimized == TRUE) ? 'user_idGroup, user_login, user_email, user_birthday, user_numberphone, user_firstName, user_lastName, user_createdOn' : '*');
		$this->db->from('users');
		$this->db->where('user_id', $idUser);

		$result = $this->db->get();

		echo json_encode($result->result());
	}
}

?>

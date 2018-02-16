<?php 

Class ticket_database extends CI_model{

	public function read_ticket_info(){
		$this->db->select("ticket_id, ticket_creation, ticket_description, status_id, user_firstName, user_lastName, ticket_title, room_label");
		$this->db->from("ticket");
		$this->db->join("room", "room.room_id = ticket.room_id");
		$this->db->join("users","users.user_id = ticket.user_id");
		$result = $this->db->get();

		//echo json_encode($result->result());
		return $result->result();
	}
}
?>
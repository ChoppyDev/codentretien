<?php

Class ticket_database extends CI_model{

	public function read_ticket_info(){
		$this->db->select("ticket_id, ticket_creation, ticket_description, status_id, user_firstName, user_lastName, ticket_title, room_label");
		$this->db->from("ticket");
		$this->db->join("room", "room.room_id = ticket.room_id");
		$this->db->join("users","users.user_id = ticket.user_id");
		$this->db->where("status_id != 1 AND status_id != 2");
		$result = $this->db->get();

		echo json_encode($result->result());
		//return $result->result();
	}

	public function edit_state( $id, $state ){
		$datestring = mdate('%Y-%m-%d', time());;
		$data = array(
				'status_id' => $state,
				'ticket_editDate' => $datestring
			);
		$this->db->set($data);
		$this->db->where("ticket_id", $id);
		$this->db->update("ticket");
	}

}
?>

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

	public function edit_state( $id, $state, $reason ){

		$datestring = mdate('%Y-%m-%d', time());;
		$data = array(
				'status_id' => $state,
				'ticket_editDate' => $datestring
			);

		if( isset($reason) )
			$data['ticket_deniedReason'] = $reason;

		$this->db->set($data);
		$this->db->where("ticket_id", $id);
		$this->db->update("ticket");
	}

	/******** $type ********
	*  0 - Professeur
	*  1 - Agent
	*	 2 - Reunion
	****************/

	public function publish( $userID, $title, $room, $desc, $type)
	{
		$datestring = mdate('%Y-%m-%d', time());;
		$data = array(
			'ticket_description' => $desc,
			'ticket_creation'	=> $datestring,
			'ticket_title' => $title,
			'room_id' => $room,
			'user_id' => $userID,
			'status_id' => 0,
			'ticket_type' => $type
		);
		$this->db->set($data);
		$this->db->insert("ticket");
	}
	/**
	* $all 	bool 	Si vrai, selectionne tous les tickets
	*/
	public function readTickets($all, $ticketID = 0){
		$this->db->select("*");
		$this->db->from('ticket');
		$this->db->join('users','users.user_id = ticket.user_id');
		$this->db->join('status', 'status.status_id = ticket.status_id');
				if($all != TRUE)
			$this->db->where('ticket_id', $ticketID);
		$this->db->order_by('ticket_id','DESC');

		$result = $this->db->get();

		echo json_encode($result->result());
	}

}
?>

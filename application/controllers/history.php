<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller{
	public function __construct(){
			parent::__construct();
			$this->userID = 0;
			$this->load->model("ticket_database");
			if(isset($this->session->userdata['logged_in'])){
				$this->userID = $this->session->userdata['logged_in']['id'];
			}
	}

	public function index(){
		$this->layout->view("history/index");
	}

	public function getTicketsGrid(){
		$this->ticket_database->readTickets(TRUE);
	}

	public function getTicketDetail(){
		$ticketID = $_GET['ticketID'];

		$this->ticket_database->readTickets(FALSE, $ticketID);
	}
}

?>

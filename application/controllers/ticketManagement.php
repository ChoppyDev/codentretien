<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TicketManagement extends CI_Controller{
	public function __construct(){
			parent::__construct();
			$this->groups = $this->read_database->get_groups();
			$this->userID = 0;
			$this->load->model("ticket_database");
			$this->load->helper('date');
			if(isset($this->session->userdata['logged_in'])){
				$this->userID = $this->session->userdata['logged_in']['id'];
			}
	}

	public function index(){
		$this->layout->view("ticketmanagement/index");



	}

	public function ticketReadData(){
		$this->ticket_database->read_ticket_info();
	}

	public function editState(){
		$id = $_POST['id'];
		$state = $_POST['state'];
		$reason = $_POST['reason'];
		$this->ticket_database->edit_state($id,$state,$reason);

	}
}

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateTicket extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->userID = 0;
		$this->rooms = $this->read_database->get_rooms();
		$this->permissions = $this->read_database->get_permissions();
		$this->load->model("ticket_database");
		$this->load->helper('date');
		$this->layout->set_titre("MANITA - Création de ticket");
		if(isset($this->session->userdata['logged_in'])){
			$this->userID = $this->session->userdata['logged_in']['id'];
		}
	}

  public function index(){
			if($this->permission->user_as_permission($this->userID, 101)){
				$this->layout->view('createticket/index');

			}else{
				$this->layout->view('shared/permission_denied');
			}
		}

	public function publishTicket() /// flashdata
	{
		$title 		= htmlspecialchars($this->input->post("ticket_title"));
		$room 		= htmlspecialchars($this->input->post("ticket_room"));
		$desc 		= htmlspecialchars($this->input->post("ticket_description"));

		$this->ticket_database->publish($this->userID,$title,$room,$desc,0);

		redirect("home");
	}
}
?>

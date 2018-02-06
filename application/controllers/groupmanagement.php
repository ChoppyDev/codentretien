<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupmanagement extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->userID = 0;
		$this->groups = $this->read_database->get_groups();
		if(isset($this->session->userdata['logged_in'])){
			$this->userID = $this->session->userdata['logged_in']['id'];
		}
	}

	public function index(){
		$this->layout->view("Groupmanagement/index");
	}

	public function groupList(){
		echo json_encode($this->read_database->get_groups());
	}
}
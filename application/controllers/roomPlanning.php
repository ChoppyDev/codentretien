<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class roomPlanning extends CI_Controller{
	public function __construct(){
			parent::__construct();
			$this->groups = $this->read_database->get_groups();
			$this->userID = 0;
			if(isset($this->session->userdata['logged_in'])){
				$this->userID = $this->session->userdata['logged_in']['id'];
			}
	}

	public function index(){
		$this->layout->view("roomPlanning/index");
	}

}

?>

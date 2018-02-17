<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{
	public function __construct(){
			parent::__construct();
			$this->groups = $this->read_database->get_groups();
			$this->userID = 0;
			if(isset($this->session->userdata['logged_in'])){
				$this->userID = $this->session->userdata['logged_in']['id'];
			}
	}

	public function index(){
		$this->layout->view("settings/index");
	}

	public function editInfos(){
		$this->layout->view('settings/editInfos');
	}

	public function getUserInfos(){
		$this->read_database->get_user_infos($this->userID,FALSE);

	}

}

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{
	public function __construct(){
			parent::__construct();
			$this->groups = $this->read_database->get_groups();
			$this->load->model('login_database');
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
		$this->read_database->get_user_infos($this->userID, FALSE);
	}

	public function updateInfos(){
		$data = array(
			'user_firstName' => $_POST['firstName'],
			'user_lastName' => $_POST['lastName'],
			'user_email' => $_POST['email'],
			'user_numberPhone' => $_POST['numberphone']
			);

		if($_POST['newPassword'] != ""){
			$data['user_password'] = $_POST['newPassword'];
		}
		$this->login_database->user_update_infos($this->userID, $data);
	}

	public function test(){
		$data = array(
			'user_firstName'=> 'charles',
			'user_lastName' =>'xavier',
			'user_email' => 'nicolas6720@gmail.com',
			'user_numberPhone' => '0687545464'
			);

		$this->login_database->user_update_infos($this->userID, $data);
	}

}

?>

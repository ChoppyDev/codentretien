<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->groups = $this->read_database->get_groups();
		$this->userID = 0;
		$this->load->model('login_database');
		$this->load->model('group_database');
		//$this->layout->add_js('userTable');
		if(isset($this->session->userdata['logged_in'])){
			$this->userID = $this->session->userdata['logged_in']['id'];
		}
	}

	public function index(){
			if($this->permission->user_as_permission($this->userID, 1)){
				$this->layout->view('administration/index');
			}else{
				$this->layout->view('shared/permission_denied');
			}
		}

	public function userAlreadyExist(){
		echo json_encode($this->read_database->checkDouble($this->input->post('username')));
	}

	public function newUser(){
		$data = array(
				'user_login' 			=> 		$this->input->post('username'),
				'user_password'			=>		$this->input->post('password'),
				'user_idGroup'			=>		$this->input->post('group'),
				'user_email'			=>		$this->input->post('email'),
				'user_birthday'			=>		$this->input->post('birthdate'),
				'user_gender'			=>		$this->input->post('gender'),
				'user_numberphone'		=>		$this->input->post('numberphone'),
				'user_firstname'		=>		$this->input->post('firstname'),
				'user_lastname'			=>		$this->input->post('lastname')
		);

		$result = $this->login_database->user_registration($data);
		if($result == true){
			echo json_encode($data);
		}else{
			redirect('home');
		}
	}

	public function loadUsersData(){
		$this->read_database->user_grid_data();
	}
/**
* ====================================
* ===          AJAX methods        ===
* ====================================
*/
	public function userinfos(){
		$idUser = $_GET['idUser'];
		$this->read_database->get_user_infos($idUser,TRUE);
	}

	public function setUserGroup(){
		$idUser = $_POST['idUser'];
		$idGroup = $_POST['idGroup'];
		$this->group_database->updateUserGroup($idUser, $idGroup);
	}
}
?>

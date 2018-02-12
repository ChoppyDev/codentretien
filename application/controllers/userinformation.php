<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userinformation extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->userID = 0;
		$this->rooms = $this->read_database->get_rooms();
		$this->permissions = $this->read_database->get_permissions();
		$this->load->model('login_database');
		$this->username = $this->session->userdata['logged_in']['username'];
		$this->infos = $this->login_database->read_user_information($this->username);
		$this->layout->set_titre("MANITA - Création de ticket");
		if(isset($this->session->userdata['logged_in'])){
			$this->userID = $this->session->userdata['logged_in']['id'];
		}
	}

  public function index(){
			if($this->permission->user_as_permission($this->userID, 101)){
				$this->layout->view('userinformation/index');
				print_r($this->infos[0]);
				
			}else{
				echo 'accès refusé';
			}
		}
}

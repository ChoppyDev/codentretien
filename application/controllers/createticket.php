<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateTicket extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->userID = 0;
		$this->permissions = $this->read_database->get_permissions();
		if(isset($this->session->userdata['logged_in'])){
			$this->userID = $this->session->userdata['logged_in']['id'];
		}
	}

  public function index(){
			if($this->permission->user_as_permission($this->userID, 101)){
				$this->layout->view('createticket/index');
			}else{
				echo 'accès refusé';
			}
		}
}

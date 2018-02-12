<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->username = $this->session->userdata["logged_in"]['username'];
		$this->infos = $this->login_database->read_user_information($this->username);
		$this->layout->set_titre("MANITA - Accueil");
		if(isset($this->session->userdata['logged_in'])){
			$this->userID = $this->session->userdata['logged_in']['id'];
		}
	}
	/**
	* @todo faire une page d'erreur pour les permissions
	*/
	public function index(){

		if(isset($this->session->userdata['logged_in'])){
			$this->layout->view('home/index');
		} else{
			redirect('login'); // remplacer par page erreur permissions
		}
	}	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function _construct(){
		parent::_construct();
	}
	/**
	* @todo faire une page d'erreur pour les permissions
	*/
	public function index(){

		if(isset($this->session->userdata['logged_in'])){
			$this->layout->view('home/index');
		} else{
			redirect('login'); // solution temporaire
		}
	}
	
	
}

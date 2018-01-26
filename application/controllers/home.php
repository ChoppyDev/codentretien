<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
		parent::__construct();
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

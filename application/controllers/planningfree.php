<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlanningFree extends CI_Controller{
	public function __construct(){
			parent::__construct();

			if(isset($this->session->userdata['logged_in'])){
				$this->userID = $this->session->userdata['logged_in']['id'];
			}
	}

	public function index(){
		$this->layout->view("planningfree/index");
	}
}

?>

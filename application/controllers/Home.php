<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Home extends CI_Controller {

	function _construct(){
		parent::_construct();
		

	}


	/**
	 * Index Page for this controller.
	 */


	public function index(){
		//load
		$this->load->library('layout', 'Form_validation');
		$this->load->library('session');
		$this->load->helper(array('url','form'));
		$this->load->model('login_database');
		//Layout
		$this->layout->add_css('global');
		$this->layout->set_titre('Codentretien');
		$this->layout->view('shared/connexion_form');
	}
	/**
	* @todo set_rules : xss_clean AND Trim
	* @todo 
	*/
	public function login_process(){

		$this->load->model('login_database');
		$this->form_validation->set_rules('username', 'Username','required'); 
		$this->form_validation->set_rules('password', 'Password','required');

		if($this->form_validation->run() == FALSE){ 
			if(isset($this->session->userdata['logged_in'])){ 
				$this->load->view('index_page'); 
			} else{
				$this->load->view('shared/connexion_form'); 
				echo "connexion formfdfsdfdsf";
			}
		} else{ 
			$data = array( 
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')

			);
			$result = $this->login_database->login($data);
			echo $result;
			if($result == TRUE){
				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				if($result != FALSE){
					$session_data = array(
						'username' => $result[0]->username,
						'email' => $result[0]->email, // facultatif
						);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					echo pre($session_data);
					$this->load->view('index_page');
				}
			} else{
				$data = array('error_message' => 'Mot de passe invalide test');
				$this->load->view('shared/connexion_form', $data);
				echo "false";
			}
		}
	}
}



		//$this->layout->add_js('jquery-3.2.1.min');
		//$this->layout->add_js('jquery.jqGrid.min');
		//$this->layout->add_js('jqgrid_pack/js/trirand/i18n/grid.locale-en');
		//$this->layout->add_js('grid'); // remplacer par une arraylist et changer la racine des js + css
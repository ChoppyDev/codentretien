<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}


	/**
	 * Index Page for this controller.
	 */


	public function index(){
		$data = array();
		//load
		$this->load->helper(array('url','form'));
		$this->load->model('login_database');
		//Layout
		$this->layout->set_titre('Codentretien');
		$this->layout->view('shared/connexion_form', $data);
	}

	/** 
	* Simple login process
	* @todo set_rules : xss_clean AND Trim
	* @todo
	*/
	public function login_process(){

		$this->load->model('login_database');
		$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('password', 'Password','required');

		if($this->form_validation->run() == FALSE){

			if(isset($this->session->userdata['logged_in'])){
				redirect('home');				
			} else{
				$this->session->set_flashdata('error_login', 'Identifiant ou mot de passe invalide');
				redirect('login');

			}
		} else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$result = $this->login_database->login($data);
			if($result == TRUE){
				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				if($result != FALSE){
					$session_data = array(
						'username' => $result[0]->user_login,
						'email' => $result[0]->user_email,
						'id'=> $result[0]->user_id,
						'firstname'=>$result[0]->user_firstName,
						'lastname'=>$result[0]->user_lastName,
						);
					$this->session->set_userdata('logged_in', $session_data);
					//echo pre($session_data);
					redirect("home");
				}
			} else{
				
				$this->session->set_flashdata('error_login', 'Identifiant ou mot de passe invalide');
				redirect('login');
			}
		}
	}
		/**
		* Remove session data and redirect to login page
		*/
	public function logout() {
		$sess_array = array('username' => '');
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('login');
		$this->load->view('shared/connexion_form');
	}
}

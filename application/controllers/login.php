<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Login extends CI_Controller {

	function _construct(){
		parent::_construct();


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
		$this->layout->add_css('global');
		$this->layout->set_titre('Codentretien');
		$this->layout->view('shared/connexion_form', $data);
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
						'username' => $result[0]->username,
						'email' => $result[0]->email,
						);
					$this->session->set_userdata('logged_in', $session_data);
					echo pre($session_data);
					redirect("home");
				}
			} else{
				
				$this->session->set_flashdata('error_login', 'Identifiant ou mot de passe invalide');
				redirect('login');
			}
		}
	}
/**
* Remove session data
*/
		public function logout() {
			$sess_array = array(
				'username' => ''
				);
			$this->session->unset_userdata('logged_in', $sess_array);
			$data['message_display'] = 'Successfully Logout';
			redirect('login');
			$this->load->view('shared/connexion_form', $data);
		}
}



		//$this->layout->add_js('jquery-3.2.1.min');
		//$this->layout->add_js('jquery.jqGrid.min');
		//$this->layout->add_js('jqgrid_pack/js/trirand/i18n/grid.locale-en');
		//$this->layout->add_js('grid'); // remplacer par une arraylist et changer la racine des js + css

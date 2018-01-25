<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index(){
		
		
		$data = array();
		$data['pseudos'] = 'Nicolas';
		$data['email'] = 'nicolas@test.fr';
		$data['en_ligne'] = true;
		$data['date'] = "18/07/2017";
		$test = array ('1','2','3');
		$titre ='test';
		
		$this->load->model('news_model');
		$this->load->library('layout');
		
		// $resultat = $this->news_model->editer_news(3,'deuxieme titre lol',"t'as vu j'ai édité lol");
		// var_dump($resultat);
		$data['liste_news']= $this->news_model->liste_news(); // compteur

		// $test =array('test');
		// $this->load->view('Home/index',$data);
		$this->layout->set_titre('titre');
		$this->load->helper('url');
		$this->layout->views('shared/premiere_vue')
					
					->view('shared/deuxieme_vue');

		

		// $this->output->enable_profiler(true); //fonction pour espionner les variables 
		
		// $test = 'style';
		// echo pre($data); // fonction en test pour le moment
		// echo css_url('test');
		
		// echo site_url($test);
		// url('Page de connexion', 'user', 'connexion','bite','chatte');

		
		
	}
	
	
	
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model
{
   protected $table = 'news';

   /**
	*	Ajout d'une news
	*
	*	@param string $auteur L'auteur de la news
	*	@param string $titre Le titre de la news
	*	@param $contenu Le contenu de la news
	*	@return bool Le résultat de la requete
   */
	public function ajouter_news($auteur, $titre, $contenu){
		//données échappées
		$this->db->set('auteur', $auteur);
		$this->db->set('titre', $titre);
		$this->db->set('contenu', $contenu);

		// données non échappées
		$this->db->set('date_ajout','NOW()', false);
		$this->db->set('date_modif','NOW()', false);

		return $this->db->insert($this->table);

	}
	/**
	* A commenter
	*/

	public function editer_news($id, $titre = null, $contenu = null){

		//si il y a rien à éditer
		if($titre == null AND $contenu == null){
			return false;
		}

		// Données Echappées
		if($titre != null){
			$this->db->set('titre', $titre);
		}
		if($contenu != null){
			$this->db->set('contenu', $contenu);
		}

		//Données non échappées
		$this->db->set('date_modif','NOW()', false);

		// Where conditionnel pour changer sous plusieurs conditions
		if(is_array($id)){
			$this->db->where($id);
		}
		else{
			$this->db->where('id', (int) $id);
		}
		return $this->db->update($this->table);



	}
	/**
	*A commenter
	*/
	public function supprimer_news($id){
		return $this->db->where('id',(int)$id)
			->delete($this->table);

	}

	/*
	*	Retourne le nombre de news
	*/
	public function count($where = array()){

		return (int) $this->db->where($where)
					->count_all_results($this->table);
	}

	/*
	* 	retourne la liste des news
	*/
	public function liste_news($nb = 10, $debut = 0){

		return $this->db->select('*')
				->from($this->table)
				->limit($nb, $debut)
				->order_by('id','desc')
				->get()
				->result();
	}

}
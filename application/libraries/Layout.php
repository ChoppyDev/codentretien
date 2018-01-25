<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $var = array();
	private $theme = 'default';
	
/*
|===============================================================================
| Constructeur
|===============================================================================
*/
	
	public function __construct()
	{
		$this->CI =& get_instance();

		$this->var['output'] = '';

		//Titre
		$this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());

		//	Nous initialisons la variable $charset avec la même valeur que
		//	la clé de configuration initialisée dans le fichier config.php
		$this->var['charset'] = $this->CI->config->item('charset');

		$this->var['css'] = array();
		$this->var['js'] = array();
	}
	
/*
|===============================================================================
| Méthodes pour charger les vues
|	. view
|	. views
|===============================================================================
*/
	
	public function view($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);

		$this->CI->load->view('../views/shared/'.$this->theme,$this->var);
	}
	
	public function views($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);

		return $this;
	}


/*
|===================================================================
|	Méthodes pour modifier les variables du layout || SETTERS
|	.set_titre
|	.set_charset
|	.set_theme
|===================================================================
*/
	public function set_titre($titre)
	{
		if(is_string($titre) AND !empty($titre))
		{
			$this->var['titre'] = $titre;
			return true;
		}
		return false;
	}

	public function set_charset($charset)
	{
		if(is_string($charset) AND !empty($charset))
		{
			$this->var['charset'] = $charset;
			return true;
		}
		return false;
	}

	public function set_theme($theme)
	{
		if(is_sting($theme) AND !empty($theme) AND file_exists('./application/views/shared/'. $theme . '.php'))
		{
			$this->theme = $theme;
			return true;
		}
		return false;
	}

/*
|==================================================================
|	Méthodes pour ajouter des feuilles de CSS et JS automatiquement
|	.add_css
|	.add_js
|==================================================================
*/
	public function add_css($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom .'.css'))
		{
			$this->var['css'][] = css_url($nom);
			return true;
		}
		return false;
	}

	public function add_js($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/js/' . $nom . '.js'))
		{
			$this->var['js'][] = js_url($nom);
			return true;
		}
		return false;
	}

}
/* End of file layout.php */
/* Location: ./application/libraries/layout.php */
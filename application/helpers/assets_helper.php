<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');
/** fonction css_url
 Renvoie le lien de la feuille de style
 
 @param String Nom
 */
 
if (! function_exists('css_url')){
	function css_url($nom){
		return base_url().'assets/css/'.$nom.'.css';
	}
}
/** Fonction js_url
Renvoie le lien du script js

@param String Nom
*/

if(! function_exists('js_url')){
	function js_url($nom){
		return base_url(). 'assets/js/'.$nom.'.js';
	}
}
/** Fonction img_url
Renvoie le lien du script js

@param String Nom ATTENTION: Préciser l'extension à la fin
*/

if (! function_exists('img_url')){
	function img_url($nom){
		return base_url().'assets/images/'.$nom;
	}
}

/** Fonction img
Renvoie l'image directement en mettant juste le nom de l'image

@param String Nom 
@param String alt
*/
if (! function_exists('img')){
	function img($nom, $alt=''){
		return '<img src="'.img_url.'" alt="'.$alt.'" />';	
	}
}


?>
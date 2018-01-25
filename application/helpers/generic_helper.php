<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');
/**
* Fonction prewiew
* @object
*/

if (!function_exists('pre')){
	function pre($out){
		echo "<pre>".implode(",",$out)."</pre>";
	}	
} 

?>
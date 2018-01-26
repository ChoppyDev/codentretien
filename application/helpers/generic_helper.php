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
/** 
* Fonction in array pour array à multidimension
* @return boolean 
*/

if (!function_exists('in_array_r')){
	function in_array_r($needle, $haystack, $strict = false){
		foreach ($haystack as $item){
			if(($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict ))){
				return true;
			}
		}
		return false;
	}
}

?>
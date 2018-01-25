<?php

defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('site_url'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function site_url($uri = '', $protocol = NULL)
	{
		if (! is_array($uri)){
			$uri = func_get_args();
		}
		return get_instance()->config->site_url($uri, $protocol);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('url'))
{
	/**
	* Source url
	*
	* Return the source url based on your basepath
	* @param string $text
	* @param string $uri
	* @return string html url
	*/
	
	function url($text, $uri = '')
	{
		if( ! is_array($uri)){
			$uri = func_get_args();
			
			// suppression de la variable $text
			array_shift($uri);
		}
		echo '<a href="'.site_url($uri).'">'.htmlentities($text).'</a>';
		return'';
	}
	
	
	
	
	
}


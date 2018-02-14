<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{
	public function __construct(){
			parent::__construct();
	}

	public function index(){
    echo '</br>';

    $data = array(
      array("bite", "teub", "moule"),
      array("--","--","--"),
      array("--","--","--"),
      array("--","--","--"),
      array("--","--","--")
    );

    $this->planning->init($data);
    $this->planning->generate();
	}
}

?>

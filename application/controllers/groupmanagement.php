<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Groupmanagement extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->userID = 0;
		$this->permissions = $this->read_database->get_permissions();
		$this->load->model('group_database');
		if(isset($this->session->userdata['logged_in'])){
			$this->userID = $this->session->userdata['logged_in']['id'];
		}
	}

	public function index(){
		$this->layout->view("Groupmanagement/index");
	}

	
/** ===========================================
*	== 			AJAX Functions       		==
*==============================================
*/
/**
* Liste des groupes existants
*/
	public function groupList(){
		echo json_encode($this->read_database->get_groups());
	}

/**
* Renvoie les permissions du groupe selectionné
*/
	public function permissionsByGroup(){
		$group = $_GET['group'];
		echo json_encode($this->read_database->permissionsGroupList($group));
	}

	public function savePermissions(){
		$idGroup = $_POST['idGroup'];
		$labelGroup = $_POST['newlabelgroup'];
		$permissions = $_POST['permissions'];

		$this->group_database->updateGroupLabel(	$idGroup, 	$labelGroup);
		$this->group_database->updatePermissions(	$idGroup, 	$permissions);
	}

	public function createGroup(){
		$labelGroup = $_POST['labelGroup'];
		$permissions = $_POST['permissions'];

		$this->group_database->createGroup($labelGroup, $permissions);
	}
}
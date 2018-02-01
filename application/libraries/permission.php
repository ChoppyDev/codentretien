<?php  if(!defined('BASEPATH')) exit ('No direct script allowed');

class Permission{

	protected $CI;
	private $where = array();
    private $set = array();
    private $required = array();
    private $userID;
    private $permissionID;
	
	public function __construct(){
		$this->CI =& get_instance();
		$this->idGroup = ($this->CI->session->userdata('idGroup')) ? $this->CI->session->userdata('idGroup') : 0;
	}
	/**
	* @return arrayList Return an id Arraylist with group permissions
	*/
	function get_group_permissions($groupID){

		$this->CI->db->select('Permissions.idPermission');
		$this->CI->db->from('permissions');
		$this->CI->db->join('map_permissions', 'map_permissions.idPermission = permissions.idPermission');
		$this->CI->db->where('idGroup', $groupID);

		$query = $this->CI->db->get();

		if($query->num_rows()){
			foreach ($query->result_array() as $row) {
				$permissions[] = $row['idPermission'];
			}
			return $permissions;
		}else{
			return false;
		}
	}

	function user_as_permission($userID, $permissionID){

		$this->CI->db->select('Permissions.idPermission');
		$this->CI->db->from('permissions');
		$this->CI->db->join('map_permissions', 'map_permissions.idPermission = permissions.idPermission');
		$this->CI->db->join('users', 'users.user_iDgroup = map_permissions.idGroup');
		$this->CI->db->where('user_id', $userID);

		$query = $this->CI->db->get();
		$result = $query->result_array();
		
		if($query->num_rows()){
			if(in_array_r($permissionID, $result)){
				return true;
			}
		}
		return false;
	}

	function add_permission_to_group($groupID, $permissionID){
		$this->CI->db->insert('map_permissions', $permissionID);
		$this->CI->db->from('');
		$this->CI->db->where('groupID', $groupID);
	}
}

?>
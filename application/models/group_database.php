<?php 
Class Group_database extends CI_model{

	public function updateGroupLabel($idGroup, $labelGroup){
		$this->db->set('labelGroup', $labelGroup);
		$this->db->where('idGroup', $idGroup);
		$this->db->update('group');

		echo $this->db->last_query();
	}

	public function updatePermissions($idGroup, $permissions){
		$this->db->where('idGroup', $idGroup);
		$this->db->delete('map_permissions');

		foreach ($permissions as $id => $idPerm) {
			$data = array(	'idGroup' 		=> 	$idGroup,
			 				'idPermission' 	=> 	$idPerm);
			$this->db->insert('map_permissions', $data);
		}
	}
} 

?>
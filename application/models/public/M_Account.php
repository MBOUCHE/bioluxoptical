<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Account extends CI_Model {

	public function getSliceAge () {
		return $this->db->select('id_slice_age, label, content')->order_by('id_slice_age', 'DESC')->get('slice_age');
	}

	public function getRoles () {
		return $this->db->select('id_role, name_role')->where('name_role !=', 'ADMINISTRATEUR')->order_by('level_role', 'DESC')->get('role');
	}
	
	public function getCountry () {
		return $this->db->select('id_country, num_zone')->get('country');
	}

	public function getIdsAdm(){
		return $this->db->where('name_role', 'ADMINISTRATEUR')->get('role');
	}

	public function getIdsMan(){
		return $this->db->where('name_role', 'MANAGER')->get('role');
	}

	public function getIdsAbo(){
		return $this->db->where('name_role', 'ABONNE')->get('role');
	}

	public function getIdsCurrent($id_user_sess){
		$IdsCurrent = $this->db->where('id_user', $id_user_sess)->get('users_role');
		if (is_null($IdsCurrent)) {
			return $this->db->where('id_costomer', $id_user_sess)->get('customer_role');
		}
		return $IdsCurrent;
	}
	
}

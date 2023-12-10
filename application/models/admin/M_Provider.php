<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Provider extends CI_Model{
	// return all data provider
	function select_all(){
		return $this->db->get('provider');
	}
	// return one provider
	function get_provider($id_prov){
		$this->db->where('id_prov',$id_prov);
		return $this->db->get('provider');
	}
	// store new provider to database
	function save($name_prov, $social_reason, $contact, $code_number, $description, $termes, $id_user, $type_prov, $date_reg_prov, $img_logo){

		$params = array(
		'name_prov' => $name_prov,
		'social_reason' => $social_reason,
		'img_logo' => $img_logo,
		'description' => $description,
		'code_number' => $code_number,
		'id_user' => $id_user,
		'termes' => $termes,
		'contact' => $contact,
		'type_prov' => $type_prov
		);
		return $this->db->insert('provider',$params);
	}
	// update data provider
	function update($id_prov, $name_prov, $social_reason, $contact, $code_number, $description, $termes, $id_user, $type_prov, $date_reg_prov, $img_logo){

		$params = array(
		'name_prov' => $name_prov,
		'social_reason' => $social_reason,
		'img_logo' => $img_logo,
		'description' => $description,
		'code_number' => $code_number,
		'id_user' => $id_user,
		'termes' => $termes,
		'contact' => $contact,
		'type_prov' => $type_prov
		);
		//var_dump($params, $id_prov); die;
		return $this->db->where('id_prov', $id_prov)->update('provider', $params);
	}
	// delete provider record
	function delete($id_prov){
		$this->db->where('id_prov',$id_prov);
		$this->db->delete('provider');
	}


	// update data provider
	function activate($id_prov, $state_prov){
		$this->db->where('id_prov', $id_prov);
		if ($state_prov == 1) {
			
			$params = array('state_prov' => 0);
		}
		else{
			$params = array('state_prov' => 1);
		}

		$this->db->update('provider',$params);
	}
}
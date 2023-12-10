<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Reason extends CI_Model{



	public function getGlasses($id_cat = null) {

		if (!is_null($id_cat)) {
			return $this->db->where('state_reason=1')->where('type_reason.name_type=', 'LUNETTE')
							->where('id_cat_reason', $id_cat)->join('type_reason', 'reason.type_reason=type_reason.id_type')
							->get('reason');
		}
		return $this->db->where('state_reason=1')->where('type_reason.name_type=', 'LUNETTE')
						->join('type_reason', 'reason.type_reason=type_reason.id_type')
						->get('reason');
	}

	public function getGlassesOnly($id_cat = null) {

		if (!is_null($id_cat)) {
			return $this->db->where('state_reason=1')->where('type_reason.name_type=', 'VERRE')
							->where('id_cat_reason', $id_cat)->join('type_reason', 'reason.type_reason=type_reason.id_type')
							->get('reason');
		}
		return $this->db->where('state_reason=1')->where('type_reason.name_type=', 'VERRE')
						->join('type_reason', 'reason.type_reason=type_reason.id_type')
						->get('reason');
	}

	public function getMesurePublic($id_mes = null) {

		if (!is_null($id_mes)) {
			return $this->db->where('state_mes', 1)->where('id_mes', $id_mes)->get('mesure');
		}
		return $this->db->where('state_mes', 1)->get('mesure');
	}

	public function getMesure($id_mes = null) {

		if (!is_null($id_mes)) {
			return $this->db->where('id_mes', $id_mes)->get('mesure');
		}
		return $this->db->where('id_mes', $id_mes)->get('mesure');
	}

	public function getMounts($id_cat = null) {

		if (!is_null($id_cat)) {
			return $this->db->where('state_reason=1')->where('type_reason.name_type=', 'MONTURE')
							->where('id_cat_reason', $id_cat)->join('type_reason', 'reason.type_reason=type_reason.id_type')
							->get('reason');
		}
		return $this->db->where('state_reason=1')->where('type_reason.name_type=', 'MONTURE')
						->join('type_reason', 'reason.type_reason=type_reason.id_type')
						->get('reason');
	}
	
	// return all data reason
	function select_all($id_mag=null){
		if (!is_null($id_mag)) {
			return $this->db->where('propose.id_mag', $id_mag)->join('type_reason', 'type_reason.id_type=reason.type_reason')
						->join('users', 'users.id_user=reason.id_user')
						->join('category', 'category.id_cat=reason.id_cat_reason')
						->join('propose', 'propose.id_reason=reason.id_reason')
						->join('storeshop', 'storeshop.id_mag=propose.id_mag')
						->get('reason');
		}
		return $this->db->join('type_reason', 'type_reason.id_type=reason.type_reason')
						->join('users', 'users.id_user=reason.id_user')
						->join('category', 'category.id_cat=reason.id_cat_reason')
						//->join('propose', 'propose.id_reason=reason.id_reason')
						->get('reason');
	}
	// return one reason
	function get_reason($id_reason){
		$this->db->where('id_reason',$id_reason);
		return $this->db->get('reason')->row_object();
	}
	// store new reason to database
	function save($name_reason, $code_reason, $price_reason, $old_price, $origine_reason, $type_reason, $note_reason, $img_reason, $img2_reason, $id_sub_cat_reason, $id_user, $description_reason, $date_manufacturate, $date_experation){
		$params = array(
		'name_reason' => $name_reason,
		'code_reason' => $code_reason,
		'price_reason' => $price_reason,
		'old_price' => $old_price,
		'origine_reason' => $origine_reason,
		'type_reason' => $type_reason,
		'note_reason' => $note_reason,
		'img_reason' => $img_reason,
		'img2_reason' => $img2_reason,
		'id_sub_cat' => $id_sub_cat_reason,
		'id_cat_reason' => $this->db->where('id_sub_cat', $id_sub_cat_reason)->get('sub_category')->row_object()->id_cat,


		'id_user' => $id_user,
		'description_reason' => $description_reason,
		//'date_reg_reason' =>  date('m/d/Y h:i:s', time()),
		'date_manufacturate' => $date_manufacturate,
		'date_experation' => $date_experation
		);

		return $this->db->insert('reason',$params);
	}
	// update data reason
	function update($id_reason, $name_reason, $code_reason, $price_reason, $old_price, $origine_reason, $type_reason, $note_reason, $img_reason, $img2_reason, $id_sub_cat_reason, $id_user, $description_reason, $date_manufacturate, $date_experation){

		$params = array(
		'id_reason' => $id_reason,
		'name_reason' => $name_reason,
		'code_reason' => $code_reason,
		'price_reason' => $price_reason,
		'old_price' => $old_price,
		'origine_reason' => $origine_reason,
		'type_reason' => $type_reason,
		'note_reason' => $note_reason,
		'img_reason' => $img_reason,
		'img2_reason' => $img2_reason,
		'id_sub_cat' => $id_sub_cat_reason,
		'id_cat_reason' => $this->db->where('id_sub_cat', $id_sub_cat_reason)->get('sub_category')->row_object()->id_cat,


		'id_user' => $id_user,
		'description_reason' => $description_reason,
		//'date_reg_reason' =>  date('m/d/Y h:i:s', time()),
		'date_manufacturate' => $date_manufacturate,
		'date_experation' => $date_experation
		);

		return $this->db->where('id_reason',$id_reason)-> update('reason',$params);
	}
	// delete reason record
	function delete($id_reason){
		$reason_delete = $this->db->where('id_reason',$id_reason)->get('reason')->row_object();
		$path = $_SERVER['DOCUMENT_ROOT'].'/bioluxoptical/assets/img/reason/'.$reason_delete->img_reason;
		if (is_file($path)) {
			unlink($path);
		} 
		$this->db->where('id_reason',$id_reason)->delete('reason');
	}


	// update data reason
	function activate($id_reason, $state_reason){
		$this->db->where('id_reason', $id_reason);
		if ($state_reason == 1) {
			
			$params = array('state_reason' => 0);
		}
		else{
			$params = array('state_reason' => 1);
		}

		$this->db->update('reason',$params);
	}

	function getTypeRea(){
		return $this->db->get('type_reason');
	}

	function affect($id_reason, $id_mag, $duration_prop, $description_prop, $quantity, $id_user, $img_prop){

		$exit = $this->db->where('id_reason', $id_reason)->where('id_mag', $id_mag)->get('propose')->row_object();
		
		$params = array(
		'id_reason' => $id_reason,
		'id_mag' => $id_mag,
		'img_prop' => $img_prop,
		'quantity' => $quantity,
		'duration_prop' => $duration_prop,
		'description_prop' => $description_prop,
		'id_user' => $this->session->userdata['auth_user']["id_user"]
		
		);
		if (is_null($exit)) {
			return $this->db->insert('propose',$params); 
		}
		else{

			return $this->db->where('id_reason',$id_reason)->where('id_mag',$id_mag)-> update('propose',$params);
		}
	}
}
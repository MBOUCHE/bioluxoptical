<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mag extends CI_Model {
	public function __construct() {
            $this->load->database();
    }
    
	public function addMag($po_box, $phone_ss, $description, $longitude, $latitude, $altitude, $building_img, $id_town, $date_reg_mag){
		$data = array(
			'po_box' => $po_box,
			'phone_ss' => $phone_ss,
			'description' => $description,
			'longitude' => $longitude,
			'latitude' => $latitude,
			'altitude' => $altitude,
			'building_img' => $building_img,
			'id_town' => $id_town,
			'date_reg_mag' => $date_reg_mag
		);
		return $this->db->insert('storeshop', $data);		
	}

	public function updMag($id_mag, $po_box, $phone_ss, $description, $longitude, $latitude, $altitude, $building_img, $id_town){
		$data = array(
			'po_box' => $po_box,
			'phone_ss' => $phone_ss,
			'description' => $description,
			'longitude' => $longitude,
			'latitude' => $latitude,
			'altitude' => $altitude,
			'building_img' => $building_img,
			'id_town' => $id_town
		);
		return $this->db->where('id_mag', $id_mag)->update('storeshop', $data);		
	}

	public function changeState($id_mag) {
		if ($this->db->where('id_mag', $id_mag)->get('storeshop')->result_array()[0]['state_mag']=='1') {
			return $this->db->where('id_mag', $id_mag)->set('state_mag', '0')->update('storeshop');
		}
		return $this->db->where('id_mag', $id_mag)->set('state_mag', '1')->update('storeshop');
	}

	public function delMag($id_mag) {
		$this->db->where('id_mag', $id_mag)->delete('storeshop');
	}
}
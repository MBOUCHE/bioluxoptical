<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Material extends CI_Model{
	

	function select_all($id_mag=null){
		if (!is_null($id_mag)) {
			return $this->db->where('id_mag', $id_mag)->where('state_mat', 1)
							->join('attribute', 'attribute.id_mat=material.id_mat')
							//->join('attribute', 'attribute.id_mag=storeshop.id_mag')
							->get('material');
		}
		return $this->db->get('material');
	}
	// return one reason
	function get_material($id_mat){
		$this->db->where('id_mat',$id_mat);
		return $this->db->get('material')->row_object();
	}
	// store new reason to database
	function save($name_mat, $reg_num_mat, $desc_mat, $img_mat){
		$params = array(
		'name_mat' => $name_mat,
		'reg_num_mat' => $reg_num_mat,
		'desc_mat' => $desc_mat,
		'img_mat' => $img_mat,
		
		);
		//var_dump($params); die;
		return $this->db->insert('material',$params);
	}
	// update data material
	function update($id_mat, $name_mat, $reg_num_mat, $desc_mat, $img_mat){
		$params = array(
		'name_mat' => $name_mat,
		'reg_num_mat' => $reg_num_mat,
		'desc_mat' => $desc_mat,
		'img_mat' => $img_mat,
		
		);
		//var_dump($params); die;

		return $this->db->where('id_mat',$id_mat)-> update('material',$params);
	}
	// delete reason record
	function delete($id_mat){
		$mat_delete = $this->db->where('id_mat',$id_mat)->get('material')->row_object();
		$path = $_SERVER['DOCUMENT_ROOT'].'/bioluxoptical/assets/img/material/'.$mat_delete->img_mat;
		if (is_file($path)) {
			unlink($path);
		} 
		$this->db->where('id_mat',$id_mat)->delete('material');
	}


	// update data material
	function activate($id_mat, $state_mat){
		$this->db->where('id_mat', $id_mat);
		if ($state_mat == 1) {
			
			$params = array('state_mat' => 0);
		}
		else{
			$params = array('state_mat' => 1);
		}

		$this->db->update('material',$params);
		//return get_material($id_mat);
	}

	function affect($id_mat, $id_mag, $quantity, $duration_prop, $description_prop, $img_prop){
		$exit = $this->db->where('id_mat', $id_mat)->where('id_mag', $id_mag)->get('attribute')->row_object();
		
		$params = array(
		'id_mat' => $id_mat,
		'id_mag' => $id_mag,
		'img_prop' => $img_prop,
		'quantity' => $quantity,
		'duration_prop' => $duration_prop,
		'description_prop' => $description_prop,
		'id_user' => $this->session->userdata['auth_user']["id_user"]
		
		);
		if (is_null($exit)) {
			return $this->db->insert('attribute',$params); 
		}
		else{

			return $this->db->where('id_mat',$id_mat)->where('id_mag',$id_mag)-> update('attribute',$params);
		}
	}


}
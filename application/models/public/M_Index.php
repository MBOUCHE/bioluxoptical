<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Index extends CI_Model {
    
	public function getGenServices(){
		return $this->db->where('state_reason', 1)
						->where('name_type=', 'GENERIQUE')
						->join('category', 'category.id_cat=reason.id_cat_reason')
						->join('type_reason', 'type_reason.id_type=reason.type_reason')
						->get('reason');
	}

	public function getOthServices(){
		return $this->db->where('state_reason', 1)
						->where('name_type=', 'SERVICE')
						->join('category', 'category.id_cat=reason.id_cat_reason')
						->join('type_reason', 'type_reason.id_type=reason.type_reason')
						->get('reason');
	}

	public function getThisStoreShope($id_mag){
		return $this->db->where('storeshop.id_mag =', $id_mag)
						//->join('users', 'users.id_mag=storeshop.id_mag')
						->get('storeshop');
	}

	public function getHisStoreShopeServices($id_mag){
		return $this->db->select('name_type, reason.id_reason, name_reason, code_reason, price_reason, old_price, origine_reason, note_reason, date_manufacturate, date_experation, label_c_cat, reason.id_sub_cat, description_reason, category.label, img_reason')
						->where('reason.state_reason =', 1)
						->where('propose.id_mag =', $id_mag)
						->like('type_reason.name_type', 'SERVICE', 'both')
						->or_like('type_reason.name_type', 'GENERIQUE', 'both')
						->where('reason.state_reason =', 1)
						->where('propose.id_mag =', $id_mag)
						->join('reason', 'reason.id_reason=propose.id_reason')
						->join('type_reason', 'type_reason.id_type=reason.type_reason')
						->join('sub_category', 'sub_category.id_sub_cat=reason.id_sub_cat')
						->join('category', 'category.id_cat=reason.id_cat_reason')
						->get('propose');
	}

	public function getHisStoreShopeArticle($id_mag){
		return $this->db->select('name_type, reason.id_reason, name_reason, code_reason, price_reason, old_price, origine_reason, note_reason, date_manufacturate, date_experation, label_c_cat, reason.id_sub_cat, description_reason, category.label, img_reason')
						->where('propose.id_mag =', $id_mag)
						->where('reason.state_reason =', 1)
						->like('type_reason.name_type', 'MONTURE', 'both')
						->or_like('type_reason.name_type', 'VERRE', 'both')
						->where('propose.id_mag =', $id_mag)
						->where('reason.state_reason =', 1)
						->or_like('type_reason.name_type', 'LUNETTE', 'both')
						->where('propose.id_mag =', $id_mag)
						->where('reason.state_reason =', 1)
						->join('reason', 'reason.id_reason=propose.id_reason')
						->join('type_reason', 'type_reason.id_type=reason.type_reason')
						->join('sub_category', 'sub_category.id_sub_cat=reason.id_sub_cat')
						->join('category', 'category.id_cat=reason.id_cat_reason')
						->get('propose');
	}

	public function getThisTown($id_town){
		return $this->db->where('storeshop.id_town =', $id_town)->where('storeshop.state_mag =', 1)
						->join('town', 'town.id_town=storeshop.id_town')->get('storeshop');
	}

	public function getNb_visit(){

		return $this->db->where('date', date("Y/m/d"))->count_all_results('visites_jour');
	}

	public function getNb_client(){

		return $this->db->where('state', 1)->count_all_results('customer_role');
	}

	public function getVisites(){
		return $this->db->order_by('visites', 'DESC')->get('visites_jour', $this->getCount_visit(), $this->getCount_visit()-7);
	}

	public function getVisitesR(){

		return $this->db->order_by('visites', 'ASC')->get('visites_jour', $this->getCount_visit(), $this->getCount_visit()-7);
	}

	public function maXcurrentVisites(){

		return $this->db->select_max('visites')->get('visites_jour', $this->getCount_visit(), $this->getCount_visit()-7);
	}

	public function getCount_visit(){

		return $this->db->count_all_results('visites_jour');
	}
}
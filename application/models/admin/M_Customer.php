<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Customer extends CI_Model{
	

	function select_all(){

		$all = $this->db->get('customer');

		foreach ($all->result_array() as $key) {
			$r = $this->db->where('id_user', $key['id_costomer'])->get('customer_role')->row_object();
			if (is_null($r)) {
				//$this->db->insert('customer_role', ['id_user' => $key['id_costomer'], 'id_role' => 5]);
			}
		}
		return $this->db->join('customer_role', 'customer_role.id_user=customer.id_costomer')->get('customer');
	}

	function askConsult(){

		return $this->db->insert('communicate', ['date_init' =>  date('Y-m-d H:i:s'), 
												 'date_end' =>  null,
												 'pattern' =>  'CONSULTATION',
												 'descrip' =>  $this->input->post('descrip'),
												 'subject' => $this->session->userdata['auth_user']["id_user"]
												]);
	}

	function select_all_news(){
		return $this->db->where('state', -1)->join('customer_role', 'customer_role.id_user=customer.id_costomer')->get('customer');
	}
	// return one reason
	function get_customer($id_costomer){
		$this->db->where('id_costomer', $id_costomer);
		return $this->db->join('customer_role', 'customer_role.id_user=customer.id_costomer')->get('customer')->row_object();
	}

	public function createCustomer ($fname_cost, $sname_cost, $genre, $id_slice_age, $profession, $email, $phone, $password, $profile_img, $id_country) {

		if ($profile_img == '' and $genre == 1) {
			$profile_img = 'defaultMan.png';
		}
		elseif ($profile_img == '' and $genre == 2){
			$profile_img = 'defaultWoman.png';
		}

		if ($genre ==2) {
			$genre =0;
		}
		
		$data = array(
        'fname_cost' => $fname_cost,
        'sname_cost' => $sname_cost,
        'genre' => $genre,
        'id_slice_age' => $id_slice_age,
        'profession' => $profession,
        'email_cost' => $email,
        'phone' => $phone,
        'password_cost' => $password,
        'profile_img' => $profile_img,
        'id_country' => $id_country
		);
		
		$this->db->insert('customer', $data);

		$data2 = array(
        'id_user' => $this->db->select('id_costomer')->where('fname_cost', $fname_cost)->get('customer')->result_array()[0]['id_costomer'],
        'id_role' => $this->db->select('id_role')->where('name_role', 'ABONNE')->get('role')->result_array()[0]['id_role']
		);
		
		return $this->db->insert('customer_role', $data2);
	}

	function updateCustomer($id_costomer, $fname_cost, $sname_cost, $genre, $id_slice_age, $profession, $email, $phone, $password, $profile_img, $id_country){
		
		if (!is_null($password)) {
			if (!is_null($profile_img)) {
				$data = array(
		        'fname_cost' => $fname_cost,
		        'sname_cost' => $sname_cost,
		        'genre' => $genre,
		        'id_slice_age' => $id_slice_age,
		        'profession' => $profession,
		        'email_cost' => $email,
		        'phone' => $phone,
		        'password_cost' => $password,
		        'profile_img' => $profile_img,
		        'id_country' => $id_country
				);
			}
			else{
				$data = array(
		        'fname_cost' => $fname_cost,
		        'sname_cost' => $sname_cost,
		        'genre' => $genre,
		        'id_slice_age' => $id_slice_age,
		        'profession' => $profession,
		        'email_cost' => $email,
		        'phone' => $phone,
		        'password_cost' => $password,
		        'id_country' => $id_country
				);

			}
		}
		else{
			if (!is_null($profile_img)) {
				$data = array(
		        'fname_cost' => $fname_cost,
		        'sname_cost' => $sname_cost,
		        'genre' => $genre,
		        'id_slice_age' => $id_slice_age,
		        'profession' => $profession,
		        'email_cost' => $email,
		        'phone' => $phone,
		        'profile_img' => $profile_img,
		        'id_country' => $id_country
				);
			}
			else{
				$data = array(
		        'fname_cost' => $fname_cost,
		        'sname_cost' => $sname_cost,
		        'genre' => $genre,
		        'id_slice_age' => $id_slice_age,
		        'profession' => $profession,
		        'email_cost' => $email,
		        'phone' => $phone,
		        'password_cost' => $password,
		        'id_country' => $id_country
				);

			}

		}

		return $this->db->where('id_costomer', $id_costomer)->update('customer', $data);
	}

	function addOnCart($id_reason){
        $reason = $this->db->where('id_reason', $id_reason)->get('reason')->row_object();

        $data = array(
        'id'      => $id_reason,
        'qty'     => 1,
        'price'   => $reason->price_reason,
        'name'    => $reason->name_reason,
        'img_reason'    => $reason->img_reason,
        'img2_reason'    => $reason->img2_reason,

        'options' => array(
            'Type' => $this->db->select('name_type')->where('id_type', $reason->type_reason)->get('type_reason')->row_object()->name_type,

            'Origine/Garantie' => $reason->origine_reason,

            'Catégorie' => $this->db->select('label')->where('id_cat', $reason->id_cat_reason)->get('category')->row_object()->label,

            'Sous-Catégorie' => $this->db->select('label_c_cat')->where('id_sub_cat', $reason->id_sub_cat)->get('sub_category')->row_object()->label_c_cat

            )
        );

        $this->cart->insert($data);
	}


    function addOnDB($id_reason){

		$id_ord = $this->db->select('id_ord')->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->where('account_paid', 'SUR-MESURES')->get('order_cart')->row_object()->id_ord;

		$this->db->where('id_order', $id_ord)->delete('order_qty');
	    		
    	foreach ($this->cart->contents() as $items){

			$exit2 = $this->db->where('id_order', $id_ord)->where('id_reason', $id_reason)->get('order_qty')->result_array();
    		
    		if (!empty($exit2)) {
    			$this->db->where('id_order', $id_ord)->where('id_reason', $id_reason)->update('order_qty', ['qty' => 1]);
    		}
    		else{
    			$this->db->insert('order_qty', ['id_order' => $id_ord, 'qty' => 1, 'id_reason' => $id_reason]);
    		}
    		$i++;
    	}
	}

	function personalyzed($mesures, $img_pers){

        $id_reason = $this->input->post('id_reason');
        $id_reason2 = $this->input->post('id_reason2');

        $this->addOnCart($id_reason);
        $this->addOnCart($id_reason2);

    	$id_costomer = $this->session->userdata['auth_user']['id_user'];

		$data = array(
			'id_costomer' => $id_costomer,
			'id_mag' => $this->input->post('id_mag'),
			'id_op' => null,
			'paid_ref' => $mesures.$img_pers,
			'account_paid' => null,
			'state_paid' => -2,
			'total' => $this->cart->total(),
		);


		$exit = $this->db->where('id_costomer', $id_costomer)->where('state_paid', -2)->where('account_paid', 'SUR-MESURES')->get('order_cart')->result_array();

		if (!empty($exit)) {

			$this->db->where('id_costomer', $id_costomer)->where('state_paid', -2)->update('order_cart', $data);

    		$this->addOnDB($id_reason);
    		$this->addOnDB($id_reason2);	    	
		}
		else{

			$this->db->insert('order_cart', $data);

    		$this->addOnDB($id_reason);
    		$this->addOnDB($id_reason2);
		}	
	}

	// delete costomer record
	function delete($id_costomer){
		$user = $this->db->where('id_costomer', $id_costomer)->get('customer')->row_object();
		$path = $_SERVER['DOCUMENT_ROOT'].'/bioluxoptical/assets/img/customers/'.$user->profile_img;
		if (is_file($path)) {
			unlink($path);
		} 

		$this->db->where('issuer_id',$id_costomer)->delete('issue');

		$this->db->where('id_user',$id_costomer)->delete('customer_role');
		$this->db->where('id_costomer',$id_costomer)->delete('customer');
	}

	function get_consult($id_costomer, $id_com=null){
		if (!is_null($id_com)) {
			return $this->db->where('id_com', $id_com)->get('communicate');
		}
		return $this->db->where('pattern', 'CONSULTATION')->where('subject', $id_costomer)->get('communicate');
	}

	// update data customer
	function activate($id_costomer, $state){
		$this->db->where('id_user', $id_costomer);
		if ($state == 0 or $state == -1) {
			
			$params = array('state' => 1);
		}
		else{
			$params = array('state' => 0);
		}

		$this->db->update('customer_role',$params);

	}

}
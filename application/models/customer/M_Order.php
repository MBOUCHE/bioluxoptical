<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Order extends CI_Model {

	public function getAllOrderMag($id_mag=null, $new_order=null){
		if (!is_null($id_mag) and $id_mag!=0) {

			if (!is_null($new_order)) {

                return $this->db->select('*')
				->where('order_cart.id_mag', $id_mag)
				->where('order_cart.state_paid', -1)
				//->join('order_qty', 'order_qty.id_order = order_cart.id_ord')
				->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
				->join('customer', 'customer.id_costomer = order_cart.id_costomer')
				->join('provider', 'provider.id_prov = order_cart.id_op')
				->from('order_cart')
				->get();
            }

			return $this->db->select('*')
				->where('order_cart.id_mag', $id_mag)
				->where('order_cart.state_paid !=', -2)
				//->join('order_qty', 'order_qty.id_order = order_cart.id_ord')
				->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
				->join('customer', 'customer.id_costomer = order_cart.id_costomer')
				->join('provider', 'provider.id_prov = order_cart.id_op')
				->from('order_cart')
				->get();
		}

		// pas besoin du elseif
		if (!is_null($new_order)) {
            //var_dump($new_order); die;

            return $this->db->select('*')
			->where('order_cart.state_paid', -1)
			//->join('order_qty', 'order_qty.id_order = order_cart.id_ord')
			->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
			->join('customer', 'customer.id_costomer = order_cart.id_costomer')
			->join('provider', 'provider.id_prov = order_cart.id_op')
			->from('order_cart')
			->get();
        }
		return $this->db->select('*')
			->where('order_cart.state_paid !=', -2)
			//->join('order_qty', 'order_qty.id_order = order_cart.id_ord')
			->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
			->join('customer', 'customer.id_costomer = order_cart.id_costomer')
			->join('provider', 'provider.id_prov = order_cart.id_op')
			->from('order_cart')
			->get();
	}

	public function getAllOrderMagMesure($id_mag=null, $new_order=null, $id_user=null){
		if (!is_null($id_user)) {
			return $this->db->select('*')
				->where('order_cart.state_paid', -2)
				->where('order_cart.id_costomer', $id_user)
				->join('customer', 'customer.id_costomer = order_cart.id_costomer')
				//->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
				//->join('provider', 'provider.id_prov = order_cart.id_op')
				->from('order_cart')
				->get();
		}

		if (!is_null($id_mag) and $id_mag!=0) {

			if (!is_null($new_order)) {
                return $this->db->select('*')
				->where('order_cart.id_mag', $id_mag)
				->where('order_cart.state_paid', -2)
				->where('confirm_date', null)
				->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
				->join('customer', 'customer.id_costomer = order_cart.id_costomer')
				//->join('provider', 'provider.id_prov = order_cart.id_op')
				->from('order_cart')
				->get();
            }

			return $this->db->select('*')
				->where('order_cart.id_mag', $id_mag)
				//->join('order_qty', 'order_qty.id_order = order_cart.id_ord')
				->where('order_cart.state_paid', -2)
				->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
				->join('customer', 'customer.id_costomer = order_cart.id_costomer')
				//->join('provider', 'provider.id_prov = order_cart.id_op')
				->from('order_cart')
				->get();
		}

		// pas besoin du elseif
		if (!is_null($new_order)) {
            //var_dump($new_order); die;

            return $this->db->select('*')
			->where('order_cart.state_paid', -2)
				->where('confirm_date', null)
			->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
			->join('customer', 'customer.id_costomer = order_cart.id_costomer')
			//->join('provider', 'provider.id_prov = order_cart.id_op')
			->from('order_cart')
			->get();
        }
		return $this->db->select('*')
			//->where('id_mag!=', NULL)
			//->join('order_qty', 'order_qty.id_order = order_cart.id_ord')
			->where('order_cart.state_paid', -2)
			->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
			->join('customer', 'customer.id_costomer = order_cart.id_costomer')
			//->join('provider', 'provider.id_prov = order_cart.id_op')
			->from('order_cart')
			->get();
	}

	public function oldOrderCustomer($id_costomer=null){
		if (!is_null($id_costomer)) {
			return $this->db->select('*')
				->where('order_cart.id_costomer', $id_costomer)
				//->join('order_qty', 'order_qty.id_order = order_cart.id_ord')
				->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
				->join('provider', 'provider.id_prov = order_cart.id_op')
				->from('order_cart')
				->get();
		}
		return $this->db->select('*')
			//->join('order_qty', 'order_qty.id_order = order_cart.id_ord')
			->join('storeshop', 'storeshop.id_mag = order_cart.id_mag')
			->join('customer', 'customer.id_costomer = order_cart.id_costomer')
			->join('provider', 'provider.id_prov = order_cart.id_op')
			->from('order_cart')
			->get();
	}


    public function getStoreShopOrder(){

    	// pour trouver un magasin qui contient un produit choisi
    	$i = 1;

    	$storeshops = array();

    	foreach ($this->cart->contents() as $items){
    		$id = $items['id'];
    		$exit = '';

    		$ids_mag = $this->db->select('id_mag')->where('id_reason', $id)->get('propose')->result_array();

    		//var_dump($ids_mag);
    		if (sizeof($ids_mag)!=0) {

    			foreach ($ids_mag as $id_mag) {
    				array_push($storeshops, $this->db->select('id_mag, name, po_box, description, phone_ss')->where('id_mag', $id_mag['id_mag'])->where('state_mag', 1)->get('storeshop')->result_array());
    			}

    		}
    		else{

    		}
    	}

		return $storeshops;		
	}

	public function addOrder(){

    	$i = 1;
    	$id_costomer = $this->session->userdata['auth_user']['id_user'];

		$data = array(
			'id_costomer' => $id_costomer,
			'id_mag' => null,
			'id_op' => null,
			'paid_ref' => null,
			'account_paid' => null,
			'total' => $this->cart->total(),
		);

		
		$exit = $this->db->where('id_costomer', $id_costomer)->where('state_paid', -1)->get('order_cart')->result_array();

		if (!empty($exit)) {

			$this->db->where('id_costomer', $id_costomer)->where('state_paid', -1)->update('order_cart', $data);

			$id_ord = $this->db->select('id_ord')->where('id_costomer', $id_costomer)->where('state_paid', -1)->get('order_cart')->row_object()->id_ord;

			$this->db->where('id_order', $id_ord)->delete('order_qty');

	    	foreach ($this->cart->contents() as $items){
	    		$id_reason = $this->input->post($i.'[id]');

				$exit2 = $this->db->where('id_order', $id_ord)->where('id_reason', $id_reason)->get('order_qty')->result_array();
	    		
	    		if (!empty($exit2)) {
	    			$this->db->where('id_order', $id_ord)->where('id_reason', $id_reason)->update('order_qty', ['qty' => $this->input->post($i.'[qty]')]);
	    		}
	    		else{
	    			$this->db->insert('order_qty', ['id_order' => $id_ord, 'qty' => $this->input->post($i.'[qty]'), 'id_reason' => $this->input->post($i.'[id]')]);
	    		}
	    		$i++;
	    	}
	    	
		}
		else{
			$this->db->insert('order_cart', $data);

			$id_ord = $this->db->select('id_ord')->where('id_costomer', $id_costomer)->where('state_paid', -1)->get('order_cart')->row_object()->id_ord;

	    	$id_ord = $this->db->select('id_ord')->where('id_costomer', $id_costomer)->where('state_paid', -1)->get('order_cart')->row_object()->id_ord;

	    	foreach ($this->cart->contents() as $items){
	    		$id_reason = $this->input->post($i.'[id]');

				$exit2 = $this->db->where('id_order', $id_ord)->where('id_reason', $id_reason)->get('order_qty')->result_array();
	    		
	    		if (!empty($exit2)) {
	    			$this->db->where('id_order', $id_ord)->where('id_reason', $id_reason)->update('order_qty', ['qty' => $this->input->post($i.'[qty]')]);
	    		}
	    		else{
	    			$this->db->insert('order_qty', ['id_order' => $id_ord, 'qty' => $this->input->post($i.'[qty]'), 'id_reason' => $this->input->post($i.'[id]')]);
	    		}
	    		$i++;
	    	}
		}	
	}

	public function updOrder($id_prov, $payload, $pay_ref, $id_mag){
		$order = $this->db->select('id_ord, order_date')->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->where('state_paid', -1)->get('order_cart')->row_object();

		$datestring = '%Y-%m-%d %H:%i:%s';
		$time = time();
		$confirm_date = mdate($datestring, $time);

		$data = array(
			'id_op' => $id_prov,
			'id_mag' => $id_mag,
			'paid_ref' => $pay_ref,
			'order_date' => $order->order_date,
			'confirm_date' => $confirm_date,
			'account_paid' => $payload
		);

		return $this->db->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->where('state_paid', -1)->update('order_cart', $data);
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
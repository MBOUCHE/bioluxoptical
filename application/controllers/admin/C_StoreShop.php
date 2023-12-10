<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_StoreShop extends CI_Controller {

	private $title = 'ADM - PANEL DE CONTROL | ';

	public function __construct()
    {
        parent::__construct();
        $this->load->model('control/Auth_user');

        $this->load->model('public/M_Account');
        $this->load->model('public/M_Header');
        $this->load->model('public/M_Index');

        $this->load->model('customer/M_Order');
    }


    function flashdata_success($msg){
        $this->session->set_flashdata('flsh_mess', '<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$msg.'</button></div>');
    }

    function flashdata_warning($msg){
        $this->session->set_flashdata('flsh_mess', '<div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$msg.'</button></div>');
    }

    function flashdata_danger($msg){
        $this->session->set_flashdata('flsh_mess', '<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$msg.'</button></div>');
    }

    function flashdata_info($msg){
        $this->session->set_flashdata('flsh_mess', '<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$msg.'</button></div>');
    }

    public function is_connect(){
    	if (!isset($this->session->userdata["auth_user"]) or is_null($this->session->userdata["auth_user"])) {
    		redirect ('error403');
    	}

    	if(isset($this->session->userdata["auth_user"]) and 
    		($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsMan()->result_array()[0]['id_role'])){
			redirect ('manager/ControlPanelM');

		}elseif (isset($this->session->userdata["auth_user"]) and 
    		($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsAbo()->result_array()[0]['id_role'])) {
			redirect ('customer/CustomerPanel');
		}
    }


    public function loadindfirst($title, $presentation=null, $manage =null, $sub_manage=null) {
    	$this->is_connect();

    	$data['categories'] = $this->M_Header->getGlassCat();

    	$data['title'] = $this->title .= $title;
    	$data['sub_title'] = $title;
    	$data['presentation'] = $presentation;

    	$data['stores_shop'] = $this->M_Header->getStoreShop();


    	$data['manage'] = $manage;
    	$data['sub_manage'] = $sub_manage;

    	$this->load->view('control/redirect');
		$this->load->view('admin/common/head', $data);
		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar_menu');
    }

	public function loadindlast() {
		$this->load->view('admin/common/footer');
		$this->load->view('admin/common/javascript');
    }

	public function workshop($id_mag){

    	$data['store_shop'] = $this->M_Header->getStoreShop($id_mag);

    	$sub_title = $data['store_shop']->name;

    	$data['visites'] = $this->M_Index->getVisites();
    	$data['visitesR'] = $this->M_Index->getvisitesR();


		$title = 'Gestion du magasin : '.$data['store_shop']->name.'<span style="float:right;">'.$data['store_shop']->phone_ss
		."</span>";
        $this->Auth_user->activity("Consultation : '".$title, "MAGASIN");

		$this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);

		$this->load->view('admin/storeshop/index', $data);

		$this->loadindlast();

	}
    
    public function controlOrderMesure($id_mag=null, $new_order=null){

        if ($id_mag!=null and $id_mag!=0) {

            if (!is_null($new_order)) {

                $data['orders'] = $this->M_Order->getAllOrderMagMesure($id_mag, $new_order);
            }
            else{

                $data['orders'] = $this->M_Order->getAllOrderMagMesure($id_mag);
            }

            $data['store_shop'] = $this->M_Header->getStoreShop($id_mag);

            $sub_title = $data['store_shop']->name;

            $title = '<span style="float: right;">'.$data['store_shop']->name.' : '.$data['store_shop']->phone_ss.'</span><label style="float: ; color: blue">COMMANDES SUR-MESURES</label>';
            
            $this->Auth_user->activity("Consultation : '".$title, "COMMANDES");
            $this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);
        }
        else{

            if (!is_null($new_order)) {

                $data['orders'] = $this->M_Order->getAllOrderMagMesure(0, $new_order);
            }
            else{

                $data['orders'] = $this->M_Order->getAllOrderMagMesure();
            }

            $data['store_shop'] = $this->db->where('name', 'BIOLUX OPTICAL')->get('storeshop')->row_object();

            $sub_title = $data['store_shop']->name;

            $title = '<span style="float: right;">'.$data['store_shop']->name.' : '.$data['store_shop']->phone_ss.'</span><label style="float: ; color: blue">COMMANDES SUR-MESURES</label>';

            $this->Auth_user->activity("Consultation : '".$title, "COMMANDES");
            $this->loadindfirst($title, null, 'manage', 'mesure');

        }

        $this->load->view('admin/storeshop/order/list', $data);

        $this->loadindlast();

    }

    public function controlOrder($id_mag=null, $new_order=null){

        if ($id_mag!=null and $id_mag!=0) {

            if (!is_null($new_order)) {

                $data['orders'] = $this->M_Order->getAllOrderMag($id_mag, $new_order);
            }
            else{

                $data['orders'] = $this->M_Order->getAllOrderMag($id_mag);
            }

            $data['store_shop'] = $this->M_Header->getStoreShop($id_mag);

            $sub_title = $data['store_shop']->name;

            $title = '<span style="float: right;">'.$data['store_shop']->name.' : '.$data['store_shop']->phone_ss.'</span><label style="float: ; color: blue">COMMANDES ET </label> <label style="color:green"> RECETTES</label>';
            
            $this->Auth_user->activity("Consultation : '".$title, "COMMANDES");
            $this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);
        }
        else{

            if (!is_null($new_order)) {

                $data['orders'] = $this->M_Order->getAllOrderMag(0, $new_order);
            }
            else{

                $data['orders'] = $this->M_Order->getAllOrderMag();
            }

            $data['store_shop'] = $this->db->where('name', 'BIOLUX OPTICAL')->get('storeshop')->row_object();

            $sub_title = $data['store_shop']->name;

            $title = '<span style="float: right;">'.$data['store_shop']->name.' : '.$data['store_shop']->phone_ss.'</span><label style="float: ; color: blue">COMMANDES ET </label> <label style="color:green"> RECETTES</label>';
            
            $this->Auth_user->activity("Consultation : '".$title, "COMMANDES");
            $this->loadindfirst($title, null, 'manage', 'order');

        }

        $this->load->view('admin/storeshop/order/list', $data);

        $this->loadindlast();

    }

    function changeOrd($id_ord, $state_paid){
        $order = $this->db->where('id_ord', $id_ord)->get('order_cart')->row_object();

        if ($state_paid == 1) {
            
            $params = array('state_paid' => 0, 'id_manager' => $this->session->userdata["auth_user"]['id_user']);
        }
        else{
            $params = array('state_paid' => 1, 'id_manager' => $this->session->userdata["auth_user"]['id_user']);
        }

        $this->db->where('id_ord', $id_ord);
        $this->db->update('order_cart',$params);

        $this->Auth_user->activity("Visibilité / état : '".$id_ord, $state_paid);
        $this->flashdata_info('Changement d\'état de la référence '.$order->paid_ref.' de total '.$order->total.' FCFA.');
        redirect('admin/C_StoreShop/controlOrder');
    } 

    function changeOrdMesure($id_ord){
        $order = $this->db->where('id_ord', $id_ord)->get('order_cart')->row_object();

        if (is_null($order->id_manager)) {
            
            $params = array('id_manager' => $this->session->userdata["auth_user"]['id_user']);
        }
        else{
            $params = array('id_manager' => null);
        }

        $this->db->where('id_ord', $id_ord);
        $this->db->update('order_cart',$params);

        $this->flashdata_info('Changement d\'état de la référence '.$order->paid_ref.' de total '.$order->total.' FCFA.');
        $this->Auth_user->activity("Visibilité : '".$order->paid_ref, "COMMANDES");
        redirect('admin/C_StoreShop/controlOrderMesure');
    } 

    function delOrd($id_ord){
        $order = $this->db->where('id_ord', $id_ord)->get('order_cart')->row_object();

        $this->db->where('id_order', $id_ord)->delete('order_qty');
        $this->db->where('id_ord', $id_ord)->delete('order_cart');
        $this->flashdata_success('Suppresion de la commande de référence '.$order->paid_ref.' de total '.$order->total.' FCFA.');
        $this->Auth_user->activity("Visibilité : '".$order->paid_ref, "COMMANDES");
        redirect('admin/C_StoreShop/controlOrder');
    }  

}

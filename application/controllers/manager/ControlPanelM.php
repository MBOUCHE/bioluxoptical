<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanelM extends CI_Controller {

	private $title = 'B_O - PANEL DE CONTROL | ';

	public function __construct()
    {
        parent::__construct();
        $this->load->model('control/Auth_user');

        $this->load->model('public/M_Header');
        $this->load->model('public/M_Account');
    }

    public function is_connect(){
    	if (!isset($this->session->userdata["auth_user"]) or is_null($this->session->userdata["auth_user"])) {
    		redirect ('error403');
    	}

    	if(isset($this->session->userdata["auth_user"]) and 
            ($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsAdm()->result_array()[0]['id_role'])) {
            redirect ('admin/ControlPanel');

		}elseif (isset($this->session->userdata["auth_user"]) and 
    		($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsAbo()->result_array()[0]['id_role'])) {
			redirect ('customer/CustomerPanel');
		}
    }
    
    public function loadindfirst($title, $presentation=null, $manage =null, $sub_manage=null){
    	$this->is_connect();
    	$data['title'] = $this->title .= $title;
    	$data['sub_title'] = $title;
    	$data['presentation'] = $presentation;
    	$data['manage'] = $manage;
    	$data['sub_manage'] = $sub_manage;

    	$data['stores_shop'] = $this->M_Header->getStoreShop();
    	
		$data['presentations'] = $this->M_Header->presentationAdm();

    	$this->load->view('control/redirect');
		$this->load->view('admin/common/head', $data);
		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar_menu');
    }

	public function loadindlast() {
		$this->load->view('admin/common/footer');
		$this->load->view('admin/common/javascript');
    }
	public function index() {
		$title = 'Gestion de la présentation du site';
		$sub_title = 'Gestion du slide ACCUEIL';
		$manage = 'site';
		$sub_manage = 'slide';

		$data['slides'] = $this->M_Header->slidesAdm();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->view('admin/slide/index', $data);

		$this->loadindlast();

	}

}
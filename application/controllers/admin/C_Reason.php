<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Reason extends CI_Controller {

	private $title = 'B_O - PANEL DE CONTROL | ';

	public function __construct()
    {
        parent::__construct();
        $this->load->model('public/M_Header');
        $this->load->model('control/Auth_user');
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

    public function loadindfirst($title, $presentation=null){
    	$this->is_connect();

    	$data['categories'] = $this->M_Header->getCat();

    	$data['title'] = $this->title .= $title;
    	$data['sub_title'] = $title;
    	$data['presentation'] = $presentation;

    	$this->load->view('control/redirect');
		$this->load->view('admin/common/head', $data);
		$this->load->view('admin/common/header', $data);
		$this->load->view('admin/common/left_sidebar', $data);
		$this->load->view('admin/common/page_breadcrumb', $data);
    }

	public function loadindlast(){
		$this->load->view('admin/footer');
		$this->load->view('admin/javascript');
    }
	public function index()
	{
		$title = 'Accueil';

		$this->loadindfirst($title);


		$this->load->view('public/index');

		$this->loadindlast();

	}

}

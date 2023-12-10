<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Profile extends CI_Controller{
	
	private $title = 'ADM - PANEL DE CONTROL | ';
	
	public function __construct(){
		parent::__construct();
        $this->load->model('public/M_Header');
        $this->load->model('admin/M_Personal');
        $this->load->model('public/M_Account');
		
	}


    public function is_connect(){
    	if (!isset($this->session->userdata["auth_user"]) or is_null($this->session->userdata["auth_user"])) {
    		redirect ('error403');
    	}/*

    	if(isset($this->session->userdata["auth_user"]) and 
    		($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsMan()->result_array()[0]['id_role'])){
			redirect ('manager/ControlPanelM');

		}elseif (isset($this->session->userdata["auth_user"]) and 
    		($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsAbo()->result_array()[0]['id_role'])) {
			redirect ('customer/CustomerPanel');
		}*/
    }

    public function loadindfirst($title, $presentation=null, $manage =null, $sub_manage=null) {
    	$this->is_connect();

    	$data['categories'] = $this->M_Header->getGlassCat();

    	$data['title'] = $this->title .= $title;
    	$data['sub_title'] = $title;
    	$data['presentation'] = $presentation;

    	$data['manage'] = $manage;
    	$data['sub_manage'] = $sub_manage;

    	$data['stores_shop'] = $this->M_Header->getStoreShop();

    	$data['his_forums'] = $this->db->select('communicate.id_com, subject, img_com')->where('id_user', $this->session->userdata['auth_user']["id_user"])->where('pattern', 'FORUM')->get('communicate', 0, 20);

    	$this->load->view('control/redirect');
		$this->load->view('admin/common/head', $data);
		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar_menu');
    }

	public function loadindlast() {
		$this->load->view('admin/common/footer');
		$this->load->view('admin/common/javascript');
    }

    public function manage() {
    	$title = "Profile";
		$data['user'] = $this->M_Personal->getThisPersonal($this->session->userdata['auth_user']['id_user']);

		$data['roles'] = $this->M_Account->getRoles();

		$data['storeshops'] = $this->M_Header->getStoreShop();

		$data['personals'] = $this->M_Personal->getPersonals();

		$data['average_visit'] = $this->M_Header->nb_visit();
		$data['nbr_client'] = $this->M_Header->nbr_client ();
		$data['nb_subjects'] = $this->db->where('pattern', 'FORUM')->where('state', 1)->count_all_results('communicate');
		$data['nb_personals'] = $this->db->where('state=1')->join('users_role', 'users_role.id_user=users.id_user')->count_all_results('users');
    	$data['testimonials'] = $this->M_Header->getTestimonial();

		
		//$title = 'Modification sur le personnel '.$user->first_name.' '.$user->second_name;

		//$id_user = $this->input->post('id_user');

		$this->loadindfirst($title, null, 'manage', 'staffs');


		//$this->load->view('admin/personal/update', $data);
		
		$this->load->view('admin/profile', $data);
		
		$this->loadindlast();
	}
}
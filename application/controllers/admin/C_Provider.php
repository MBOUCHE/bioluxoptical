<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Provider extends CI_Controller{

	private $title = 'ADM - PANEL DE CONTROL | ';
	
	function __construct() {
		parent::__construct();
        $this->load->model('control/Auth_user');
		$this->load->model('admin/M_Provider');
        $this->load->model('public/M_Header');
        $this->load->model('public/M_Account');
        $this->load->model('admin/M_Personal');
        $this->load->model('admin/M_Reason');
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

    public function loadindfirst($title, $presentation=null, $manage =null, $sub_manage=null){
    	$this->is_connect();
    	$data['title'] = $this->title .= $title;
    	$data['sub_title'] = $title;
    	$data['presentation'] = $presentation;
    	$data['manage'] = $manage;
    	$data['sub_manage'] = $sub_manage;
    	$data['stores_shop'] = $this->M_Header->getStoreShop();

    	$this->load->view('control/redirect');
		$this->load->view('admin/common/head', $data);
		$this->load->view('admin/common/header');
		$this->load->view('admin/common/sidebar_menu');
    }

	public function loadindlast() {
		$this->load->view('admin/common/footer');
		$this->load->view('admin/common/javascript');
    }
	
	function index(){

		$title = 'Liste des partenaires';

		$this->loadindfirst($title, '', 'manage', 'provider');
		$this->Auth_user->activity('Consultation : '.$title, "Partenaire");


		$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat')->get('sub_category')->result_array();
		$data['types_reason'] = $this->M_Reason->getTypeRea();
		$data['reasons'] = $this->M_Reason->select_all();

		$data['providers'] = $this->M_Provider->select_all();
		$this->load->view('provider/list',$data);



		$this->loadindlast();
	}
	
	function add(){

		$title = 'Liste des partenaires';

		$data['managers'] = $this->M_Personal->getManagers();

		$data['types_prov'] = $this->M_Personal->getTypeProv();
		$this->Auth_user->activity('Enregistrement : '.$title, "FORMULAIRE");		

		$this->loadindfirst($title, '', 'manage', 'provider');

		$this->load->view('provider/add',$data);

		$this->loadindlast();
	}

	function addProv(){

		$title = 'Liste des partenaires';

		$data['managers'] = $this->M_Personal->getManagers();

		$data['types_prov'] = $this->M_Personal->getTypeProv();

		if ($this->form_validation->run()) {

			$name_prov = $this->input->post('name_prov');
			$social_reason = $this->input->post('social_reason');
			$contact = $this->input->post('contact');
			$code_number = $this->input->post('code_number');
			$description = $this->input->post('description');
			$termes = $this->input->post('termes');
			$id_user = $this->input->post('id_user');
			$type_prov = $this->input->post('type_prov');
			$date_reg_prov = $this->input->post('date_reg_prov');

			$img_prov = $this->addImg($type_prov, 'assets/img/pay/'.$type_prov.'/');

			$state = $this->M_Provider->save($name_prov, $social_reason, $contact, $code_number, $description, $termes, $id_user, $type_prov, $date_reg_prov, $img_prov);

			if ($state) {
				$this->flashdata_success("Ajout du partenaire avec succès");
				$this->Auth_user->activity('Enregistrement : '.$title, "Succès");

				redirect ('admin/C_Provider/index');
			}
			else{
				$this->flashdata_warning("Échec d'ajout du partenaire");
				$this->Auth_user->activity('Enregistrement : '.$title, "Échec");

				$this->loadindfirst($title, '', 'manage', 'provider');

				$this->load->view('provider/add',$data);

				$this->loadindlast();

			}
			
		}
		else {
			$this->flashdata_warning("Échec d'ajout du partenaire");
			$this->Auth_user->activity('Enregistrement : '.$title, "Échec - Erreur de validation");

			$this->loadindfirst($title, '', 'manage', 'provider');

			$this->load->view('provider/add',$data);

			$this->loadindlast();
		}
	}
	
	function store(){
		$this->M_Provider->save();
		$this->Auth_user->activity('Enregistrement : Partenaire', "Succès");
		redirect('admin/C_Provider');
	}
	
	function edit(){

		$title = 'Modification des données sur le partenaire';
		$this->Auth_user->activity('Modification : '.$title, "FORMULAIRE");

		$this->loadindfirst($title, '', 'manage', 'provider');

		$id_prov = $this->uri->segment(4);
		$data['id_prov'] = $id_prov;

		$data['provider'] = $this->M_Provider->get_provider($id_prov)->row_array();

		$data['managers'] = $this->M_Personal->getManagers();

		$data['types_prov'] = $this->M_Personal->getTypeProv();
		
		$this->load->view('provider/edit',$data);

		$this->loadindlast();
	}
	
	function update(){

		$title = 'Modification des données sur le partenaire';

		$data['id_prov'] = $this->input->post('id_prov');

		$this->loadindfirst($title, '', 'manage', 'provider');


		$data['provider'] = $this->M_Provider->get_provider($this->input->post('id_prov'))->row_array();

		$data['managers'] = $this->M_Personal->getManagers();

		$data['types_prov'] = $this->M_Personal->getTypeProv();

		if ($this->form_validation->run()) {

			$name_prov = $this->input->post('name_prov');
			$social_reason = $this->input->post('social_reason');
			$contact = $this->input->post('contact');
			$code_number = $this->input->post('code_number');
			$description = $this->input->post('description');
			$termes = $this->input->post('termes');
			$id_user = $this->input->post('id_user');
			$type_prov = $this->input->post('type_prov');
			$date_reg_prov = $this->input->post('date_reg_prov');

			$img_prov = $this->addImg($type_prov, 'assets/img/pay/'.$type_prov.'/');


			$state = $this->M_Provider->update($this->input->post('id_prov'), $name_prov, $social_reason, $contact, $code_number, $description, $termes, $id_user, $type_prov, $date_reg_prov, $img_prov);

			if ($state) {
				$this->flashdata_success("Modification du partenaire '".$name_prov."' avec succès");
				$this->Auth_user->activity("Modification du partenaire '".$name_prov, "Succès");

				redirect('admin/C_Provider');
			}
			else{
				$this->flashdata_warning("Échec de modification du partenaire");
				$this->Auth_user->activity("Modification du partenaire '".$name_prov, "Échec");

				$this->load->view('provider/edit',$data);

				$this->loadindlast();

			}
			
		}
		else {
			$this->flashdata_warning("Échec de modification du partenaire");
			$this->Auth_user->activity("Modification du partenaire '".$name_prov, "Échec - Erreur de validation");

			$this->load->view('provider/edit',$data);

			$this->loadindlast();
		}
	}
	
	function delete(){
		$id_prov = $this->uri->segment(4);
		$provider = $this->M_Provider->get_provider($id_prov)->row_object();
		$this->M_Provider->delete($id_prov);
		$this->flashdata_info("Partenaire supprimé.");
		$this->Auth_user->activity("Suppression du partenaire '".$provider->name_prov, "Succès");
		redirect('admin/C_Provider');
	}

	function activate(){
		$id_prov = $this->uri->segment(4);
		$state_prov = $this->uri->segment(5);
		$provider = $this->M_Provider->get_provider($id_prov)->row_object();
		$this->M_Provider->activate($id_prov, $state_prov);
		$this->flashdata_info("Visibilité modifiée pour le partenaire ".$provider->name_prov.".");
		$this->Auth_user->activity("Visibilité du partenaire '".$provider->name_prov, "Succès");
		redirect('admin/C_Provider');
	}


////////////////// Début Gestion des Images des gestion  ////////////////////////////


	public function addImg($id, $upload_path, $max_size=null, $max_width=null, $max_height=null) {

		if($_FILES["userimage"]['name']=='') {
			$this->flashdata_info("Image non sélectionnée.");
			return null;
		}
		else { 

			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/bioluxoptical/'.$upload_path;

			//$path = realpath($this->config->base_url() . 'img/');
			if (!is_dir($config['upload_path'])) {
				//var_dump(mkdir($config['upload_path']));
				mkdir($config['upload_path'], 0777, true);
			}
			
			$config['allowed_types'] = 'gif|jpg|jpeg|png';

			$config['max_size'] = $max_size;
            $config['max_width'] = $max_width;
            $config['max_height'] = $max_height;
			
			$config['file_name'] = $_FILES["userimage"]['name'];
			
			if (strlen($config['file_name'])==0) {
				$this->flashdata_info("Image non sélectionnée | Type de fichier non reconnu.");
				return null;
			}
			
			$this->load->library('upload', $config); //Loads the Uploader Library
			
			$this->upload->initialize($config);

			if (file_exists($config['upload_path'].$config['file_name'])) {
			    return $id.'/'.$config['file_name'];
			}

			if ( ! $this->upload->do_upload('userimage')) {
				$error = array('error' => $this->upload->display_errors());
				$this->flashdata_info("Image non sélectionnée | Type de fichier non reconnu.");

				return $error;
			}

			$data = $this->upload->data(); 

				//$extension = substr(strrchr($_FILES["userimage"]['name'], '.') ,1);

			return $id.'/'.$config['file_name'];

		

		//$this->M_Img->saveImg(array('profile'=>$config['file_name'],));
		}
	}

////////////////// Fin Gestion des Images des gestion  ////////////////////////////
}
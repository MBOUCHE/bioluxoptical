<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends CI_Controller {

	private $title = 'ADM - PANEL DE CONTROL | ';

	public function __construct()
    {
        parent::__construct();
        $this->load->model('control/Auth_user');
        
        $this->load->model('public/M_Account');
        $this->load->model('public/M_Header');
        $this->load->model('public/M_Index');
        $this->load->model('public/M_Mag');
        $this->load->model('admin/M_Customer');
        $this->load->model('admin/M_Reason');
        $this->load->model('admin/M_Material');
        $this->load->model('admin/M_Personal');
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

	public function index() {
		$title = 'Accueil';

		$this->loadindfirst($title, null, 'dashbord', '');

    	$data['visites'] = $this->M_Index->getVisites();
    	$data['visitesR'] = $this->M_Index->getvisitesR();
    	$data['maXcurrentVisites'] = $this->M_Index->maXcurrentVisites();

    	$data['ToatalVisits'] = $this->M_Index->getCount_visit();
        $this->Auth_user->activity("PANEL ADMIN : '".$title, "GESTION");

		$this->load->view('admin/index', $data);

		$this->loadindlast();
	}


    public function error403(){

    	$data['error'] = '403';
		$data['title'] = "Identification !"; 
        $this->Auth_user->activity("PANEL ADMIN : '".$data['title'], "GESTION");

		$this->loadindfirst($data['title']);

    	$data['message'] = "Vous ne disposez pas de l'authentification requise pour accéder à cette session";

		$this->load->view('errors/html/error_404', $data);

		$this->loadindlast();

    }

	public function manageSite() {
		$title = 'Gestion du site';
        $this->Auth_user->activity("PANEL ADMIN : '".$title, "GESTION");

		$this->loadindfirst($title, null, 'dashbord', '');

		$this->load->view('admin/manage_site');

		$this->loadindlast();
	}


////////////////// Début Gestion des points de vente / magasin ////////////////////////////


	public function storesShop() {
		$title = 'Actions générales sur les magasins';

		$this->loadindfirst($title, null, 'manage', 'storeshop');
        $this->Auth_user->activity("Consultation : '".$title, "GESTION");

		$data['towns'] = $this->M_Header->getTown();
 
		$this->load->view('admin/stores_shop', $data);

		$this->loadindlast();
	}

	public function changeState($id_mag) {
		$storeshop =  $this->M_Header->getStoreShop($id_mag);
		$this->M_Mag->changeState($id_mag);

		$this->flashdata_info("Etat du magasin '".$storeshop->description."' modifié");
        $this->Auth_user->activity("Visibilité du magasin : '".$storeshop->description, "Succès");
		
		redirect("admin/ControlPanel/storesShop"); 
	}
	public function delMag($id_mag) {

		$store_delete = $this->M_Header->getStoreShop($id_mag);

		$this->M_Mag->delMag($id_mag);
		$this->flashdata_success("Magasin ".$store_delete->description." supprimé.");
        $this->Auth_user->activity("Suppression du magasin : '".$store_delete->description, "Succès");
		
		redirect("admin/ControlPanel/storesShop"); 
	}

	public function view_updateMag($id_mag, $data = array()){
		$data['towns'] = $this->M_Header->getTown();

		$data['thisStoreshops'] = $this->M_Header->getStoreShop($id_mag);

		$title = "Modification du magasin : ".$data['thisStoreshops']->description ;
        $this->Auth_user->activity("Modification du magasin : '".$title, "FORUMLAIRE");
				
		$this->loadindfirst($title, null, 'manage', 'storeshop');

		$this->load->view('admin/update_mag', $data);

		$this->loadindlast();
	}

	public function updMag(){
		$title = 'Actions générales sur les magasins';

		$data['towns'] = $this->M_Header->getTown();
		$id_mag = $this->input->post('id_mag');

		if ($this->form_validation->run()) {
			$po_box = $this->input->post('po_box');
			$phone_ss = $this->input->post('phone_ss');
			$description = $this->input->post('description');
			$longitude = $this->input->post('longitude');
			$latitude = $this->input->post('latitude');
			$altitude = $this->input->post('altitude');

			$id_town = $this->input->post('id_town');
			
			$building_img = $this->addImg($id_town, 'assets/img/storeshop/'.$id_town.'/');

			$building_img_old = $this->input->post('building_img_old');
			if ($building_img != $building_img_old or is_null($building_img)) {
				
				$fichier = base_url('assets/img/storeshop/'.$id_town.'/').$building_img_old ;
				if(file_exists($fichier)){unlink($fichier);}				
			}
			else{
				$building_img = $building_img_old;
			}

			$state = $this->M_Mag->updMag($id_mag, $po_box, $phone_ss, $description, $longitude, $latitude, $altitude, $building_img, $id_town);

			$store = $this->M_Header->getStoreShop($id_mag);

			if ($state) {
				$this->flashdata_success("Modification du magasin ".$store->description." avec succès.");

				redirect ('admin/ControlPanel/storesShop');
			}
			else{
				$this->flashdata_warning("Échec de modification du magasin ".$store->description.".");

				$this->loadindfirst($title, null, 'manage', 'storeshop');

				$this->view_updateMag($id_mag, $data);

				$this->loadindlast();

			}
			
		}
		else {
			$this->flashdata_warning("Échec de modification du magasin ".$store->description.".");
        	$this->Auth_user->activity("Modification du magasin : '".$store->description, "Échec - Erreur de validation");
			
			$this->loadindfirst($title, null, 'manage', 'storeshop');
			
			$this->view_updateMag($id_mag, $data);
			
			$this->loadindlast();
		}
	}
	public function add(){
		$title = "Enregistrement d'un nouveau magasin";
		$data['towns'] = $this->M_Header->getTown();
        $this->Auth_user->activity($title, "FORUMLAIRE");
				
		$this->loadindfirst($title, null, 'manage', 'storeshop');

		$this->load->view('admin/add_mag_page', $data);

		$this->loadindlast();
	}

	public function addMag(){
		$title = 'Enregistrement d\'un nouveau magasin';

		$data['towns'] = $this->M_Header->getTown();

		$this->loadindfirst($title, null, 'manage', 'storeshop');

		if ($this->form_validation->run()) {
			$po_box = $this->input->post('po_box');
			$phone_ss = $this->input->post('phone_ss');
			$description = $this->input->post('description');
			$longitude = $this->input->post('longitude');
			$latitude = $this->input->post('latitude');
			$altitude = $this->input->post('altitude');

			$id_town = $this->input->post('id_town');

			$building_img = $this->addImg($id_town, 'assets/img/storeshop/'.$id_town.'/');

			$date_reg_mag = date("Y/m/d");

			$state = $this->M_Mag->addMag($po_box, $phone_ss, $description, $longitude, $latitude, $altitude, $building_img, $id_town, $date_reg_mag);

			if ($state) {

				$this->flashdata_success("Enregistrement du magasin avec succès");
        		$this->Auth_user->activity($title, "Succès");
				redirect ('admin/ControlPanel/storesShop');
			}
			else{
				$this->flashdata_warning("Échec d'ajout du magasin");
        		$this->Auth_user->activity($title, "Echec");
				
				$this->load->view('admin/add_mag_page', $data);

				$this->loadindlast();
			}			
		}
		else {
			$this->flashdata_warning("Échec d'ajout du magasin");
        	$this->Auth_user->activity($title, "Echec - Erreur de validation");			
			
			$this->load->view('admin/add_mag_page', $data);
			
			$this->loadindlast();
		}
	}

	public function updQtyPropose(){
		$id_mag = $this->input->post('id_mag'); 
		$data['store_shop'] = $this->M_Header->getStoreShop($id_mag);

    	$sub_title = $data['store_shop']->name;

		$title = 'Gestion du magasin : '.$data['store_shop']->name.'<span style="float:right;">'.$data['store_shop']->phone_ss
		."</span>";			

		$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
		$data['types_reason'] = $this->M_Reason->getTypeRea();

		$data['reasons'] = $this->M_Reason->select_all($id_mag);
		$data['id_mag'] = $id_mag;

		foreach ($data['reasons']->result_array() as $reason) {
			if ($reason['quantity']!=0) {
        		$this->form_validation->set_rules('qty'.$reason['id_reason'], 'Quantité '.$reason['code_reason'], 'required|min_length[1]|max_length[5]|trim|is_natural_no_zero|integer');
			}
		}
		
		if ($this->form_validation->run()) {

			die;
			$po_box = $this->input->post('po_box');
			$phone_ss = $this->input->post('phone_ss');
			$description = $this->input->post('description');
			$longitude = $this->input->post('longitude');
			$latitude = $this->input->post('latitude');
			$altitude = $this->input->post('altitude');

			$id_town = $this->input->post('id_town');

			$building_img = $this->addImg($id_town, 'assets/img/storeshop/'.$id_town.'/');

			$date_reg_mag = date("Y/m/d");

			$state = $this->M_Mag->addMag($po_box, $phone_ss, $description, $longitude, $latitude, $altitude, $building_img, $id_town, $date_reg_mag);

			if ($state) {

				$this->flashdata_success("Modification de quantités du magasin '".$data['store_shop']->name."' avec succès");
        		$this->Auth_user->activity($title, "Succès");
				redirect ('admin/ControlPanel/storesShop');
			}
			else{
				
				$this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);
				$this->flashdata_warning("Échec de modification des quantités du magasin '".$data['store_shop']->name."'");
        		$this->Auth_user->activity($title, "Echec");

				$this->load->view('admin/reason/list', $data);
			}			
		}
		else {
			
			$this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);
			$this->flashdata_warning("Échec de modification des quantités du magasin '".$data['store_shop']->name."'");
        	$this->Auth_user->activity($title, "Echec - Erreur de validation");	
			
			$this->load->view('admin/reason/list', $data);
		}
		$this->loadindlast();
	}

	
////////////////// fin Gestion des points de vente / magasin ////////////////////////////


////////////////// Début Gestion du personnel  ////////////////////////////

	public function personal($id_mag=null) {

		$data['towns'] = $this->M_Header->getTown();

		$data['storeshops'] = $this->M_Header->getStoreShop();

		if (!is_null($id_mag)) {
			$data['store_shop'] = $this->M_Header->getStoreShop($id_mag);

	    	$sub_title = $data['store_shop']->name;

			$title = 'Gestion du magasin : '.$data['store_shop']->name.'<span style="float:right;">'.$data['store_shop']->phone_ss."</span>";

        	$this->Auth_user->activity($title, $sub_title);	

			$data['personals'] = $this->M_Personal->getPersonals($id_mag);

			$this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);

			$this->load->view('admin/personal/list', $data);
		}
		else{
			$title = 'Actions générales sur le personnel :';
        	$this->Auth_user->activity($title, 'GESTION');

			$data['personals'] = $this->M_Personal->getPersonals();

			$this->loadindfirst($title, null, 'manage', 'staffs');

			$this->load->view('admin/personal/list', $data);

		}
		$this->loadindlast();
	}

	public function  updateHispersonal() {

		$user = $this->M_Personal->getThisPersonal($this->input->post('id_user'));
		$title = 'Modification sur le personnel '.$user->first_name.' '.$user->second_name;

		$data['user'] = $user;

		$data['roles'] = $this->M_Account->getRoles();

		$data['storeshops'] = $this->M_Header->getStoreShop();

		$data['personals'] = $this->M_Personal->getPersonals();

		$this->loadindfirst($title, null, 'manage', 'staffs');
		
		if ($this->form_validation->run()) {
			$first_name = $this->input->post('first_name');
			$second_name = $this->input->post('second_name');
			$reg_number = $this->input->post('reg_number');
			$age = $this->input->post('age');
			$working_time1 = $this->input->post('working_time11').'h'.$this->input->post('working_time12').' - '.$this->input->post('working_time21').'h'.$this->input->post('working_time22');
			$working_time2 = $this->input->post('working_time31').'h'.$this->input->post('working_time32').' - '.$this->input->post('working_time41').'h'.$this->input->post('working_time42');
			if ($this->input->post('genre')==2) {
				$genre = "0";
			}
			else{
				$genre = $this->input->post('genre');
			}
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$diploma = $this->input->post('diploma');
			$years_exp = $this->input->post('years_exp');
			$function = $this->input->post('function');
			$id_role = $this->input->post('id_role');

			$password = null;
			if (!strlen($this->input->post('password')==0)) {
				$password = sha1(sha1(sha1(sha1($this->input->post('password')))));
			}
			//var_dump($password); die;
			$id_mag = $this->input->post('id_mag');

			$profile_img = $this->addImg($id_mag, 'assets/img/personnals/'.$id_mag.'/');

			$state = $this->M_Personal->updPersonal($first_name, $second_name, $reg_number, $age, $working_time1, $working_time2, $genre, $phone, $email, $diploma, $years_exp, $function, $password, $id_mag, $profile_img, $id_role, $user->id_user);

			if ($state) {
				$this->flashdata_success("Modification sur le personnel '".$first_name.' '.$second_name."' avec succès");
        		$this->Auth_user->activity($title, 'Succès');

				redirect ('admin/ControlPanel/personal');
			}
			else{
				$this->flashdata_warning("Échec de modification sur le personnel '".$first_name.' '.$second_name);
        		$this->Auth_user->activity($title, 'Échec');
				
				$this->load->view('admin/personal/update', $data);

				$this->loadindlast();
			}
		}
		else {

			$this->flashdata_warning("Échec de modification");
			$this->Auth_user->activity($title, 'Échec - Erreur de validation');

			$this->load->view('admin/personal/update', $data);

			$this->loadindlast();
		}
	}

	public function updateThisPersonal($id_user) {

		$user = $this->M_Personal->getThisPersonal($id_user);
		$title = 'Modification sur le personnel '.$user->first_name.' '.$user->second_name;

		$this->loadindfirst($title, null, 'manage', 'staffs');

		$data['user'] = $user;

		$data['roles'] = $this->M_Account->getRoles();

		$data['storeshops'] = $this->M_Header->getStoreShop();

		$data['personals'] = $this->M_Personal->getPersonals();

		$this->Auth_user->activity($title, 'FORUMLAIRE');

		$this->load->view('admin/personal/update', $data);

		$this->loadindlast();
	}

	public function addThisPersonal() {
		$title = 'Ajout d\'un personnel';

		$this->loadindfirst($title, null, 'manage', 'staffs');

		$data['roles'] = $this->M_Account->getRoles();

		$data['storeshops'] = $this->M_Header->getStoreShopRegUser();
		

		if ($this->form_validation->run()) {
			$first_name = $this->input->post('first_name');
			$second_name = $this->input->post('second_name');
			$reg_number = $this->input->post('reg_number');
			$age = $this->input->post('age');
			$working_time1 = $this->input->post('working_time11').'h'.$this->input->post('working_time12').' - '.$this->input->post('working_time21').'h'.$this->input->post('working_time22');
			$working_time2 = $this->input->post('working_time31').'h'.$this->input->post('working_time32').' - '.$this->input->post('working_time41').'h'.$this->input->post('working_time42');
			if ($this->input->post('genre')==2) {
				$genre = "0";
			}
			else{

				$genre = $this->input->post('genre');
			}
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$diploma = $this->input->post('diploma');
			$years_exp = $this->input->post('years_exp');
			$function = $this->input->post('function');
			$id_role = $this->input->post('id_role');

			$password = sha1(sha1(sha1(sha1($this->input->post('password')))));
			$id_mag = $this->input->post('id_mag');

			$profile_img = $this->addImg($id_mag, 'assets/img/personnals/'.$id_mag.'/');

			$this->session->set_flashdata('flsh_mess', "Ajout du magasin avec réussite");

			$state = $this->M_Personal->addPersonal($first_name, $second_name, $reg_number, $age, $working_time1, $working_time2, $genre, $phone, $email, $diploma, $years_exp, $function, $password, $id_mag, $profile_img, $id_role);

			if ($state) {
				$this->flashdata_success("Enregistrement du personnel '".$first_name.' '.$second_name."' avec succès");
				$this->Auth_user->activity($title, 'Succès');

				redirect ('admin/ControlPanel/personal');
			}
			else{
				$this->flashdata_warning("Échec d'enregistrement du personnel '".$first_name.' '.$second_name."' avec succès");
				$this->Auth_user->activity($title, 'Échec');
				
				$this->loadindfirst($title, null, 'manage', 'storeshop');

				$this->load->view('admin/personal/add', $data);

				$this->loadindlast();

			}
			
		}
		else {
			$this->flashdata_warning("Échec d'enregistrement");
			$this->Auth_user->activity($title, 'Échec - Erreur de validation');
			
			$this->load->view('admin/personal/add', $data);

			$this->loadindlast();
		}

	}

	public function addPersonal() {
		$title = 'Ajout d\'un personnel';

		$this->loadindfirst($title, null, 'manage', 'staffs');


		$data['roles'] = $this->M_Account->getRoles();

		$data['storeshops'] = $this->M_Header->getStoreShop();

		$data['personals'] = $this->M_Personal->getPersonals();
		$this->Auth_user->activity($title, 'FORUMLAIRE');

		$this->load->view('admin/personal/add', $data);

		$this->loadindlast();
	}

	public function affectPersonal($id_user) {

		$data['user'] = $this->M_Personal->getThisPersonal($id_user);

		if ($data['user']->genre == 0){
			$genre = "Mme ";
		}
		else{
			$genre = "M. ";
		}

		$title = 'Affectation du personnel : '.$genre.' '.$data['user']->first_name.' '.$data['user']->second_name.'<span style="float: right; margin-right: 10px">'.$data['user']->reg_number.'</span>';
		$this->Auth_user->activity($title, 'FORUMLAIRE');

		$this->loadindfirst($title, null, 'manage', 'staffs');


		$data['roles'] = $this->M_Account->getRoles();

		$data['storeshops'] = $this->M_Header->getStoreShop();

		$data['personals'] = $this->M_Personal->getPersonals();


		$this->load->view('admin/personal/affect', $data);

		$this->loadindlast();
	}



	public function affectHispersonal() {

		$id_user = $this->input->post('id_user');

		$data['user'] = $this->M_Personal->getThisPersonal($id_user);

		if ($data['user']->genre == 0){
			$genre = "Mme ";
		}
		else{
			$genre = "M. ";
		}

		$title = 'Affectation du personnel : '.$genre.' '.$data['user']->first_name.' '.$data['user']->second_name.'<span style="float: right; margin-right: 10px">'.$data['user']->reg_number.'</span>';

		$this->loadindfirst($title, null, 'manage', 'staffs');


		$data['roles'] = $this->M_Account->getRoles();

		$data['storeshops'] = $this->M_Header->getStoreShop();

		$data['personals'] = $this->M_Personal->getPersonals();

		if ($this->form_validation->run()) {

			$id_mag = $this->input->post('id_mag');
			$id_role = $this->input->post('id_role');
			$function = $this->input->post('function');

			$state = $this->M_Personal->affectPersonal($id_mag, $id_user, $id_role, $function);

			if ($state) {
				$this->flashdata_success("Affectation du personnel avec succès");
				$this->Auth_user->activity($title, 'Succès');

				redirect ('admin/ControlPanel/personal');
			}
			else{
				
				$this->flashdata_success("Échec d'Affectation du personnel");
				$this->Auth_user->activity($title, 'Échec');

				$this->load->view('admin/personal/affect', $data);

				$this->loadindlast();

			}
			
		}
		else {
				
			$this->flashdata_success("Échec d'Affectation du personnel");
			$this->Auth_user->activity($title, 'Échec - Erreur de validation');

			$this->load->view('admin/personal/affect', $data);

			$this->loadindlast();
		}
	}

	public function deletePersonal($id_user) {
		$user_delete = $this->M_Personal->getThisPersonal($id_user);

		$this->M_Personal->delPersonal($id_user);
		
		$this->flashdata_info("Utilisateur ".$user_delete->first_name." ".$user_delete->second_name." supprimé.");
		$this->Auth_user->activity('Suppression : '."Utilisateur ".$user_delete->first_name." ".$user_delete->second_name, 'Succès');
		
		redirect("admin/ControlPanel/personal"); 
	}

	public function activatePersonal($id_user, $state, $id_role) {
		$this->M_Personal->changeState($id_user, $state, $id_role);
		$this->flashdata_info("Etat du personnel modifié");
		$this->Auth_user->activity('Visibilité : '."Utilisateur ".$user_delete->first_name." ".$user_delete->second_name, 'modifiée');
		
		redirect("admin/ControlPanel/personal");
	}


////////////////// Fin Gestion du personnel  ////////////////////////////



////////////////// Début Gestion des produits  ////////////////////////////



	public function reason($id_mag=null) {

		if (!is_null($id_mag)) {
			$data['store_shop'] = $this->M_Header->getStoreShop($id_mag);

	    	$sub_title = $data['store_shop']->name;

			$title = 'Gestion du magasin : '.$data['store_shop']->name.'<span style="float:right;">'.$data['store_shop']->phone_ss
			."</span>";			

			$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
			$data['types_reason'] = $this->M_Reason->getTypeRea();

			$data['reasons'] = $this->M_Reason->select_all($id_mag);
			$data['id_mag'] = $id_mag;

			$this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);
			$this->Auth_user->activity('Consultation : '.$title, 'Produits');

			$this->load->view('admin/reason/list', $data);

		}
		else{
			$title = 'Actions générales sur les produits';

			$this->loadindfirst($title, null, 'manage', 'reason');
			$this->Auth_user->activity('Consultation : '.$title, 'Produits');

			$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
			$data['types_reason'] = $this->M_Reason->getTypeRea();
			$data['reasons'] = $this->M_Reason->select_all();

			$this->load->view('admin/reason/list', $data);

		}

		$this->loadindlast();
	}

	public function changeRea($id_reason, $state_reason) {
		$reason = $this->M_Reason->get_reason($id_reason);
		$this->M_Reason->activate($id_reason, $state_reason);
		$this->flashdata_info("Etat du produit '".$reason->name_reason."' modifié");
		$this->Auth_user->activity('Visibilité : '.$reason->name_reason, 'modifiée');
		
		redirect("admin/ControlPanel/reason"); 

	}

	public function addR() {
		$title = 'Ajout d\'un service / produit';

		$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
		$data['types_reason'] = $this->M_Reason->getTypeRea();
		$data['reasons'] = $this->M_Reason->select_all();
		$this->Auth_user->activity($title, 'FORUMLAIRE');
			
		$this->loadindfirst($title, null, 'manage', 'reason');

		$this->load->view('admin/reason/add', $data);

		$this->loadindlast();

	}


	public function addRea(){
		$title = 'Ajout d\'un service / produit';

		$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
		$data['types_reason'] = $this->M_Reason->getTypeRea();
		$data['reasons'] = $this->M_Reason->select_all();

			
		$this->loadindfirst($title, null, 'manage', 'reason');

		if ($this->form_validation->run()) {

			$name_reason = $this->input->post('name_reason');
			$origine_reason = $this->input->post('origine_reason');
			$description_reason = $this->input->post('description_reason');
			$price_reason = $this->input->post('price_reason');
			$old_price = $this->input->post('old_price');
			$type_reason = $this->input->post('type_reason');
			$date_manufacturate = $this->input->post('date_manufacturate');
			$date_experation = $this->input->post('date_experation');
			$id_sub_cat_reason = $this->input->post('id_cat_reason');
			$note_reason = $this->input->post('note_reason');
			$code_reason = $this->input->post('code_reason');

			$id_user = $this->session->userdata('auth_user')['id_user'];

			$img_reason = 'small/';
			$img2_reason = 'big/';

			$img_reason .= $this->addImg($type_reason, 'assets/img/reason/small/'.$type_reason.'/');
			$img2_reason .= $this->addImg2($type_reason, 'assets/img/reason/big/'.$type_reason.'/');


			$state = $this->M_Reason->save($name_reason, $code_reason, $price_reason, $old_price, $origine_reason, $type_reason, $note_reason, $img_reason, $img2_reason, $id_sub_cat_reason, $id_user, $description_reason, str_replace('/', '-', $date_manufacturate), str_replace('/', '-', $date_experation));

			if ($state) {
				$this->flashdata_success("Enregistrement du produit '".$name_reason.' '.$code_reason."' avec succès");
				$this->Auth_user->activity('Enregistrement du produit : '.$name_reason.' '.$code_reason, 'Succès');

				redirect ('admin/ControlPanel/reason');
			}
			else{
				$this->flashdata_warning("Échec d'ajout du produit");
				$this->Auth_user->activity('Enregistrement du produit : '.$name_reason.' '.$code_reason, 'Échec');

				$this->load->view('admin/reason/add', $data);

				$this->loadindlast();
			}
			
		}
		else {
			$this->flashdata_warning("Échec d'ajout du produit");
			$this->Auth_user->activity('Enregistrement du produit : '.$name_reason.' '.$code_reason, 'Échec - Erreur de validation');

			$this->load->view('admin/reason/add', $data);

			$this->loadindlast();
		}
	}

	public function delRea($id_reason) {

		$reason_delete = $this->M_Reason->get_reason($id_reason);

		$this->M_Reason->delete($id_reason);
		$this->flashdata_info("produit  '".$reason_delete->name_reason."' supprimé.");
		$this->Auth_user->activity('Suppression du produit : '.$reason_delete->name_reason.' '.$reason_delete->code_reason, 'Échec - Erreur de validation');
		
		redirect("admin/ControlPanel/reason");
	}

	public function view_updateRea($id_reason, $data = array()){

		$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
		$data['types_reason'] = $this->M_Reason->getTypeRea();

		$data['thisReason'] = $this->M_Reason->get_reason($id_reason);

		$title = "Modification de : ".$data['thisReason']->name_reason ;
		$this->Auth_user->activity($title, 'Produits');
				
		$this->loadindfirst($title, null, 'manage', 'reason');

		$this->load->view('admin/reason/update_rea', $data);

		$this->loadindlast();
	}

	public function view_affectRea($id_reason){

		$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
		$data['types_reason'] = $this->M_Reason->getTypeRea();

		$data['thisReason'] = $this->M_Reason->get_reason($id_reason);

		$title = "Attribution de : ".$data['thisReason']->name_reason.'<span style="float:right; margin-right:10px">'.$data['thisReason']->code_reason.'</span>' ;
		$this->Auth_user->activity($title, 'Produits');
				
		$this->loadindfirst($title, null, 'manage', 'reason');

		$this->load->view('admin/reason/affect_rea', $data);

		$this->loadindlast();
	}

	public function affectRea(){

		$id_reason = $this->input->post('id_reason');

		$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
		$data['types_reason'] = $this->M_Reason->getTypeRea();

		$data['thisReason'] = $this->M_Reason->get_reason($id_reason);

		$title = "Attribution de : ".$data['thisReason']->name_reason.'<span style="float:right; margin-right:10px">'.$data['thisReason']->code_reason.'</span>' ;
				
		$this->loadindfirst($title, null, 'manage', 'reason');

		if ($this->form_validation->run()) {

			$id_mag = $this->input->post('id_mag');
			$description_prop = $this->input->post('description_prop');
			$quantity = $this->input->post('quantity');

			$duration_prop = $this->input->post('duration_prop');

			$id_user = $this->session->userdata('auth_user')['id_user'];

			$img_prop = $this->addImg($id_mag, 'assets/img/propositions/'.$id_mag.'/');

			$storeshop = $this->M_Header->getStoreShop($id_mag);
			$state = $this->M_Reason->affect($id_reason, $id_mag, $duration_prop, $description_prop, $quantity, $id_user, $img_prop);

			if ($state) {
				$this->flashdata_success( "Atrribution du produit '".$data['thisReason']->name_reason." au Mag. ".$storeshop->description."' avec succès");
				$this->Auth_user->activity($title, 'Succès - Magasin : '.$storeshop->description);

				redirect ('admin/ControlPanel/reason');
			}
			else{
				$this->flashdata_warning("Échec d'atrribution du produit'".$data['thisReason']->name_reason." au Magasin ".$storeshop->description);	
				$this->Auth_user->activity($title, 'Échec - Magasin : '.$storeshop->description);		

				$this->load->view('admin/reason/affect_rea', $data);

				$this->loadindlast();

			}
			
		}
		else {
			$this->flashdata_warning("Échec d'atrribution du produit");	
			$this->Auth_user->activity($title, 'Échec - Erreur de validation');		

			$this->load->view('admin/reason/affect_rea', $data);

			$this->loadindlast();
		}
	}

	public function updRea(){

		$data['thisReason'] = $this->M_Reason->get_reason($this->input->post('id_reason'));

		$title = 'Modification de :'.$data['thisReason']->name_reason;
		
		$data['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, id_cat')->get('sub_category')->result_array();
		$data['types_reason'] = $this->M_Reason->getTypeRea();


		$id_reason = $this->input->post('id_reason');
			
		$this->loadindfirst($title, null, 'manage', 'reason');

		if ($this->form_validation->run()) {

			$name_reason = $this->input->post('name_reason');
			$origine_reason = $this->input->post('origine_reason');
			$description_reason = $this->input->post('description_reason');
			$price_reason = $this->input->post('price_reason');
			$old_price = $this->input->post('old_price');
			$type_reason = $this->input->post('type_reason');
			$date_manufacturate = $this->input->post('date_manufacturate');
			$date_experation = $this->input->post('date_experation');
			$id_sub_cat_reason = $this->input->post('id_cat_reason');
			$note_reason = $this->input->post('note_reason');
			$code_reason = $this->input->post('code_reason');

			$img_reason = 'small/';

			$img2_reason = 'big/';

			$img_reason .= $this->addImg($type_reason, 'assets/img/reason/small/'.$type_reason.'/');

			$img2_reason .= $this->addImg2($type_reason, 'assets/img/reason/big/'.$type_reason.'/');


			$id_user = $this->session->userdata('auth_user')['id_user'];


			$state = $this->M_Reason->update($id_reason, $name_reason, $code_reason, $price_reason, $old_price, $origine_reason, $type_reason, $note_reason, $img_reason, $img2_reason, $id_sub_cat_reason, $id_user, $description_reason, str_replace('/', '-', $date_manufacturate), str_replace('/', '-', $date_experation));

			if ($state) {
				$this->flashdata_success("Modification du produit '".$name_reason." ".$code_reason."' avec succès");
				$this->Auth_user->activity($title, 'Succès');	
				
				redirect ('admin/ControlPanel/reason');
			}
			else{
				$this->flashdata_warning("Échec de modification du produit");
				$this->Auth_user->activity($title, 'Échec');

				$this->load->view('admin/reason/update_rea', $data);

				$this->loadindlast();

			}			
		}
		else {
			$this->flashdata_warning("Échec de modification du produit");
			$this->Auth_user->activity($title, 'Échec - Erreur de validation');

			$this->load->view('admin/reason/update_rea', $data);

			$this->loadindlast();
		}
	}

////////////////// Fin Gestion des produits   ////////////////////////////



////////////////// Début Gestion des Images des gestion  ////////////////////////////

	public function addImg($id, $upload_path, $max_size=null, $max_width=null, $max_height=null) {

		if($_FILES["userimage"]['name']=='') {
			$this->flashdata_info("Aucune image choisie");
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
				$this->flashdata_info("Aucune image choisie | Fichier non reconnu.");
				return null;
			}
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);


			if (file_exists($config['upload_path'].$config['file_name'])) {
				
				if(is_null($id)){
					return $config['file_name'];
				}
			    return $id.'/'.$config['file_name'];
			}

			if ( ! $this->upload->do_upload('userimage')) {
				$error = array('error' => $this->upload->display_errors());

				return $error;
			}

			$data = $this->upload->data(); 

				//$extension = substr(strrchr($_FILES["userimage"]['name'], '.') ,1);


			if(is_null($id)){
				return $config['file_name'];
			}

			return $id.'/'.$config['file_name'];		

		//$this->M_Img->saveImg(array('profile'=>$config['file_name'],));
		}
	}

	public function addImg2($id, $upload_path, $max_size=null, $max_width=null, $max_height=null) {

        if($_FILES["userfile"]['name']=='') {
			$this->flashdata_info("Aucune image choisie | Fichier non reconnu.");
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
			
			$config['file_name'] = $_FILES["userfile"]['name'];
			
			$this->load->library('upload', $config); //Loads the Uploader Library
			
			$this->upload->initialize($config);

			if (file_exists($config['upload_path'].$config['file_name'])) {
				
				if(is_null($id)){
					return $config['file_name'];
				}
			    return $id.'/'.$config['file_name'];
			}

			if ( ! $this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				$this->flashdata_info("Aucune image choisie | Fichier non reconnu.");

				return $error;
			}

			$data = $this->upload->data();

			if(is_null($id)){
				return $config['file_name'];
			}

			return $id.'/'.$config['file_name'];
		}
    }

////////////////// Fin Gestion des Images des gestion  ////////////////////////////


////////////////// Début Gestion du materiels et des manipulations  ////////////////////////////

	public function material($id_mag=null) {

		$title = 'Actions générales sur le matériel';

		if (!is_null($id_mag)) {
			$data['store_shop'] = $this->M_Header->getStoreShop($id_mag);

	    	$sub_title = $data['store_shop']->name;

			$title = 'Gestion du magasin : '.$data['store_shop']->name.'<span style="float:right;">'.$data['store_shop']->phone_ss
			."</span>";

			$data['materials'] = $this->M_Material->select_all($id_mag);

			$this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);
			$this->Auth_user->activity($title, 'Matériels');

			$this->load->view('admin/storeshop/material/list', $data);
		}
		else{

			$data['materials'] = $this->M_Material->select_all();

			$this->loadindfirst($title, null, 'manage', 'material');
			$this->Auth_user->activity($title, 'Matériels');

			$this->load->view('admin/material/list', $data);
		}

		$this->loadindlast();
	}

	public function changeMat($id_mat, $state_mat) {
		$material = $this->M_Material->get_material($id_mat);

		$this->M_Material->activate($id_mat, $state_mat);
		$this->flashdata_info("Etat du matériel '".$material->name_mat." - ".$material->reg_num_mat."' modifié");
		$this->Auth_user->activity("Visibilité du matériel".$material->name_mat." - ".$material->reg_num_mat, 'Succès');
		
		redirect("admin/ControlPanel/material");
	}

	public function addMat() {
		$title = 'Ajout d\'un matériel';
		$this->Auth_user->activity($title, 'FORUMLAIRE');
				
		$this->loadindfirst($title, null, 'manage', 'material');

		$this->load->view('admin/material/add');

		$this->loadindlast();
	}

	public function addThisMat(){
		$title = 'Ajout d\'un matériel';
				
		$this->loadindfirst($title, null, 'manage', 'material');

		if ($this->form_validation->run()) {

			$name_mat = $this->input->post('name_mat');
			$reg_num_mat = $this->input->post('reg_num_mat');
			$desc_mat = $this->input->post('desc_mat');

			$img_mat = $this->addImg(null, 'assets/img/materials/');

			$state = $this->M_Material->save($name_mat, $reg_num_mat, $desc_mat, $img_mat);

			if ($state) {
				$this->flashdata_success("Enregistrement du matériel ".$name_mat." ".$reg_num_mat." avec succès");
				$this->Auth_user->activity("Enregistrement du matériel : ".$name_mat." ".$reg_num_mat, 'Succès');

				redirect ('admin/ControlPanel/material');
			}
			else{
				$this->flashdata_warning( "Échec d'ajout du matériel");
				$this->Auth_user->activity("Enregistrement du matériel : ".$name_mat." ".$reg_num_mat, 'Échec');

				$this->load->view('admin/material/add', $data);

				$this->loadindlast();
			}
			
		}
		else {
			$this->flashdata_warning( "Échec d'ajout du matériel");
			$this->Auth_user->activity("Enregistrement du matériel", 'Échec - Erreur de validation');

			$this->load->view('admin/material/add');

			$this->loadindlast();
		}
	}

	public function view_updateMat($id_mat){

		$data['thisMat'] = $this->M_Material->get_material($id_mat);

		$title = "Modification de : ".$data['thisMat']->name_mat ;
		
		$this->Auth_user->activity($title, 'FORUMLAIRE');
				
		$this->loadindfirst($title, null, 'manage', 'material');

		$this->load->view('admin/material/edit', $data);

		$this->loadindlast();
	}

	public function updateMat(){

		$id_mat = $this->input->post('id_mat');

		$data['thisMat'] = $this->M_Material->get_material($id_mat);

		$title = "Modification de : ".$data['thisMat']->name_mat ;
				
		$this->loadindfirst($title, null, 'manage', 'material');

		if ($this->form_validation->run()) {

			$name_mat = $this->input->post('name_mat');
			$reg_num_mat = $this->input->post('reg_num_mat');
			$desc_mat = $this->input->post('desc_mat');

			$img_mat = $this->addImg(null, 'assets/img/materials/');

			$state = $this->M_Material->update($id_mat, $name_mat, $reg_num_mat, $desc_mat, $img_mat);

			if ($state) {
				$this->flashdata_success("Modification du matériel '".$data['thisMat']->name_mat."' en '".$name_mat." - ".$reg_num_mat."' avec succès");
				$this->Auth_user->activity("Modification du matériel '".$data['thisMat']->name_mat."' en '".$name_mat." - ".$reg_num_mat, 'Succès');

				redirect ('admin/ControlPanel/material');
			}
			else{

				$this->flashdata_warning("Échec de modification du matériel : ".$data['thisMat']->name_mat);
				$this->Auth_user->activity($title, 'Échec');

				$this->load->view('admin/material/edit', $data);

				$this->loadindlast();

			}
			
		}
		else {
				
			$this->flashdata_warning("Échec de modification du matériel");
			$this->Auth_user->activity($title, 'Échec - Erreur de validation');

			$this->load->view('admin/material/edit', $data);

			$this->loadindlast();
		}
	}

	public function delMat($id_mat) {

		$mat_delete = $this->M_Material->get_material($id_mat);

		$this->M_Material->delete($id_mat);
		
		$this->flashdata_info("Matériel '".$mat_delete->name_mat."' supprimé.");
		$this->Auth_user->activity("Suppression du materiel : ".$mat_delete->name_mat, 'Succès');
		
		redirect("admin/ControlPanel/material"); 
	}

	public function view_affectMat($id_mat) {

		$data['thisMat'] = $this->M_Material->get_material($id_mat);

		$data['storeshops'] = $this->M_Header->getStoreShop();

		$title = 'Attribution du matériel : '.$data['thisMat']->name_mat.'<span style="float:right; margin-right: 20px">'.$data['thisMat']->reg_num_mat.'</span>' ;
				
		$this->loadindfirst($title, null, 'manage', 'material');
		$this->Auth_user->activity($title, 'FORUMLAIRE');

		$this->load->view('admin/material/affect', $data);

		$this->loadindlast();
	}

	public function affectMat() {

		$id_mat = $this->input->post('id_mat');

		$data['thisMat'] = $this->M_Material->get_material($id_mat);

		$data['storeshops'] = $this->M_Header->getStoreShop();

		$title = 'Attribution du matériel : '.$data['thisMat']->name_mat.'<span style="float:right; margin-right: 20px">'.$data['thisMat']->reg_num_mat.'</span>' ;
				
		$this->loadindfirst($title, null, 'manage', 'material');

		if ($this->form_validation->run()) {

			$id_mag = $this->input->post('id_mag');
			$quantity = $this->input->post('quantity');
			$duration_prop = $this->input->post('duration_prop');
			$description_prop = $this->input->post('description_prop');

			$img_prop = $this->addImg($id_mag, 'assets/img/attributes/'.$id_mag.'/');

			$state = $this->M_Material->affect($id_mat, $id_mag, $quantity, $duration_prop, $description_prop, $img_prop);
			
			$data['storeshop'] = $this->M_Header->getStoreShop($id_mag);

			if ($state) {
				$this->flashdata_success("Affectation du matériel '".$data['thisMat']->name_mat."' au Magasin '".$data['storeshop']->description."' avec succès");
				$this->Auth_user->activity($title, 'Succès - Magasin : '.$data['storeshop']->description);

				redirect ('admin/ControlPanel/material');
			}
			else{
				$this->flashdata_warning("Échec d'affectation du matériel '".$data['thisMat']->name_mat."' au Magasin '".$data['storeshop']->description);

				$this->Auth_user->activity($title, 'Échec - Magasin : '.$data['storeshop']->description);

				$this->load->view('admin/material/affect', $data);

				$this->loadindlast();
			}
			
		}
		else {
			
			$this->flashdata_warning("Échec d'affectation du matériel ".$data['thisMat']->name_mat); 

			$this->Auth_user->activity($title, 'Échec - Erreur de validation');

			$this->load->view('admin/material/affect', $data);

			$this->loadindlast();
		}

	}

////////////////// Fin Gestion du materiels et des manipulations  ////////////////////////////



////////////////// Début Gestion des clients  ////////////////////////////

	public function customer($new_customer=null) {

		$title = 'Actions générales sur les clients';

		$this->loadindfirst($title, null, 'manage', 'customer');
		
		$this->Auth_user->activity('Consultation : '.$title, 'Clients');

		if (!is_null($new_customer)) {
			$data['customers'] = $this->M_Customer->select_all_news();
		}
		else{
			$data['customers'] = $this->M_Customer->select_all();
		}

		$this->load->view('admin/customer/list', $data);

		$this->loadindlast();
	}

	public function view_updateCus($id_costomer){

		$data['slices_ages'] = $this->M_Account->getSliceAge();
		$data['countries'] = $this->M_Account->getCountry();

		$data['thisCus'] = $this->M_Customer->get_customer($id_costomer);

		$title = "Modification de : ".$data['thisCus']->fname_cost.' '.$data['thisCus']->sname_cost ;
		
		$this->Auth_user->activity($title, 'FORUMLAIRE');
				
		$this->loadindfirst($title, null, 'manage', 'customer');

		$this->load->view('admin/customer/edit', $data);

		$this->loadindlast();
	}

	public function viewOrtherCus($id_costomer){

		$data['slices_ages'] = $this->M_Account->getSliceAge();
		$data['countries'] = $this->M_Account->getCountry();

		$data['thisCus'] = $this->M_Customer->get_customer($id_costomer);

		$title = "Autres actions sur l'utilisateur : ".$data['thisCus']->fname_cost.' '.$data['thisCus']->sname_cost ;

		$this->Auth_user->activity($title, 'FORUMLAIRE');
				
		$this->loadindfirst($title, null, 'manage', 'customer');

		$this->load->view('admin/customer/orther', $data);

		$this->loadindlast();
	}


	public function updateCus(){

		$id_costomer = $this->input->post('id_costomer');

		$data['slices_ages'] = $this->M_Account->getSliceAge();
		$data['countries'] = $this->M_Account->getCountry();

		$data['thisCus'] = $this->M_Customer->get_customer($id_costomer);

		$title = "Modification de : ".$data['thisCus']->fname_cost.' '.$data['thisCus']->sname_cost ;
				
		$this->loadindfirst($title, null, 'manage', 'customer');

		if ($this->form_validation->run()) {

			$fname_cost = $this->input->post('fname_cost');
			$sname_cost = $this->input->post('sname_cost');
			$genre = $this->input->post('genre');
			$id_slice_age = $this->input->post('id_slice_age');
			$profession = $this->input->post('profession');
			$email_cost = $this->input->post('email_cost');

			$id_country = $this->input->post('country');
			
			$password = null;
            if (!strlen($this->input->post('password')==0)) {
                $password = sha1(sha1(sha1(sha1($this->input->post('password')))));
            }

			$phone = $this->input->post('phone');
			

            $profile_img = $this->addImg($id_country, 'assets/img/customers/'.$id_country.'/');

			$state = $this->M_Customer->updateCustomer($id_costomer, $fname_cost, $sname_cost, $genre, $id_slice_age, $profession, $email_cost, $phone, $password, $profile_img, $id_country);

			if ($state) {
				$this->flashdata_success("Modification de compte client '".$fname_cost.' '.$sname_cost."' effectuée avec succès"); 
				$this->Auth_user->activity($title ." pour '".$fname_cost.' '.$sname_cost, 'Succès');
				
				redirect ('admin/ControlPanel/customer');
			}
			else{
				$this->flashdata_warning("Échec de modification de compte client");
				$this->Auth_user->activity($title ." pour '".$fname_cost.' '.$sname_cost, 'Échec');

				$this->load->view('admin/customer/edit', $data);

				$this->loadindlast();
			}
		}
		else {
			$this->flashdata_warning("Échec de modification de compte client");
			$this->Auth_user->activity($title, 'Échec - Erreur de validation');

			$this->load->view('admin/customer/edit', $data);

			$this->loadindlast();
		}

	}

	public function delCus($id_costomer) {

		$costomer = $this->M_Customer->get_customer($id_costomer);

		$this->M_Customer->delete($id_costomer);
		$this->flashdata_info("Compte client : '".$costomer->fname_cost." ".$costomer->sname_cost."' supprimé.");
		
		$this->Auth_user->activity("Suppression de Compte client : '".$costomer->fname_cost." ".$costomer->sname_cost, 'Succès');
		
		redirect("admin/ControlPanel/customer"); 
	}

	public function changeCus($id_costomer, $state) {

		$costomer = $this->M_Customer->get_customer($id_costomer);

		$this->M_Customer->activate($id_costomer, $state);
		$this->flashdata_info("Compte client : '".$costomer->fname_cost." ".$costomer->sname_cost."' modifié.");
		$this->Auth_user->activity("Visibilité de Compte client : '".$costomer->fname_cost." ".$costomer->sname_cost, 'modifiée');
		
		redirect("admin/ControlPanel/customer");
	}

////////////////// Fin Gestion des clients  ////////////////////////////

}

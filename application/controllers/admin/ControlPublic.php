<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPublic extends CI_Controller {

	private $title = 'B_O - PANEL DE CONTROL | ';

	public function __construct()
    {
        parent::__construct();
        $this->load->model('control/Auth_user');
        
        $this->load->model('public/M_Header');
        $this->load->model('public/M_Account');
        $this->load->model('public/M_Forum');
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

	public function category() {

		$title = 'Gestion des catégories : Principales';
		$sub_title = 'Catégories disponibles';
		$manage = 'reason';
		$sub_manage = 'category';

    	$data['categories'] = $this->M_Header->getCat();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->view('admin/category/index', $data);

		$this->loadindlast();

	}

	public function sub_category() {

		$title = 'Gestion des catégories : Sous-catégories';
		$sub_title = 'Sous-catégories disponibles';
		$manage = 'reason';
		$sub_manage = 'sub_category';

    	$data['sub_categories'] = $this->M_Header->getSubCat();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->view('admin/category/sub_category', $data);

		$this->loadindlast();

	}
	
	public function addSubCat() {

		//addSubCat BLUE - Pure Claire 60%

		$title = 'Gestion des catégories : Sous-catégories';
		$sub_title = 'Sous-catégories disponibles';
		$manage = 'reason';
		$sub_manage = 'sub_category';

    	$data['sub_categories'] = $this->M_Header->getSubCat();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

        $this->form_validation->set_rules('label_c_cat', 'Titre de la sous-catégorie', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('id_cat', 'Catégorie ', 'required|min_length[1]|max_length[4]|trim');

        if ($this->form_validation->run() == false) {

			$this->flashdata_warning("Échec d'enregistrement de cette sous-catégorie");

			$this->load->view('admin/category/sub_category', $data);

			$this->loadindlast();
        }
        else {

			$label_c_cat = $this->input->post('label_c_cat');

			$id_cat = $this->input->post('id_cat');

			//$img_cat = $this->input->post('userimage');

			$img_sub_cat = $this->addImg(null, 'assets/img/category/'.$id_cat.'/');

			if (is_null($img_sub_cat)) {
				$this->flashdata_warning("Une image à associer est nécessaire");

				redirect('admin/ControlPublic/sub_category');
			}

			$state = $this->M_Header->addSubCat($id_cat, $label_c_cat, $id_cat.$img_sub_cat);

			if ($state) {
				$this->flashdata_success("Ajout de cette sous-catégories avec succès");

				redirect('admin/ControlPublic/sub_category');
			}
			else{
				$this->flashdata_warning("Échec d'enregistrement de cette sous-catégorie");

				$this->load->view('admin/category/sub_category', $data);

				$this->loadindlast();

			}
        }

	}


	public function updateCat($id_cat) {

		$title = 'Gestion des catégories';
		$sub_title = 'Catégories disponibles';
		$manage = 'reason';
		$sub_manage = 'category';

    	$data['categories'] = $this->M_Header->getCat();

    	$category = $this->M_Header->getCat($id_cat);

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

        $this->form_validation->set_rules('label'.$id_cat, 'Titre de la catégorie', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('generation'.$id_cat, 'Génération ', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('article'.$id_cat, 'Type ', 'required|min_length[4]|max_length[31]|trim');

        if ($this->form_validation->run() == false) {
			
			$this->flashdata_warning("Échec de modification de la catégorie '".$category->label);

			$this->load->view('admin/category/index', $data);

			$this->loadindlast();
        }
        else {

			$label = $this->input->post('label'.$id_cat);

			$generation = $this->input->post('generation'.$id_cat);

			$article = $this->input->post('article'.$id_cat);

			$img_cat = $this->input->post('userimage'.$id_cat);

			$img_cat = $this->addImg($id_cat, 'assets/img/category/'.$id_cat.'/');

			if (is_array($img_cat)) {
				$this->flashdata_warning("Échec de modification de la catégorie '".$category->label." : ".$img_cat["error"]);

				redirect('admin/ControlPublic/category');
			}

			$state = $this->M_Header->updateCat($id_cat, $label, $generation, $article, $img_cat);

			if ($state) {

				$category = $this->M_Header->getCat($id_cat);
				$this->flashdata_success("Modification de la catégories '".$category->label."' avec succès");

				redirect('admin/ControlPublic/category');
			}
			else{
				$this->flashdata_warning("Échec de modification de la catégorie '".$category->label);

				$this->load->view('admin/category/index', $data);

				$this->loadindlast();

			}
        }
	}

	public function updateSubCat($id_sub_cat) {

		$title = 'Gestion des catégories : Sous-catégories';
		$sub_title = 'Sous-catégories disponibles';
		$manage = 'reason';
		$sub_manage = 'sub_category';

    	$data['sub_categories'] = $this->M_Header->getSubCat();

    	$sub_category = $this->M_Header->getSubCat($id_sub_cat);

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

        $this->form_validation->set_rules('label_c_cat'.$id_sub_cat, 'Titre de la sous-catégorie', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('id_cat'.$id_sub_cat, 'Catégorie ', 'required|min_length[1]|max_length[4]|trim');
        

        if ($this->form_validation->run() == false) {
			
			$this->flashdata_warning("Échec de modification de la catégorie '".$sub_category->label_c_cat);

			$this->load->view('admin/category/sub_category', $data);

			$this->loadindlast();
        }
        else {

			$label_c_cat = $this->input->post('label_c_cat'.$id_sub_cat);

			$id_cat = $this->input->post('id_cat'.$id_sub_cat);

			$img_sub_cat = $this->addImg($id_cat, 'assets/img/category/'.$id_cat.'/');

			if (is_array($img_sub_cat)) {

				$this->flashdata_warning("Échec de modification de la catégorie '".$sub_category->label_c_cat);

				redirect('admin/ControlPublic/sub_category');
			}

			$state = $this->M_Header->updateSubCat($id_sub_cat, $id_cat, $label_c_cat, $img_sub_cat);

			if ($state) {

				$category = $this->M_Header->getCat($id_cat);
				$this->flashdata_success("Modification de la catégories '".$sub_category->label_c_cat."' avec succès");

				redirect('admin/ControlPublic/sub_category');
			}
			else{
				$this->flashdata_warning("Échec de modification de la catégorie '".$sub_category->label_c_cat);

				$this->load->view('admin/category/sub_category', $data);

				$this->loadindlast();

			}
        }
	}

	public function addCat() {

		$title = 'Gestion des catégories';
		$sub_title = 'Catégories disponibles';
		$manage = 'reason';
		$sub_manage = 'category';

    	$data['categories'] = $this->M_Header->getCat();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

        $this->form_validation->set_rules('label', 'Titre de la catégorie', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('generation', 'Génération ', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('article', 'Type ', 'required|min_length[4]|max_length[31]|trim');

        if ($this->form_validation->run() == false) {
			
			$this->flashdata_warning("Échec d'enregistrement de la catégorie");

			$this->load->view('admin/category/index', $data);

			$this->loadindlast();
        }
        else {

			$label = $this->input->post('label');

			$generation = $this->input->post('generation');

			$article = $this->input->post('article');

			$img_cat = $this->input->post('userimage');

			$img_cat = $this->addImg($id_cat, 'assets/img/category/'.$id_cat.'/');

			if (is_null($img_cat)) {
				$this->flashdata_warning("Une image à associer est nécessaire");

				redirect('admin/ControlPublic/category');
			}

			$state = $this->M_Header->addCat($id_cat, $label, $generation, $article, $img_cat);

			if ($state) {
				$this->flashdata_success("Ajout de la catégories avec succès");

				redirect('admin/ControlPublic/category');
			}
			else{
				$this->flashdata_warning("Échec d'enregistrement de la catégorie");

				$this->load->view('admin/category/index', $data);

				$this->loadindlast();

			}
        }
	}


	public function stateSubCat($id_sub_cat, $state_sub_cat) {


		$this->M_Header->stateSubCat($id_sub_cat, $state_sub_cat);
		$sub_category = $this->M_Header->getSubCat($id_sub_cat);
		$this->flashdata_info("Modification de l'état de la sous-catégorie '".$sub_category->label_c_cat."' avec succès");
		redirect ('admin/ControlPublic/sub_category');

	}

	public function stateCat($id_cat, $state_cat) {


		$this->M_Header->stateCat($id_cat, $state_cat);
		$category = $this->M_Header->getCat($id_cat);
		$this->flashdata_info("Modification de l'état de la catégorie '".$category->label."' avec succès");
		redirect ('admin/ControlPublic/category');

	}

	public function legal() {
		$title = 'Mentions légales et termes de ventes / commandes / achats';
		$sub_title = 'Gestion du slide ACCUEIL';
		$manage = 'site';
		$sub_manage = 'legal';

		$data['presentations'] = $this->M_Header->presentationAdm();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->view('admin/slide/legal', $data);

		$this->loadindlast();
	}

	public function updateSlide($id_slide) {

		$title = 'Gestion de la présentation du site';
		$sub_title = 'slide ACCUEIL';
		$manage = 'site';
		$sub_manage = 'slide';

		$data['slides'] = $this->M_Header->slides();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->library('form_validation');


        $this->form_validation->set_rules('title0'.$id_slide, 'Titre du Slide', 'required|min_length[4]|max_length[121]|trim');
        
        $this->form_validation->set_rules('title'.$id_slide, 'Mise en entrée ', 'required|min_length[4]|max_length[242]|trim');
        
        $this->form_validation->set_rules('description'.$id_slide, 'Description ', 'required|min_length[10]|max_length[872]|trim');

        if ($this->form_validation->run() == false) {
			$this->flashdata_warning("Échec de modification du slide");

			$this->load->view('admin/slide/index', $data);

			$this->loadindlast();
        }
        else {

			$title0 = $this->input->post('title0'.$id_slide);

			$title = $this->input->post('title'.$id_slide);

			$description = $this->input->post('description'.$id_slide);

			$img_slide = $this->input->post('userimage'.$id_slide);


			$img_slide = $this->addImg($id_slide, 'assets/img/slider/'.$id_slide.'/');


			$state = $this->M_Header->updateSlide($id_slide, $title0, $title, $description, $img_slide);

			if ($state) {
				$this->flashdata_success("Modification du slide d'identifiant '".$id_slide."' avec succès");

				redirect('admin/ControlPublic');
			}
			else{
				
				$this->flashdata_warning("Échec de modification du slide");

				$this->load->view('admin/slide/index', $data);

				$this->loadindlast();

			}
        }
	}

	public function updPresentationAdm($id_slide) {

		$title = 'Gestion de la présentation du site';
		$sub_title = 'slide ACCUEIL';
		$manage = 'site';
		$sub_manage = 'presentation';

		$data['presentations'] = $this->M_Header->presentationAdm();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->library('form_validation');
        
        $this->form_validation->set_rules('title0'.$id_slide, 'Titre ', 'required|min_length[10]|max_length[62]|trim');

        $this->form_validation->set_rules('description'.$id_slide, 'Description ', 'required|min_length[10]|max_length[872]|trim');

        if ($this->form_validation->run() == false) {
			
			$this->flashdata_warning("Échec de modification de la présentation");

			$this->load->view('admin/slide/legal', $data);

			$this->loadindlast();
        }
        else {

			$img_slide = $this->input->post('userimage'.$id_slide);

			$fichier = $_SERVER['DOCUMENT_ROOT'].'/bioluxoptical/assets/img/slider/'.$id_slide.'/'.$this->input->post('userimage'.$id_slide);
				if(file_exists($fichier)){unlink($fichier);}

			$img_slide = $this->addImg($id_slide, 'assets/img/slider/'.$id_slide.'/');

			if (strlen($img_slide)!=0) {
				$this->db->where('id_slide', $id_slide)->update('slide', ['img_slide' => $img_slide]);
			}

			$state = $this->M_Header->updPresentationAdm($id_slide);

			if ($state) {
				$this->flashdata_success("Modification de la présentation d'identifiant '".$id_slide."' avec succès");

				redirect('admin/ControlPublic/legal');
			}
			else{
				$this->flashdata_warning("Échec de modification de la présentation");

				$this->load->view('admin/slide/legal', $data);

				$this->loadindlast();

			}
        }

	}

	public function stateSlide($id_slide, $state) {

		$this->M_Header->stateSlide($id_slide, $state);
		$this->flashdata_info("Modification du slide d'identifiant '".$id_slide."' avec succès");
		redirect ('admin/ControlPublic/index');

	} 

	public function StrucDocs() {

		$title = 'Gestion de la présentation du site';
		$sub_title = 'Structuration et documents';
		$manage = 'site';
		$sub_manage = 'Struc_docs';

    	$data['structurationDocs'] = $this->M_Header->structurationDocAdm();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);


		$this->load->view('admin/slide/Struc_docs', $data);

		$this->loadindlast();

	}

	public function updateStrucDoc($id_issue) {

		$title = 'Gestion de la présentation du site';
		$sub_title = 'Structuration et documents';
		$manage = 'site';
		$sub_manage = 'Struc_docs';
    	$data['structurationDocs'] = $this->M_Header->structurationDocAdm();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->library('form_validation');


        $this->form_validation->set_rules('title_rm'.$id_issue, 'Titre ', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('img_issue'.$id_issue, 'Fontawesome ', 'required|min_length[6]|max_length[31]|trim');
        
        $this->form_validation->set_rules('content'.$id_issue, 'Contenu ', 'required|min_length[10]|max_length[872]|trim');

        if ($this->form_validation->run() == false) {

			$this->flashdata_warning("Échec de modification");

			$this->load->view('admin/slide/Struc_docs', $data);

			$this->loadindlast();
        }
        else {

			$title_rm = $this->input->post('title_rm'.$id_issue);

			$img_issue = $this->input->post('img_issue'.$id_issue);

			$content = $this->input->post('content'.$id_issue);

			//var_dump($title_rm, $img_issue, $content); die;

			$state = $this->M_Header->updateStrucDoc($id_issue, $title_rm, $img_issue, $content);

			if ($state) {
				$this->flashdata_success("Modification de la structuration d'identifiant '".$id_issue."' avec succès");

				redirect('admin/ControlPublic/StrucDocs');
			}
			else{
				$this->flashdata_warning("Échec de modification");
				$this->load->view('admin/slide/Struc_docs', $data);

				$this->loadindlast();

			}
        }

	}

	public function addStrucDoc() {

		$title = 'Gestion de la présentation du site';
		$sub_title = 'Structuration et documents';
		$manage = 'site';
		$sub_manage = 'Struc_docs';
    	$data['structurationDocs'] = $this->M_Header->structurationDocAdm();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->library('form_validation');


        $this->form_validation->set_rules('title_rm', 'Titre ', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('img_issue', 'Fontawesome ', 'required|min_length[6]|max_length[31]|trim');
        
        $this->form_validation->set_rules('content', 'Contenu ', 'required|min_length[10]|max_length[872]|trim');

        if ($this->form_validation->run() == false) {
				
			$this->flashdata_warning("Échec d'ajout de la documentation");

			$this->load->view('admin/slide/Struc_docs', $data);

			$this->loadindlast();
        }
        else {

			$title_rm = $this->input->post('title_rm');

			$img_issue = $this->input->post('img_issue');

			$content = $this->input->post('content');

			//var_dump($title_rm, $img_issue, $content); die;

			$state = $this->M_Header->addStrucDoc($title_rm, $img_issue, $content);

			if ($state) {
				
				$this->flashdata_warning("Modification de la structuration d'identifiant '".$id_issue."' avec succès");

				redirect('admin/ControlPublic/StrucDocs');
			}
			else{
				$this->flashdata_warning("Échec d'ajout de la documentation");
				$this->load->view('admin/slide/Struc_docs', $data);

				$this->loadindlast();

			}
        }

	}

	public function stateStrucDoc ($id_issue, $state_msg) {

		$this->M_Header->stateStrucDoc($id_issue, $state_msg);

		$this->flashdata_info("Modification de l'état de la documentation / structuration d'identifiant '".$id_issue."' avec succès");
		redirect ('admin/ControlPublic/StrucDocs');

	}

	public function Contactform($id_issue=null){

		$sub_title = 'Formulaire de réponse';
		$manage = 'manage';
		$sub_manage = 'customer';

		$data['index_com_contact'] = $this->M_Header->comContact();

    	$data['messages'] = $this->M_Header->messageContactAdm();

		$title = 'Actions sur les visiteurs : Contact ';

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$data['this_issue'] = $this->M_Header->issueAdm($id_issue);
		$this->load->view('admin/contactform', $data);

		$this->loadindlast();

	}

	public function Testimonial($id_issue=null){

		$sub_title = 'Gestion des retours clients';
		$manage = 'manage';
		$sub_manage = 'customer';

		$data['index_com_testimony'] = $this->M_Header->comTestimony();

    	$data['Testimonials'] = $this->M_Header->getTestimonialAdm();

		$title = 'Actions sur les visiteurs : Témoignages ';

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$data['this_issue'] = $this->M_Header->issueAdm($id_issue);
		$this->load->view('admin/testimony', $data);

		$this->loadindlast();

	}


	function consultations($id_mag=null){

    	$data['opticians'] = $this->M_Header->getOptician();
    	$data['consultants'] = $this->M_Header->getConsultant();

		if (!is_null($id_mag)) {
			$data['store_shop'] = $this->M_Header->getStoreShop($id_mag);

	    	$sub_title = $data['store_shop']->name;

			$title = 'Liste des consultations du magasin : '.$data['store_shop']->name.'<span style="float:right;">'.$data['store_shop']->phone_ss
			."</span>";

			$data['communications'] = $this->M_Forum->select_all('CONSULTATION', $id_mag);

			$this->loadindfirst($title, null, 'storesShop', $data['store_shop']->name);

			$this->load->view('admin/consultations/list',$data);
		}
		else{

			$title = 'Liste des consultations';

			$data['communications'] = $this->M_Forum->select_all('CONSULTATION');

			$this->loadindfirst($title, '', 'reason', 'consultations');

			$this->load->view('admin/consultations/list',$data);

		}
		$this->loadindlast();
	}

	function stateConsult($id_com, $state){
		$this->M_Forum->activate($this->uri->segment(4), $this->uri->segment(5));
		$this->flashdata_info("Etat de la consultation modifiée avec succès");

		redirect('admin/ControlPublic/consultations');
	}

	
	public function addConsult() {

		//$sub_title = 'Gestion des conseils prodigués sur le site';

    	$data['opticians'] = $this->M_Header->getOptician();
    	$data['consultants'] = $this->M_Header->getConsultant();

    	$data['consults'] = $this->M_Forum->getAllConsult();

		$title = 'Programmation des consultations : ';

		$this->loadindfirst($title, '', 'reason', 'consultations');

        $this->load->view('admin/consultations/add', $data);

		$this->loadindlast();

	}

	public function addThereConsult() {

    	$data['opticians'] = $this->M_Header->getOptician();
    	$data['consultants'] = $this->M_Header->getConsultant();

    	$data['consults'] = $this->M_Forum->getAllConsult();

		$title = 'Programmation des consultations : ';

		$this->loadindfirst($title, '', 'reason', 'consultations');

		foreach ($data['consults']->result_array() as $consult) {
			if ($this->input->post('checked'.$consult['id_com'])) {
		        $this->form_validation->set_rules('id_user'.$consult['id_com'], 'Personnel consultant / opticien ', 'required|min_length[1]|max_length[8]|trim');
		        
		        $this->form_validation->set_rules('date_init_d'.$consult['id_com'], 'Jour/Mois/Année ', 'required|min_length[9]|max_length[10]|trim');
		        
		        $this->form_validation->set_rules('date_init_h'.$consult['id_com'], 'Heure/Minute/Seconde ', 'required|min_length[8]|max_length[9]|trim');
			}
		}

        if ($this->form_validation->run() == false) {
			$this->flashdata_warning("Échec d'enregistrement de la programmation");

	        $this->load->view('admin/consultations/add', $data);

			$this->loadindlast();
        }
        else {

			$state = $this->M_Forum->addThereConsult();

			if ($state) {
				$this->flashdata_success("Enregistrement de la programmation avec succès");

				redirect('admin/ControlPublic/consultations');
			}
			else{				
				$this->flashdata_warning("Échec d'enregistrement de la programmation");

		        $this->load->view('admin/consultations/add', $data);

				$this->loadindlast();
			}
        }

	}

	function inThiscom($id_com){

		$data['forum'] = $this->M_Forum->thisConsult($id_com);

		$data['customer'] = $this->db->where('id_costomer', $data['forum']->subject)->get('customer')->row_object();

		$title = 'Liste des échanges avec : '.$data['customer']->fname_cost.' '.$data['customer']->sname_cost ;

		$data['messages'] = $this->M_Forum->get_issues($id_com);

		$this->loadindfirst($title, '', 'reason', 'consultations');

		$this->load->view('admin/forum/consult_manage',$data);

		$this->loadindlast();
	}

	function deleteMsg($id_issue, $id_com){
		
		$this->M_Forum->deleteMsg($id_issue);
		
		$this->flashdata_info("Message supprimé");

		$this->inThiscom($id_com);
	}

	function send_msg(){

		$id_com = $this->input->post('id_com');
		$data['forum'] = $this->M_Forum->thisConsult($id_com);

		$data['customer'] = $this->db->where('id_costomer', $data['forum']->subject)->get('customer')->row_object();

		$title = 'Liste des échanges avec : '.$data['customer']->fname_cost.' '.$data['customer']->sname_cost ;


		if ($this->form_validation->run()) {

			$content = $this->input->post('content');

			$state = $this->M_Forum->saveMsg($content, $data['forum']->id_com, 'Consult');

			if ($state) {
				
				$this->flashdata_success("Message envoyé");
				
				$this->loadindfirst($title, '', 'reason', 'consultations');

				$data['messages'] = $this->M_Forum->get_issues($id_com);

				$this->load->view('admin/forum/consult_manage',$data);

				$this->loadindlast();
			}
			else{
				$this->flashdata_danger("Échec d'envoi du message");
			
				$this->loadindfirst($title, '', 'reason', 'consultations');

				$data['messages'] = $this->M_Forum->get_issues($id_com);

				$this->load->view('admin/forum/consult_manage',$data);

				$this->loadindlast();
			}
		}
		else {
			$this->flashdata_danger("Échec d'envoi du message");
			$this->loadindfirst($title, '', 'reason', 'consultations');

			$data['messages'] = $this->M_Forum->get_issues($id_com);

			$this->load->view('admin/forum/consult_manage',$data);

			$this->loadindlast();
		}

	}

	public function advise($id_issue=null){

		$sub_title = 'Gestion des conseils prodigués sur le site';
		$manage = 'site';
		$sub_manage = 'advise';

		$data['index_com_advise'] = $this->M_Header->comAdvise();

    	$data['Advises'] = $this->M_Header->getAdviseAdm();

		$title = 'Actions sur les visiteurs : Conseils sur le site';

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$data['this_issue'] = $this->M_Header->issueAdm($id_issue);

		$this->load->view('admin/advise', $data);

		$this->loadindlast();

	}

	public function mesure($id_mes=null){

		$sub_title = 'Gestion des conseils prodigués sur le site';
		$manage = 'site';
		$sub_manage = 'mesure';

		$data['index_com_advise'] = $this->M_Header->comAdvise();

    	$data['Advises'] = $this->M_Header->getAdviseAdm();

		$title = 'Actions sur les visiteurs : Conseils sur le site';

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$data['this_issue'] = $this->M_Header->issueAdm(1);

		$this->load->view('admin/advise', $data);

		$this->loadindlast();

	}

	public function addCouncil() {

		$sub_title = 'Gestion des conseils prodigués sur le site';
		$manage = 'site';
		$sub_manage = 'advise';

		$data['index_com_advise'] = $this->M_Header->comAdvise();

    	$data['Advises'] = $this->M_Header->getAdviseAdm();

		$title = 'Actions sur les visiteurs : Conseils sur le site';

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

        $this->form_validation->set_rules('title_rm', 'Titre ', 'required|min_length[4]|max_length[31]|trim');
        
        $this->form_validation->set_rules('img_issue', 'Fontawesome ', 'required|min_length[6]|max_length[31]|trim');
        
        $this->form_validation->set_rules('content', 'Contenu ', 'required|min_length[10]|max_length[2035]|trim');

        if ($this->form_validation->run() == false) {
			$this->flashdata_danger("Échec d'ajout du conseil");

			$this->load->view('admin/advise', $data);

			$this->loadindlast();
        }
        else {

			$title_rm = $this->input->post('title_rm');

			$img_issue = $this->input->post('img_issue');

			$content = $this->input->post('content');

			$state = $this->M_Header->addCouncil($title_rm, $img_issue, $content);

			if ($state) {
				$this->flashdata_success("Ajout du conseil avec succès");

				redirect('admin/ControlPublic/advise');
			}
			else{
				$this->flashdata_warning("Échec d'ajout du conseil");

				$this->load->view('admin/advise', $data);

				$this->loadindlast();
			}
        }

	}

	public function updAdvisePage() {

		$sub_title = 'Gestion des conseils prodigués sur le site';
		$manage = 'site';
		$sub_manage = 'advise';

		$id_com = $this->input->post('id_com');

		$data['index_com_advise'] = $this->M_Header->comAdvise();

    	$data['Advises'] = $this->M_Header->getAdviseAdm();

		$title = 'Actions sur les visiteurs : Conseils sur le site';

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);
        
        $this->form_validation->set_rules('descrip', 'Fontawesome ', 'required|min_length[6]|max_length[2035]|trim');

        if ($this->form_validation->run()) {

			$state = $this->M_Header->updPresentationAdm($id_com);
			if ($state) {
				$this->flashdata_success("Modification de la présentation d'identifiant '".$id_com."' avec succès");

				redirect('admin/ControlPublic/advise');
			}
			else{
				$this->flashdata_danger("Échec de modification de la présentation");

			$this->load->view('admin/advise', $data);

			$this->loadindlast();

			}
        }
        else {
			$this->flashdata_danger("Échec de modification de la présentation");
			
			$this->load->view('admin/advise', $data);

			$this->loadindlast();
        }
	}
	

	public function updCouncil(){

		$sub_title = 'Gestion des conseils prodigués sur le site';
		$manage = 'site';
		$sub_manage = 'advise';

		$data['index_com_advise'] = $this->M_Header->comAdvise();

    	$data['Advises'] = $this->M_Header->getAdviseAdm();

		$title = 'Actions sur les visiteurs : Conseils sur le site';

		$this->form_validation->set_rules('title_rm', 'Titre du conseil ', 'required|min_length[4]|max_length[89]|trim');

		$this->form_validation->set_rules('img_issue', 'Le Fontawesome du conseil ', 'min_length[4]|max_length[22]|trim');

		$this->form_validation->set_rules('content', 'Contenu du conseil ', 'required|min_length[10]|max_length[2035]|trim');

		//var_dump($this->input->post('id_issue')); die;
		
		if ($this->form_validation->run() == false) {
			$this->flashdata_warning("Échec d'enregistrement");

			$this->loadindfirst($title, $sub_title, $manage, $sub_manage);
			$data['this_issue'] = $this->M_Header->issueAdm($this->input->post('id_issue'));
			
			$this->load->view('admin/advise', $data);

			$this->loadindlast();
        }
        else {
			$state = $this->M_Header->updCouncilAdm($this->input->post('id_issue'), $this->input->post('content'), $this->input->post('title_rm'), $this->input->post('img_issue'));

			if ($state) {
				$this->flashdata_success("Conseil modifié");

				redirect('admin/ControlPublic/advise');
			}
			else{
				$this->flashdata_warning("Échec d'enregistrement");

				$this->loadindfirst($title, $sub_title, $manage, $sub_manage);
				$data['this_issue'] = $this->M_Header->issueAdm($this->input->post('id_issue'));
				
				$this->load->view('admin/advise', $data);

				$this->loadindlast();

			}
        }

	}

	public function stateTestimonial($id_issue, $state_msg){
		($state_msg == -1 or $state_msg ==0) ? $state_msg = 1 : $state_msg = 0;
		$params = array(
		'state_msg' => $state_msg
		);
		$this->db->where('id_issue',$id_issue)-> update('issue',$params);
		
		$this->flashdata_info("Visibilité du témoignage modifiée");

		redirect('admin/ControlPublic/Testimonial');
	}

	public function stateAdvise($id_issue, $state_msg){
		($state_msg == -1 or $state_msg ==0) ? $state_msg = 1 : $state_msg = 0;
		$params = array(
		'state_msg' => $state_msg
		);
		$this->db->where('id_issue',$id_issue)-> update('issue',$params);

		$this->flashdata_info("Visibilité du conseil modifiée");

		redirect('admin/ControlPublic/Advise');
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////Activity()
	public function updTestimonialPage() {

		$id_com = $this->input->post('id_com');

		$sub_title = 'Gestion des retours clients';
		$manage = 'manage';
		$sub_manage = 'customer';

		$data['index_com_testimony'] = $this->M_Header->comTestimony();

    	$data['Testimonials'] = $this->M_Header->getTestimonialAdm();

		$title = 'Actions sur les visiteurs : Témoignages ';

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		//var_dump($this->form_validation->run()); die;
        if ($this->form_validation->run()) {


			$state = $this->M_Header->updPresentationAdm($id_com);
			if ($state) {
				$this->flashdata_success("Modification de la présentation d'identifiant '".$id_com."' avec succès");
				$this->Auth_user->activity('Modification : '.$title, "Succès de réponse - identifiant :'".$id_com);

				redirect('admin/ControlPublic/Testimonial');
			}
			else{
				$this->flashdata_danger("Échec de réponse au client");
				
				$this->Auth_user->activity('Modification : '.$title, "Échec de réponse - identifiant :'".$id_com);

				$this->load->view('admin/testimony', $data);

				$this->loadindlast();

			}
        }
        else {
			$this->flashdata_danger("Échec de réponse au client");
			
			$this->Auth_user->activity('Modification : '.$title, "Échec de réponse - identifiant :'".$id_com);

			$this->load->view('admin/testimony', $data);

			$this->loadindlast();

        }

	}

	public function answer2(){

		$sub_title = 'Formulaire de réponse';
		$manage = 'manage';
		$sub_manage = 'customer';

		$data['index_com_testimony'] = $this->M_Header->comTestimony();

    	$data['Testimonials'] = $this->M_Header->getTestimonialAdm();

		$title = 'Actions sur les visiteurs : Témoignages ';

		$title = 'Actions sur les visiteurs : Contact ';

		$this->form_validation->set_rules('content', 'Contenu du message ', 'required|min_length[10]|max_length[872]|trim');

		if ($this->form_validation->run() == false) {
			$this->flashdata_warning("Échec de réponse");
			$this->Auth_user->activity($title, "Échec de réponse - identifiant :'".$id_issue);

			$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

			$this->load->view('admin/testimony', $data);

			$this->loadindlast();
        }
        else {

			$state = $this->M_Header->answerAdm($this->input->post('id_issue'), $this->input->post('content'));

			if ($state) {
				$this->flashdata_success("Réponse envoyée");
				$this->Auth_user->activity($title, "Succès de réponse - identifiant :'".$id_issue);

				redirect('admin/ControlPublic/Testimonial');
			}
			else{
				$this->flashdata_warning("Échec de réponse");
				$this->Auth_user->activity($title, "Échec de réponse - identifiant :'".$id_issue);

				$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

				$this->load->view('admin/testimony', $data);

				$this->loadindlast();

			}
        }

	}


	public function answer(){

		$sub_title = 'Formulaire de réponse';
		$manage = 'manage';
		$sub_manage = 'customer';

		$data['index_com_contact'] = $this->M_Header->comContact();

		$data['this_issue'] = $this->M_Header->issueAdm($this->input->post('id_issue'));

		$title = 'Actions sur les visiteurs : Contact ';

		$this->form_validation->set_rules('content', 'Contenu du message ', 'required|min_length[10]|max_length[872]|trim');

		if ($this->form_validation->run() == false) {
			
			$this->flashdata_warning("Échec de réponse");
				$this->Auth_user->activity($title, "Échec de réponse - identifiant :'".$id_issue);

			$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

    		$data['messages'] = $this->M_Header->messageContactAdm();
			//var_dump($data['this_issue']); die; $id_issue=null
			$this->load->view('admin/contactform', $data);

			$this->loadindlast();
        }
        else {

			$state = $this->M_Header->answerAdm($this->input->post('id_issue'), $this->input->post('content'));

			if ($state) {
			
				$this->flashdata_success("Réponse envoyée");
				$this->Auth_user->activity($title, "Succès de réponse - identifiant :'".$id_issue);

				redirect('admin/ControlPublic/Contactform');
			}
			else{
			
				$this->flashdata_warning("Échec de réponse");
				$this->Auth_user->activity($title, "Échec de réponse - identifiant :'".$id_issue);

				$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

    			$data['messages'] = $this->M_Header->messageContactAdm();

				$this->load->view('admin/contactform', $data);

				$this->loadindlast();

			}
        }

	}

	public function updContactPage($id_issue) {

		$title = 'Gestion de la présentation du site';
		$sub_title = 'slide ACCUEIL';
		$manage = 'site';
		$sub_manage = 'presentation';

		$data['presentations'] = $this->M_Header->presentationAdm();

		$this->loadindfirst($title, $sub_title, $manage, $sub_manage);

		$this->load->library('form_validation');
        
        $this->form_validation->set_rules('description'.$id_issue, 'Description ', 'required|min_length[10]|max_length[2035]|trim');

        if ($this->form_validation->run() == false) {
			
			$this->flashdata_danger("Échec de modification de la présentation d'identifiant : ".$id_issue);
			$this->Auth_user->activity($title, "Échec de modification - identifiant :'".$id_issue);

			$this->load->view('admin/slide/legal', $data);

			$this->loadindlast();
        }
        else {

			$state = $this->M_Header->updPresentationAdm();

			if ($state) {
				$this->flashdata_success("Modification de la présentation d'identifiant '".$id_issue."' avec succès");
				$this->Auth_user->activity($title, "Succès de modification - identifiant : ".$id_issue);

				redirect('admin/ControlPublic/legal');
			}
			else{
				$this->flashdata_danger("Échec de modification de la présentation d'identifiant '".$id_issue);

				$this->Auth_user->activity($title, "Échec de modification - identifiant : ".$id_issue);

				$this->load->view('admin/slide/legal', $data);

				$this->loadindlast();

			}
        }

	}

	public function addImg($id, $upload_path, $max_size=null, $max_width=null, $max_height=null) {

		if(isset($_FILES["userimage"]['name']) and $_FILES["userimage"]['name']=='') {
			$this->flashdata_info("Aucune image choisie");
			return null;
		}
		elseif (!is_null($_FILES["userimage".$id]['name'])) {
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/bioluxoptical/'.$upload_path;

			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, true);
			}
			$config['allowed_types'] = 'gif|jpg|jpeg|png';

			$config['max_size'] = $max_size;
            $config['max_width'] = $max_width;
            $config['max_height'] = $max_height;
			
			$config['file_name'] = $_FILES["userimage".$id]['name'];

			if (strlen($config['file_name'])==0) {
				$this->flashdata_info("Aucune image choisie | Type de fichier image non reconnu");
				return null;
			}
			
			$this->load->library('upload', $config); //Loads the Uploader Library
			
			$this->upload->initialize($config);

			if (file_exists($config['upload_path'].$config['file_name'])) {
			    return $id.'/'.$config['file_name'];
			}

			if ( ! $this->upload->do_upload('userimage'.$id)) {
				$this->flashdata_info("Aucune image choisie | Type de fichier image non reconnu");
				$error = array('error' => $this->upload->display_errors());

				return $error;
			}

			$data = $this->upload->data(); 

			return $id.'/'.$config['file_name'];
		}
		else { 

			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/bioluxoptical/'.$upload_path;

			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, true);
			}
			
			$config['allowed_types'] = 'gif|jpg|jpeg|png';

			$config['max_size'] = $max_size;
            $config['max_width'] = $max_width;
            $config['max_height'] = $max_height;
			
			$config['file_name'] = $_FILES["userimage"]['name'];
			
			$this->upload->initialize($config);

			if (file_exists($config['upload_path'].$config['file_name'])) {
			    return $id.'/'.$config['file_name'];
			}

			if (!$this->upload->do_upload('userimage')) {
				$error = array('error' => $this->upload->display_errors());
				$this->flashdata_info("Aucune image choisie | Type de fichier image non reconnu");

				return $error;
			}

			$data = $this->upload->data(); 

			return $id.'/'.$config['file_name'];

		}
	}

}

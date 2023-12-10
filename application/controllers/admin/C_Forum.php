<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Forum extends CI_Controller{

	private $title = 'ADM - FORUM | ';
	
	function __construct() {
		parent::__construct();
        $this->load->model('control/Auth_user');

        $this->load->model('public/M_Header');
        $this->load->model('public/M_Account');
        $this->load->model('public/M_Forum');
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

		$title = 'Liste des sujets';
		$this->Auth_user->activity('Consultation : '.$title, 'FORUM');

		$data['communications'] = $this->M_Forum->select_all('FORUM');

		$this->loadindfirst($title, '', 'site', 'forum');

		$this->load->view('admin/forum/list',$data);

		$this->loadindlast();
	}

	function mangeIndex(){

		$id_com = $this->db->select('id_com')->where('pattern', 'FORUM_CONDICION')->get('communicate')->row_object();

		$title = 'Pages du forum et conditions générales des échanges';

		$data['messages'] = $this->M_Forum->get_issues($id_com->id_com);

        $data['forum_page'] = $this->db->where('pattern', 'FORUM_CONDICION')->where('issue.title_rm', 'indexForum')->join('issue', 'issue.id_com=communicate.id_com')->get('communicate')->row_object();

		$this->Auth_user->activity('Consultation : '.$title, 'FORUM');

		$this->loadindfirst($title, '', 'site', 'forum');

		$this->load->view('admin/forum/public_manage',$data);

		$this->loadindlast();
	}

	function updateThiscom($id_com){

		$data['forum'] = $this->M_Forum->thisForum($id_com);

		$title = 'Sujet du forum : '.$data['forum']->subject;

		$data['messages'] = $this->M_Forum->get_issues($id_com);

		$this->loadindfirst($title, '', 'site', 'forum');

		$this->load->view('admin/forum/forum_manage',$data);

		$this->loadindlast();
	}

	function updateSuject(){

		$data['forum'] = $this->M_Forum->thisForum($this->input->post('id_com'));

		$title = 'Sujet du forum : '.$data['forum']->subject;

		$data['messages'] = $this->M_Forum->get_issues($data['forum']->id_com);

		$this->loadindfirst($title, '', 'site', 'forum');

		$this->load->view('admin/forum/forum_manage',$data);

		$this->loadindlast();
	}

	public function send_msg(){

		$data['forum'] = $this->M_Forum->thisForum($this->input->post('id_com'));

		$title = 'Sujet du forum : '.$data['forum']->subject;

		if ($this->form_validation->run()) {

			$content = $this->input->post('content');

			$state = $this->M_Forum->saveMsg($content, $data['forum']->id_com, 'Forum');

			$data['messages'] = $this->M_Forum->get_issues($data['forum']->id_com);

			if ($state) {
				$this->flashdata_success("Envoi du message avec succès");
				$this->Auth_user->activity('Tentatitive d\'envoi du message sur '.$title, 'Succès');
				$this->loadindfirst($title, '', 'site', 'forum');

				$this->load->view('admin/forum/forum_manage',$data);

				$this->loadindlast();
			}
			else{
				$this->flashdata_warning("Échec d'envoi du message");
				$this->Auth_user->activity('Envoi du message sur '.$title, "Échec d'enregistrement");
			
				$this->loadindfirst($title, '', 'site', 'forum');

				$this->load->view('admin/forum/forum_manage',$data);

				$this->loadindlast();
			}
		}
		else {
			$this->flashdata_warning("Échec d'envoi du message");			

			$data['messages'] = $this->M_Forum->get_issues($data['forum']->id_com);

			$this->Auth_user->activity('Envoi du message sur '.$title, 'Échec - Erreur de validation');
			
			$this->loadindfirst($title, '', 'site', 'forum');

			$this->load->view('admin/forum/forum_manage',$data);

			$this->loadindlast();
		}
	}
	
	function addCondition(){

		$id_com = $this->db->select('id_com')->where('pattern', 'FORUM_CONDICION')->get('communicate')->row_object();

		$data['messages'] = $this->M_Forum->get_issues($id_com->id_com);

		$title = 'Pages du forum et conditions générales des échanges';
		if ($this->form_validation->run()) {

			$condition = $this->input->post('condition');

			$id_com = $this->db->select('id_com')->where('pattern', 'FORUM_CONDICION')->get('communicate')->row_object();
			
			$state = $this->M_Forum->saveMsg($condition, $id_com->id_com, 'Condition');

			if ($state) {
				$this->flashdata_success("Ajout de la condition à énumérer avec succès");
				$this->Auth_user->activity('Enregistrement : '.$title, "Succès");
				redirect ('admin/C_Forum/mangeIndex');
			}
			else{
				$this->flashdata_warning("Échec d'ajout de la condition à énumérer");
				
				$this->Auth_user->activity('Enregistrement : '.$title, "Échec");

				$this->loadindfirst($title, '', 'manage', 'forum');

				$this->load->view('admin/forum/public_manage',$data);

				$this->loadindlast();
			}			
		}
		else {
			$this->flashdata_warning("Échec d'ajout de la condition à énumérer");

			$this->Auth_user->activity('Enregistrement : '.$title, 'Échec - Erreur de validation');

			$this->loadindfirst($title, '', 'manage', 'forum');

			$this->load->view('admin/forum/public_manage',$data);

			$this->loadindlast();
		}
	}

	function addCom(){

		$title = "Ajout d'un sujet";

		if ($this->form_validation->run()) {

			$subject = $this->input->post('subject');
			$fisrt_content = $this->input->post('fisrt_content');
			$descrip = $this->input->post('descrip');

			$type_com = $this->db->select('id_com')->where('pattern', 'FORUM')->get('communicate')->row_object();

			$img_com = $this->addImg($type_com->id_com, 'assets/img/communication/'.$type_com->id_com.'/');

			$state = $this->M_Forum->save($subject, $fisrt_content, $descrip, $img_com);

			if ($state) {
				$this->flashdata_success("Ajout du sujet avec succès");
				$this->Auth_user->activity('Enregistrement : Ajout du sujet', "Succès");
				redirect ('admin/C_Forum/index');
			}
			else{
		
				$this->forum('Échec d\'ajout du sujet');
				$this->Auth_user->activity('Enregistrement : '.$title, 'Échec');

			}
			
		}
		else {
		
			$this->forum('Échec d\'ajout du sujet');
			$this->Auth_user->activity('Enregistrement : '.$title, 'Échec - Erreur de validation');
		}
	}

	function forum($flsh_mess=null){

		$title = "Ajout d'un sujet";
				
		!is_null($flsh_mess) ? $this->session->set_flashdata('flsh_mess', $flsh_mess) : $flsh_mess=null;

		$data['error'] = '';
		$this->loadindfirst($title, '', 'manage', 'forum');

		$this->load->view('admin/forum/add',$data);

		$this->loadindlast();

	}

	function updateCondition(){

		$id_com = $this->input->post('id_com');

		$title = 'Pages du forum et conditions générales';

		$data['messages'] = $this->M_Forum->get_issues($id_com);

        $data['forum_page'] = $this->db->where('pattern', 'FORUM_CONDICION')->where('issue.title_rm', 'indexForum')->join('issue', 'issue.id_com=communicate.id_com')->get('communicate')->row_object();
		if ($this->form_validation->run()) {

			$subject = $this->input->post('subject');

			$descrip = $this->input->post('descrip');

			$content = $this->input->post('content');


			$img_gen_cond = $this->addImg($id_com, 'assets/img/communication/'.$id_com.'/');
			
			$state = $this->M_Forum->updateCondition($id_com, $subject, $descrip, $content, $img_gen_cond);

			if ($state) {
				$this->flashdata_success("Modification du texte portant sur les conditions générales à énumérer avec succès");
				$this->Auth_user->activity('Modification : '.$title, "Succès");
				redirect ('admin/C_Forum/mangeIndex');
			}
			else{
				$this->flashdata_warning("Échec de modification du texte portant sur les conditions générales à énumérer");
				$this->Auth_user->activity('Modification : '.$title, "Échec");
				
				$this->loadindfirst($title, '', 'manage', 'forum');

				$this->load->view('admin/forum/public_manage',$data);

				$this->loadindlast();

			}
			
		}
		else {
			$this->flashdata_warning("Échec de modification du texte portant sur les conditions générales à énumérer");
			$this->Auth_user->activity('Modification : '.$title, "Échec - Erreur de validation");

			$this->loadindfirst($title, '', 'manage', 'forum');

			$this->load->view('admin/forum/public_manage',$data);

			$this->loadindlast();
		}
	}
	
	function delete(){
		$id_com = $this->uri->segment(4);
		$comm = $this->db->select('subject')->where('id_com', $id_com)->get('communicate')->row_object();
		$this->M_Forum->delete($id_com);
		$this->flashdata_info("Sujet supprimé ainsi que tous les échanges contenus");
		$this->Auth_user->activity('Suppression communication : '.$comm->subject, "Succès");

		redirect('admin/C_Forum');
	}

	function deleteMsg($id_issue, $id_com){
		
		$this->M_Forum->deleteMsg($id_issue);
		$this->flashdata_info("Message(s) supprimé(s)");
		$this->Auth_user->activity('Suppression message: id_com='.$id_com, "Succès");

		if ($id_com == $this->db->select('id_com')->where('subject', 'CONTACT')->get('communicate')->row_object()->id_com) {			
			redirect('admin/ControlPublic/Contactform');
		}
		$this->updateThiscom($id_com);
	}

	function activate(){
		$this->M_Forum->activate($this->uri->segment(4), $this->uri->segment(5));
		redirect('admin/C_Forum');
	}


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
				$this->flashdata_info("Aucune image choisie | Aucun type de fichier reconnu");
				return null;
			}
			
			$this->load->library('upload', $config); //Loads the Uploader Library
			
			$this->upload->initialize($config);

			if (file_exists($config['upload_path'].$config['file_name'])) {
			    return $id.'/'.$config['file_name'];
			}

			if ( ! $this->upload->do_upload('userimage')) {
				$error = array('error' => $this->upload->display_errors());
				$this->flashdata_info("Aucune image choisie | Aucun type de fichier reconnu");
				//var_dump($this->upload->display_errors());

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
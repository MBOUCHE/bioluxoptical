<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bioluxoptical extends CI_Controller {

	private $title = 'BIOLUX OPTICAL | ';

	public function __construct() {
        parent::__construct();

        $this->load->model('public/M_Header');
        $this->load->model('public/M_Index');
        $this->load->model('public/M_Account');
        $this->load->model('admin/M_Reason');
        $this->load->model('admin/M_Customer');
        $this->load->model('admin/M_Material');
		$this->load->model('customer/M_Order');
		$this->load->model('public/M_Forum');

		$this->load->model('control/Auth_user');

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
    	if(isset($this->session->userdata["auth_user"]) and 
    		($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsAdm()->result_array()[0]['id_role'])) {
			redirect ('admin/ControlPanel');
		}
		elseif(isset($this->session->userdata["auth_user"]) and 
    		($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsMan()->result_array()[0]['id_role'])) {
			redirect ('manager/ControlPanelM');

		}
		elseif (isset($this->session->userdata["auth_user"]) and 
    		($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsAbo()->result_array()[0]['id_role'])) {
			redirect ('customer/CustomerPanel');
		}/*
    	elseif (!isset($this->session->userdata["auth_user"])) {
			redirect ('error403');
		}*/
    }

    public function error404(){

    	$data['error'] = '404';
		$data['title'] = "Oops! La page sollicitée n'existe pas !"; 

		$this->loadindfirst($data['title']);

    	$data['message'] = "La page actuelle indique une indiponibilité, un retrait ou un changement de destination de l'information recherchée.";

		$this->load->view('errors/html/error_404', $data);

		$this->loadindlast();

    }

    public function error403(){

    	$data['error'] = '403';
		$data['title'] = "Identification !"; 

		$this->loadindfirst($data['title']);

    	$data['message'] = "Vous devez créer un compte ou vous connecter pour cette action <br><br>
            <a class='mu-post-btn' href='Bioluxoptical/connection'>Connectez-vous !</a>
            <a class='mu-post-btn' href='Bioluxoptical/createAccount'>Créez un compte !</a>";

		$this->load->view('errors/html/error_404', $data);

		$this->loadindlast();

    }

    public function loadindfirst($title, $presentation=null){

    	//var_dump($_SERVER['SERVER_ADDR']); die;


        $data['forum_page'] = $this->db->where('pattern', 'FORUM_CONDICION')->where('issue.title_rm', 'indexForum')->join('issue', 'issue.id_com=communicate.id_com')->get('communicate')->row_object();
        //var_dump($data['forum_page']); die;

    	$data['categories'] = $this->M_Header->getGlassCat();

    	$data['forum_sujects'] = $this->M_Header->forumSujects();
    	$data['forum_close_sujects'] = $this->M_Header->forumCloseSujects();

    	$data['sub_categories'] = $this->M_Header->getGlassSubCat();

    	$data['Scategories'] = $this->M_Header->getSimpleGlassCat();
    	$data['Ssub_categories'] = $this->M_Header->getSimpleGlassSubCat();

    	$data['storeshops'] = $this->M_Header->getStoreShop();

    	$data['structurationDocs'] = $this->M_Header->structurationDoc();

    	$data['towns'] = $this->M_Header->getTown();

		$data['generic_services'] = $this->M_Index->getGenServices();

		$data['other_services'] = $this->M_Index->getOthServices();
    	$data['opticians'] = $this->M_Header->getOptician();
    	$data['consultants'] = $this->M_Header->getConsultant();

    	$data['title'] = $this->title .= $title;
    	$data['sub_title'] = $title;
    	$data['presentation'] = $presentation;
    	
    	$data['advides'] = $this->M_Header->getAdvice();

    	$data['operators'] = $this->M_Header->getOperators();

    	$data['partners'] = $this->M_Header->getPartners();

    	
		$data['presentations'] = $this->M_Header->presentationAdm();

    	$this->load->view('control/redirect');
		$this->load->view('public/common/head', $data);
		$this->load->view('public/common/scrollToTop');
		$this->load->view('public/common/header');
		$this->load->view('public/common/menu');
		$this->load->view('public/common/search-box');
    }

	public function loadindlast(){
		$this->load->view('public/common/footer');
		$this->load->view('public/common/javascript');
    }
	public function index() {
		
		$data['retour_count'] = $this->M_Index->getNb_visit();

		$data['average_visit'] = $this->M_Header->nb_visit();
		$data['nbr_client'] = $this->M_Header->nbr_client ();
		$data['nb_subjects'] = $this->db->where('pattern', 'FORUM')->where('state', 1)->count_all_results('communicate');
		$data['nb_personals'] = $this->db->where('state=1')->join('users_role', 'users_role.id_user=users.id_user')->count_all_results('users');
    	$data['testimonials'] = $this->M_Header->getTestimonial();

    	$data['slides'] = $this->M_Header->slides();


    	$data['lasts_out'] = $this->M_Header->getLastOut();

		$title = 'Accueil';

		$colors = array('1' => 'green', );

		$this->loadindfirst($title);

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr11.png';

		$this->load->view('public/home/slider',$data);
		$this->load->view('public/home/service');

		$this->load->view('public/index');

		$this->load->view('public/home/opticians');
		$this->load->view('public/home/testimonial');

		$this->loadindlast();

	}

    public function detailsPayment($id_op=null){

    	$title = 'Moyens de paiement';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr01.png';

		$data['id_op'] = $id_op;

		$presentation = "BIOLUX OPTICAL - ";

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/payments');


		$this->loadindlast();

    }

    public function propose($flash_data=null){

    	if (!is_null($flash_data)) {
    		$this->flashdata_warning($flash_data);
    	}
    	$title = 'Forum';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr14.png';

		$presentation = "BIOLUX OPTICAL - Proposotion dun sujet ";

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/view_propose');


		$this->loadindlast();

    }

    public function received_subject($flash_data=null){

    	if (!is_null($flash_data)) {
    		$this->flashdata_info($flash_data);
    	}
    	$title = 'Forum';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr14.png';

		$presentation = "BIOLUX OPTICAL - Proposotion dun sujet ";

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/home/blog');

		/*$this->pagination(base_url().'Bioluxoptical/balances',sizeof($data['promotion_services']->result_array()),4);

		$data['html_pagination'] = $this->pagination->create_links();*/

		$this->loadindlast();

    }

    public function addCom(){
        //$this->is_connect();

        if ($this->form_validation->run()) {

            $subject = $this->input->post('subject');
            $fisrt_content = $this->input->post('fisrt_content');
            $descrip = $this->input->post('descrip');

            $type_com = $this->db->select('id_com')->where('pattern', 'FORUM')->get('communicate')->row_object();

            $state = $this->M_Forum->save($subject, $fisrt_content, $descrip, null);

            if ($state) {
    			$this->flashdata_success("Proposotion du sujet avec succès");
                redirect ('Bioluxoptical/index');
            }
            else{        
                $this->propose('Échec d\'ajout du sujet');

            }
        }
        else {        
            $this->propose('Échec d\'ajout du sujet');
        }
    }

    public function detailsThisPayment(){

    	$title = 'Moyens de paiement';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr01.png';

		
		$data['slices_ages'] = $this->M_Account->getSliceAge();
		$data['countries'] = $this->M_Account->getCountry();


		$data2['storeshops'] = $this->M_Header->getStoreShop(null, $this->db->select('id_country')->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->get('customer')->row_object()->id_country);

		$data['id_op'] = $this->input->post('id_op');

		$presentation = "BIOLUX OPTICAL - ";

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/order', $data2);

		$this->loadindlast();

    }

    public function ThisPayment(){

    	$title = 'Moyens de paiement';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr01.png';

		
		$data['slices_ages'] = $this->M_Account->getSliceAge();
		$data['countries'] = $this->M_Account->getCountry();

		$data2['storeshops'] = $this->M_Header->getStoreShop(null, $this->db->select('id_country')->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->get('customer')->row_object()->id_country);

		$data['id_op'] = $this->input->post('id_op');

		$presentation = "BIOLUX OPTICAL - ";

		if ($this->form_validation->run()) {

			$data = array(
		        'fname_cost' => $this->input->post('fname_cost'),
		        'sname_cost' => $this->input->post('sname_cost'),
		        'profession' => $this->input->post('profession'),
		        'email_cost' => $this->input->post('email'),
		        'phone' => $this->input->post('phone'),
		        'id_country' => $this->input->post('country')
			);

			$this->db->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->update('customer', $data);

			$id_prov = $this->input->post('id_prov');
			$payload = $this->input->post('payload');
			$pay_ref = $this->input->post('pay_ref');
			$id_mag = $this->input->post('id_mag');

			$this->M_Order->updOrder($id_prov, $payload, $pay_ref, $id_mag);
			$this->cart->destroy();
			$this->flashdata_success("Merci pour votre confiance. Veuillez télécharger et conserver le reçu généré par le système.");
            redirect('Bioluxoptical/index');
        }
        else {
			$this->flashdata_warning("Échec de soumission du panier : Veuillez revérifier les informations saisies.");

			$this->loadindfirst($title, $presentation);
			$this->load->view('public/common/breadcrumb', $data);
			$this->load->view('public/order', $data2);


			$this->loadindlast();

        }

    }

	public function contact($subject =null) {

		$title = 'contact';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr07.png';

		$data['subject'] = $subject;

		$data['index_com_contact'] = $this->M_Header->comContact();

		$presentation = "BIOLUX OPTICAL - ";

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/contact');


		$this->loadindlast();
	}

	public function emailNewsLetter(){

		if ($this->input->post('subject') == 'NEWSLETTER') {

			$presentation = "BIOLUX OPTICAL - NEWSLETTER";
			$title = 'Notre boite au lettre pour votre adresse email';

			$data['breadcrumb'] = 'assets/img/breadcrumb/bgr06.png';
			if ($this->form_validation->run()) {

				$message['img_issue'] = 'fa fa-phone';

				$message['title_rm'] =  $this->input->post('subject');

				$message['issuer_id'] = 1;

				$message['content'] = $this->input->post('email');


				$message['id_com'] = $this->db->select('id_com')->from('communicate')->where('subject', 'NEWSLETTER')->get()->row_object()->id_com;
				//var_dump($this->db->where('content', $message['content'])->get('issue')->row_object()); die;

				if (is_null($this->db->where('content', $message['content'])->get('issue')->row_object())) {
					
					$this->db->insert('issue', $message);

					$this->flashdata_success("Nous vous tiendrons informer. Merci pour votre confiance.");
					redirect('Bioluxoptical/index');
				}
				
				$this->flashdata_info("Nous avons bien reçu votre dernière demande. Nous vous tiendrons informer.");

				redirect('Bioluxoptical/index');
			}
			else {
			
				$this->flashdata_info("Échec de validation de l'addresse saisie.");
				$data ['error'] = "<div style='text-align: center; color: red; height: 100px'>Érreur d'envoi !</div>";
				

				$this->loadindfirst($title, $presentation);

				$this->load->view('public/common/breadcrumb', $data);
				$this->load->view('public/newsLetter');


				$this->loadindlast();
			}
			
		}
	}

	public function sendMessage() {

    	if (!isset($this->session->userdata["auth_user"])) {
			redirect ('error403');
		}
		$title = 'Vos remarque, exigences et propositions';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr06.png';

		$data['index_com_contact'] = $this->M_Header->comContact();

		$presentation = "BIOLUX OPTICAL - Contact";

		if ($this->form_validation->run()) {

			
			if ($this->M_Header->sendMessage()) {

				$this->flashdata_info("Merci pour ce mot à notre attention.");
				redirect ('index');
			}
			else {
			
				$data ['error'] = "Érreur d'envoi";				

				$this->loadindfirst($title, $presentation);

				$this->load->view('public/common/breadcrumb', $data);
				$this->load->view('public/contact');


				$this->loadindlast();
			}
		}
		else {
			
			$data ['error'] = "Érreur d'envoi";
			
			$this->loadindfirst($title, $presentation);

			$this->load->view('public/common/breadcrumb', $data);
			$this->load->view('public/contact');


			$this->loadindlast();
		}
	}



	public function send_msg(){
		if(!isset($this->session->userdata["auth_user"])) {
			redirect ('Bioluxoptical/error403');
		}

		$id_com = $this->input->post('id_com');

		$data['communication'] = $this->M_Forum->get_com($id_com)->row_object();

		$data['id_com'] = $id_com;

		$title = 'Forum | '.$data['communication']->subject;

		$data['breadcrumb'] = 'assets/img/consultation10.png';

		$presentation = 'Nous sommes à l\'écoute de nos chers internautes et futurs clients';

		if ($this->form_validation->run()) {

			$content = $this->input->post('content');

			$state = $this->M_Forum->saveMsg($content, $id_com, 'Forum');

			if ($state) {
				redirect ('Bioluxoptical/forum/'.$id_com);
			}
			else{
				
				$this->flashdata_warning("Échec d'envoi du message.");			

				$this->loadindfirst($title, $presentation);

				$this->load->view('public/common/breadcrumb', $data);
				$this->load->view('public/forum2');

				$this->loadindlast();
			}
		}
		else {
				
			$this->flashdata_warning("Échec d'envoi du message.");
			
			$this->loadindfirst($title, $presentation);

			$this->load->view('public/common/breadcrumb', $data);
			$this->load->view('public/forum2');

			$this->loadindlast();
		}
	}

	public function satisfy($id_com){

		$this->db->where('id_com',$id_com)->update('communicate', ['state' => 2]);
		
		$this->flashdata_success("Biolux Opctical à votre service : n'hésitez pas à nous proposer un autre sujet.");
		
		redirect('Bioluxoptical/forum');
	}

	public function listGlass()
	{
		$title = 'Lunettes'; 

		$presentation = 'La paire de votre vue';

		$this->loadindfirst($title, $presentation);
		
    	$data['lasts_out'] = $this->M_Header->getLastOut();


		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr09.png';
		$data['img_pres'] = 'assets/img/promotion.png';
		$data['sub_head'] = 'ARTICLE - '.$title;


		$data['categories'] = $this->db/*->where('article', "LUNETTE")
		      ->or_where('article', "VERRE")
		      ->or_where('article', "MONTURE")*/
		      ->where('state_cat', 1)->get('category');

		$data['reasons'] = $this->db->where('state_reason=1')
		                      
		            ->like('type_reason.name_type', 'VERRE', 'both')

		            ->or_like('type_reason.name_type', 'LUNETTE', 'both')

		            ->or_like('type_reason.name_type', 'MONTURE', 'both')

		            ->join('type_reason', 'reason.type_reason=type_reason.id_type')

		            ->get('reason');

		$this->pagination(base_url().'Bioluxoptical/listGlass',sizeof($data['reasons']->result_array()),4);

		$data['html_pagination'] = $this->pagination->create_links();

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/list_glass');


		$this->loadindlast();

	}

	public function listGlass2($id_cat=null, $label_c_cat=null)
	{
		$title = 'Lunettes'; 

		$presentation = 'La paire de votre vue';

		$data['category'] = $this->M_Header->getCat($id_cat);

		$this->loadindfirst($title, $presentation);

		if (!is_null($id_cat)) {

			$data['reasons'] = $this->M_Reason->getGlasses($id_cat);
			$data['categories'] = $this->M_Header->getGlassSubCat($id_cat);

		$this->pagination(base_url().'Bioluxoptical/listGlass2/'.$id_cat.'/'.$label_c_cat,sizeof($data['reasons']->result_array()),4);

		$data['html_pagination'] = $this->pagination->create_links();

		}
		else{
			$data['reasons'] = $this->M_Reason->getGlasses();
			$data['categories'] = $this->M_Header->getGlassCat();

		}

		$data['label_c_cat'] = $label_c_cat;

	    $data['lasts_out'] = $this->M_Header->getLastOut();

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr09.png';

		$data['vitrine'] = 'assets/img/vitrine/vitrine00.png';

		$data['all_categories'] = $this->M_Header->getSimpleGlassSubCat();

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/list_glass2');


		$this->loadindlast();

	}

	public function listGlassOnly($id_cat=null, $label_c_cat=null)
	{
		$title = 'Verres'; 

		$presentation = 'Les verres correcteur de votre vue';
		$data['category'] = $this->M_Header->getCat($id_cat);

		$this->loadindfirst($title, $presentation);

		if (!is_null($id_cat)) {

			$data['reasons'] = $this->M_Reason->getGlassesOnly($id_cat);
			$data['categories'] = $this->M_Header->getGlassSubCat($id_cat);

			$this->pagination(base_url().'Bioluxoptical/listGlassOnly/'.$id_cat.'/'.$label_c_cat,sizeof($data['reasons']->result_array()),4);

			$data['html_pagination'] = $this->pagination->create_links();
		}
		else{
			$data['reasons'] = $this->M_Reason->getGlassesOnly();
			$data['categories'] = $this->M_Header->getGlassCat();
		}

		$data['label_c_cat'] = $label_c_cat;

	    $data['lasts_out'] = $this->M_Header->getLastOut();

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr09.png';

		$data['vitrine'] = 'assets/img/vitrine/vitrine00.png';

		$data['all_categories'] = $this->M_Header->getSimpleGlassSubCat();

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/list_glass2');


		$this->loadindlast();

	}

	public function getMounts($id_cat=null, $label_c_cat=null)
	{
		$title = 'Montures'; 

		$presentation = 'La paire de votre vue';

		$data['category'] = $this->M_Header->getCat($id_cat);

		$this->loadindfirst($title, $presentation);

		if (!is_null($id_cat)) {

			$data['reasons'] = $this->M_Reason->getMounts($id_cat);
			$data['categories'] = $this->M_Header->getGlassSubCat($id_cat);

			$this->pagination(base_url().'Bioluxoptical/getMounts/'.$id_cat.'/'.$label_c_cat,sizeof($data['reasons']->result_array()),4);

			$data['html_pagination'] = $this->pagination->create_links();

		}
		else{
			$data['reasons'] = $this->M_Reason->getMounts();
			$data['categories'] = $this->M_Header->getGlassCat();

		}

		$data['label_c_cat'] = $label_c_cat;

	    $data['lasts_out'] = $this->M_Header->getLastOut();

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr09.png';

		$data['vitrine'] = 'assets/img/vitrine/vitrine00.png';

		$data['all_categories'] = $this->M_Header->getSimpleGlassSubCat();

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/list_glass2');


		$this->loadindlast();

	}

	public function listStoreShop($id_town = null) {
		$title = 'Magasins';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr07.png';

		$presentation = 'Nous devenons plus proche de vous, dès que vous le souhaitez !';

		$this->loadindfirst($title, $presentation);

		if (!is_null($id_town)) {

			$data['storeshops'] = $this->M_Index->getThisTown($id_town);
		}

		$this->load->view('public/common/breadcrumb',$data);
		$this->load->view('public/list_store_shop');


		$this->loadindlast();

	}

	public function services() {
		$title = 'Services';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr08.png';

		$presentation = 'Chez BIOLUX OPTICAL, trouvez la vue en Luxe qui est due !';

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb',$data);
		$this->load->view('public/list_service');


		$this->loadindlast();

	}

	public function balances() {
		$title = 'Verres';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr13.png';

		$presentation = 'Le prix est fonction de la seule satisfaction du client pour sa santé !';

        $data['promotion_services'] = $this->db->where('price_reason < old_price')
                                       ->where('state_reason', 1)
                                       ->join('category', 'category.id_cat=reason.id_cat_reason')
                                  ->join('type_reason', 'type_reason.id_type=reason.type_reason')
                                  ->get('reason');

		$this->pagination(base_url().'Bioluxoptical/balances',sizeof($data['promotion_services']->result_array()),4);

		$data['html_pagination'] = $this->pagination->create_links();

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb',$data);
		$this->load->view('public/list_balances');


		$this->loadindlast();

	}

	public function advise() {
		$title = 'Conseils';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr03.png';

		$data['index_com_advise'] = $this->M_Header->comAdvise();

		$presentation = 'Chez BIOLUX OPTICAL, trouvez la vue en Luxe qui est due !';

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb',$data);
		$this->load->view('public/list_council');
		$this->load->view('public/home/blog');


		$this->loadindlast();

	}

	public function attempt() {
		$title = 'Essayage';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr00.png';
		$data['img_pres'] = 'assets/img/mesure/presentation.png';
		$data['sub_head'] = 'SERVICE - '.$title;

		$presentation = 'Chez BIOLUX OPTICAL, trouvez la vue en Luxe qui est due !';

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb',$data);
		$this->load->view('public/attempt');

		$this->loadindlast();

	}

	public function detailsShore($id_mag) {

		$data['storeshop'] = $this->M_Index->getThisStoreShope($id_mag)->result_array();

		$data['materials'] = $this->M_Material->select_all($id_mag);

		$data['propositions'] = $this->M_Index->getHisStoreShopeServices($id_mag)->result_array();

		$data['propositions2'] = $this->M_Index->getHisStoreShopeArticle($id_mag)->result_array();
		//var_dump($data['storeshop']); die;
		$title = 'Magasins';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr08.png';


		//$data['reasons'] = $this->M_Reason->getReason();
		
		$presentation = 'Nous devenons plus proche de vous : ! '.$data['storeshop'][0]['description'];

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb',$data);
		$this->load->view('public/this_store_shop');


		$this->loadindlast();
	}

	public function forum($id_com=null) {

		$data['testimonials'] = $this->M_Header->getTestimonial();

		if (!is_null($id_com)) {

			$data['communication'] = $this->M_Forum->get_com($id_com)->row_object();

			$data['issues'] = $this->M_Forum->get_issues($id_com);

			$title = 'Forum';
			//$title = 'Forum | '.$data['communication']->subject;

			$data['breadcrumb'] = 'assets/img/consultation1.png';

			$presentation = 'Nous sommes à l\'écoute de nos chers internautes et futurs clients';

			$this->loadindfirst($title, $presentation);

			$this->load->view('public/common/breadcrumb', $data);
			$this->load->view('public/forum2');


			$this->loadindlast();
		}
		else{

			$title = 'Forum';

			$data['breadcrumb'] = 'assets/img/consultation0.png';

			$id_com = $this->db->select('id_com')->where('pattern', 'FORUM_CONDICION')->get('communicate')->row_object();
			$data['messages'] = $this->M_Forum->get_issues($id_com->id_com);

			$presentation = 'Nous sommes à l\'écoute de nos chers internautes et futurs clients';

			$this->loadindfirst($title, $presentation);

			$this->load->view('public/common/breadcrumb', $data);
			$this->load->view('public/forum');


			$this->loadindlast();
		}

	}


	public function createAccount()
	{
		$title = 'Formulaire de création de compte';

		$data['slices_ages'] = $this->M_Account->getSliceAge();
		$data['countries'] = $this->M_Account->getCountry();

		if ($this->form_validation->run()) {

			$fname_cost = $this->input->post('fname_cost');
			$email = $this->input->post('email');


			$exit = $this->db->where('fname_cost', $fname_cost)->or_where('email_cost', $email)->get('customer')->row_object();

			if ($exit) {
        		$this->Auth_user->activity($title, 'Echec : Compte existant');
        		$this->flashdata_info('Echec de création de compte : Compte existant.');
				redirect('connection');
			}

			$sname_cost = $this->input->post('sname_cost');
			$genre = $this->input->post('genre');
			$id_slice_age = $this->input->post('id_slice_age');
			$profession = $this->input->post('profession');

			$id_country = $this->input->post('country');
			

			$password = sha1(sha1(sha1(sha1($this->input->post('password')))));

			$phone = $this->input->post('phone');

			$upload_path = 'assets/img/customers';

			$max_size = 1024;
            $max_width = 1808;
            $max_height = 1808;
 			
 			$profile_img = $this->addImg3($id_country, 'assets/img/customers/'.$id_country.'/');

			if (!is_null($profile_img) and !is_array($profile_img)) {
				$state = $this->M_Customer->createCustomer($fname_cost, $sname_cost, $genre, $id_slice_age, $profession, $email, $phone, $password, $profile_img, $id_country);

				if ($state) {
					redirect ('index');
				}
				else{
					
					$data ['flsh_mess'] = "Échec de création de compte";
					
					$this->loadindfirst($title);

					$this->load->view('public/create_account', $data);

					$this->loadindlast();
				}
			}
			else{
				
				$data ['flsh_mess'] = "Échec de création de compte";

				$data ['error'] = $profile_img;
				
				$this->loadindfirst($title);

				$this->load->view('public/create_account', $data);

				$this->loadindlast();

			}

			
			
		}
		else {
			
			$data ['flsh_mess'] = "Échec de création de compte";
			
			$this->loadindfirst($title);

			$this->load->view('public/create_account', $data);

			$this->loadindlast();
		}

	}


	public function loginPage()
	{
		$this->is_connect();

		$title = 'Formulaire de connexion';
			
			$this->loadindfirst($title);

			$this->load->view('control/login');
			$this->loadindlast();
	}


	public function connection() {
		$this->is_connect();

		$title = 'Formulaire de connexion';

		$data['validation'] = $this->form_validation->run();
			
		$this->loadindfirst($title);

		$this->load->view('control/login_customer', $data);
		$this->loadindlast();

	}

	public function connexion() {
		
		$this->is_connect();
		
		$title = 'Formulaire de connexion';
		$data['validation'] = $this->form_validation->run();


		if ($this->form_validation->run()) {

			$username = $this->input->post('username');

			$client = $this->input->post('custumer');

			$password = sha1(sha1(sha1(sha1(($this->input->post('password'))))));

			$this->auth_user->login($username , $password);

			$id_admin = $this->M_Account->getIdsAdm();

			$id_user_sess = $this->session->userdata['auth_user']['id_user'];

			$id_current = $this->M_Account->getIdsCurrent($id_user_sess);
			
			if (!is_null($id_current->row_data)) {
				
				$id_current->result_array();

				if ($id_current[0]['id_role'] == $id_admin[0]['id_role']) {

					$this->flashdata_success("Bienvenu ADMINSTRATEUR.");
					redirect ('ControlPanel/index');
				} 
				elseif (!is_null($id_current[0]['id_role'])) { 
					$this->flashdata_success("Bienvenu Manager.");
					redirect ('ControlPanelM/index');
				} 
			}
			else {

				$this->is_connect();

				//$this->stateAccount();
			
				$data ['login_error'] = "Échec de l’authentification";
				
				$this->loadindfirst($title);

				$this->load->view('control/login', $data);
				$this->loadindlast();
			}
		}
		else {

			//$this->stateAccount();
			
			$data ['login_error'] = "Échec de l’authentification";
			
			$this->loadindfirst($title);

			$this->load->view('control/login', $data);
			$this->loadindlast();
		}
	}


    public function forgetPass(){

    	$data['title'] = 'Mot de passe oublié';
		$data['sub_title'] = "Un email avec votre lien de réinitialisation de mot de passe vous sera envoyé, si l'adresse email fournie est enregistrée chez nous."; 

		$this->loadindfirst($data['title']);

		$this->load->view('control/forget_pass', $data);

		$this->loadindlast();

    }

    public function resetPass(){

    	$data['title'] = 'Mot de passe oublié';
		$data['sub_title'] = "Un email avec votre lien de réinitialisation de mot de passe vous sera envoyé, si l'adresse email fournie est enregistrée chez nous."; 

		if ($this->form_validation->run()) {

			$email = $this->input->post('email');
			
			
			if ($this->Auth_user->emailExit($email)) {
				$this->flashdata_success("Un email avec votre lien de réinitialisation de mot de passe vous sera envoyé, si l'adresse email fournie est enregistrée chez nous.");
				redirect ('Bioluxoptical/index');
			}
			else {

				$this->is_connect();

				$this->stateAccount();
			
				$data ['login_error'] = "Revérifier cette adresse EMAIL";
				
				

				$this->loadindfirst($data['title']);

				$this->load->view('control/forget_pass', $data);

				$this->loadindlast();
			}
		}
		else {

			$this->stateAccount();
			
			$data ['login_error'] = "Vérifier cette adresse EMAIL";
						

			$this->loadindfirst($data['title']);

			$this->load->view('control/forget_pass', $data);

			$this->loadindlast();
		}

    }

	/*public function stateAccount(){
		//	var_dump($this->session->userdata["auth_user"]); die;
		//$this->db->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->where('state_paid', -1)->get('order_cart')
		if (isset($this->session->userdata["auth_user"])) {

			$this->session->set_flashdata('flsh_mess', "Compte inactif : Veuillez contacter un ADMINSTRATEUR.");

			redirect('index');
		}
	}*/

	public function stateAccount(){
		redirect('CustomerPanel/stateAccount');
    }

	public function deconnexion () {
		$this->auth_user->logout();

		$this->cart->destroy();
		
		$this->flashdata_success("Vous êtes à présent déconnecté de votre compte. Merci bien pour cette visite.");
		
		redirect ('index');
	}

	function search () {

		$search = $this->input->post('search');

		$data['db_results'] =  $this->M_Header->search($search);

		$this->flashdata_info('Recherche par rapport à : '.$search);

		$title = 'Recherche par rapport à : '.$search;

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr06.png';

		$presentation = "BIOLUX OPTICAL - ";

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/results_search');


		$this->loadindlast();
	}


	public function addImg($part_nameImg, $upload_path, $max_size=null, $max_width=null, $max_height=null) {

		if($_FILES["userimage"]['name']=='') {
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
			
			$config['file_name'] = time().$part_nameImg;

			if (strlen($config['file_name'])==0) {
				return null;
			}
			
			$this->load->library('upload', $config); //Loads the Uploader Library
			
			$this->upload->initialize($config);

			if (file_exists($config['upload_path'].$config['file_name'])) {
			    return $config['file_name'];
			} 

			if (!$this->upload->do_upload('userimage')) {

				//var_dump($this->upload->display_errors()); die;

				$error = array('error' => $this->upload->display_errors());

				return $error;
			}
			
			$data = $this->upload->data(); 

			return $config['file_name'];
		
		}
	}

	public function addImg2($part_nameImg, $upload_path, $max_size=null, $max_width=null, $max_height=null) {

		if($_FILES["userimage"]['name']=='') {
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
			
			$this->load->library('upload', $config); //Loads the Uploader Library
			
			$this->upload->initialize($config);


			if (file_exists($config['upload_path'].$config['file_name'])) {
				
				if(is_null($id)){
					return $config['file_name'];
				}
			    return $id.'/'.$config['file_name'];
			}

			if ( ! $this->upload->do_upload('userimage')) {
				$error = array('error' => $this->upload->display_errors());
				//var_dump($_FILES["userimage"]['name']); die;

				return $error;
			}

			$data = $this->upload->data(); 

				//$extension = substr(strrchr($_FILES["userimage"]['name'], '.') ,1);


			if(is_null($id)){
				return $config['file_name'];
			}

			return $id.'/'.$config['file_name'];

		}
	}

	public function addImg3($id, $upload_path, $max_size=null, $max_width=null, $max_height=null) {

		if($_FILES["userimage"]['name']=='') {
			return null;
		}
		else { 

			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/bioluxoptical/'.$upload_path;

			if (!is_dir($config['upload_path'])) {
				//var_dump(mkdir($config['upload_path']));
				mkdir($config['upload_path'], 0777, true);
			}
			
			$config['allowed_types'] = 'gif|jpg|jpeg|png';

			$config['max_size'] = $max_size;
            $config['max_width'] = $max_width;
            $config['max_height'] = $max_height;
			
			$config['file_name'] = $_FILES["userimage"]['name'];
			
			$this->load->library('upload', $config); //Loads the Uploader Library
			
			$this->upload->initialize($config);


			if (file_exists($config['upload_path'].$config['file_name'])) {
				
				if(is_null($id)){
					return $config['file_name'];
				}
			    return $id.'/'.$config['file_name'];
			}

			if ( ! $this->upload->do_upload('userimage')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error); die;

				return $error;
			}

			$data = $this->upload->data(); 

			if(is_null($id)){
				return $config['file_name'];
			}

			return $id.'/'.$config['file_name'];

		}
	}
	function readMore ($indexed, $other=null) {

		$data['rm_results'] =  $this->M_Header->readMore($indexed, $other);
		
		$title = 'Lire plus sur : '.$data['rm_results'][0]['title_rm'];

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr07.png';

		$presentation = "BIOLUX OPTICAL - ";

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/read_more');
		$this->load->view('public/home/opticians');


		$this->loadindlast();
	}

	function serviceReadMore ($indexed) {

		$data['reason'] =  $this->M_Header->serviceReadMore($indexed);
		
		$title = 'Services';

		$data['breadcrumb'] = 'assets/img/breadcrumb/bgr00.png';

		$presentation = "BIOLUX OPTICAL - ";

		$this->loadindfirst($title, $presentation);

		$this->load->view('public/common/breadcrumb', $data);
		$this->load->view('public/service_read_more');
		$this->load->view('public/home/opticians');


		$this->loadindlast();
	}
	

	public function pagination($base_url, $total_rows, $per_page){

		// Initialisation des paramètres d'utilisation de la pagination
		$config['base_url'] = $base_url;

        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;

        $config['cur_tag_open'] = '<li class="active">
                                      <a href="#">';
        $config['cur_tag_close'] = '  </a>
                                    </li>';

        $config['prev_tag_open'] = '<li>';

        $config['prev_tag_close'] = '</li>';


        $config['next_tag_open'] = '<li>';

        $config['next_tag_close'] = '</li>';


        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li class="active">
                                        <a href="#">1';
        $config['first_tag_close'] = '  </a>
                                    </li>';

        $this->pagination->initialize($config);
	}

}

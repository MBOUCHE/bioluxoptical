<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Header extends CI_Model {

	public function sendMessage(){

		if ($this->input->post('subject') == 'TEMOIGNAGE') {

			$message['img_issue'] = 'fa fa-like';

			$message['title_rm'] =  $this->input->post('subject');

			$message['issuer_id'] = $this->session->userdata['auth_user']['id_user'];

			$message['content'] = $this->input->post('comment');


			$message['id_com'] = $this->db->select('id_com')->from('communicate')->where('subject', 'TEMOIGNAGE')->get()->row_object()->id_com;

			return $this->db->insert('issue', $message);
			
		}

		$message['img_issue'] = 'fa fa-phone';

		$message['title_rm'] =  $this->input->post('author')." | ".$this->input->post('subject');

		$message['issuer_id'] = $this->session->userdata['auth_user']['id_user'];

		$message['content'] = $this->input->post('comment');


		$message['id_com'] = $this->db->select('id_com')->from('communicate')->where('subject', 'CONTACT')->get()->row_object()->id_com;

		return $this->db->insert('issue', $message);
	}

	public function answerAdm($id_issue, $content){

		$message['img_issue'] = $this->session->userdata['auth_user']['id_user'].'-'.$content;
		$message['state_msg'] = 1;

		return $this->db->where('id_issue', $id_issue)->update('issue', $message);
	}

	public function updCouncilAdm($id_issue, $content, $title_rm, $img_issue){

		$message['content'] = $content;

		$message['issuer_id'] = $this->session->userdata['auth_user']['id_user'];

		$message['title_rm'] = $title_rm;

		$message['img_issue'] = $img_issue;

		return $this->db->where('id_issue', $id_issue)->update('issue', $message);
	}

	public function nbr_client () {
		return $this->db->where('state', 1)->count_all_results('customer_role');
	}

	public function nb_visit(){

		//ETAPE 1 - Affichage du nombre de visites d'aujourd'hui
		$data['retour_count'] = $this->db->where('date', date("Y/m/d"))->count_all_results('visites_jour');


		//Oncompte le nombre d'entrées pour aujourd'hui
		$donnees_count = $data['retour_count'];;
		//echo 'Pages vues aujourd\'hui : <strong>';

		// On affiche tout de suite pour pas le retaper 2 fois après
		if ($donnees_count == 0) {

		    $fdate = $this->db->where('date', date("Y/m/d"))->get('visites_jour');

		    $data = array(
		          'visites' => 1,
		          'date' => date("Y/m/d"),
		    );


		    $this->db->insert('visites_jour', $data);

		    //On rentre la date d'aujourd'hui et on marque 1 comme nombre de visites.
		    //$visites = 1;
		    //echo '1'; 

		    //On affiche une visite car c'est la première visite de la journée
		} 
		else { 
		    //Si la date a déjà été enregistrée
		    $retour = $this->db->select('visites')->where('date', date("Y/m/d"))->get('visites_jour')->result_array();  

		    //On sélectionne l'entrée qui correspond à notre date
		    $donnees = $retour;

		    $visites = 0;
		    foreach ($donnees as $donnee) {
		      $visites = $donnee['visites']+1;
		    }

		    //Incrémentation du nombre de visites

		    $data = array(
		          'visites' => $visites
		    );

		    $this->db->where('date', date("Y/m/d"));
		    $this->db->update('visites_jour', $data);

		    //Update dans la base de données
		    //echo $visites; 

		    //Enfin, on affiche le nombre de visites d'aujourd'hui !
	    }
	    //echo '</strong></br/>';

	    //ETAPE 2 - Record des connectés par jour
	    $retour_max = $this->db->select('visites, date')->where('date', date("Y/m/d"))->order_by('visites', 'DESC')->limit(0, 1)->get('visites_jour');

	    //On sélectionne Des statistiques pour votre site ! 5/16 www.openclassrooms.coml'entrée qui a le nombre visite le plus important
	    $donnees_max = $retour_max->result_array();

	    /*foreach ($donnees_max as $key) {
	      echo 'Record : <strong>' . $key['visites'] . '</strong>
	    établi le <strong>' . $key['date'] . '</strong><br/>';
	    }*/ 

	    //On l'affiche ainsi que la date à laquelle le record a été établi
	    //ETAPE 3 - Moyenne du nombre de visites par jour
	    $total_visites = 0; 

	    //Nombre de visites
	    /*(pour éviter les bugs on ne prendra pas le nombre du premier
	    exercice,
	    mais celui-ci reste utile pour être affiché sur toutes les pages
	    car il est plus rapide,
	    contrairement à $total_visites dont on ne se servira que pour la
	    page de stats)*/

	    $total_jours = 0;//Nombre de jours enregistrés dans la base

	    $total_visite = $this->db->select_sum('visites')->get('visites_jour')->result_array();

	    $total_lignes = $this->db->select('visites')->get('visites_jour')->result_array();

	    $total = array();
	    foreach ($total_visite as $key) {
	    	$total_visites += $key['visites'];
	    }

	    foreach ($total_lignes as $key) {
	    	$total_jours +=1;
	    }

	    $moyenne = $total_visites/($total_jours); 

	    //on fait la moyenne
	    //echo 'Moyenne : <strong>' . $moyenne . '</strong> visiteurs par jour<br/>'; // On affiche ! Terminé !!!

		//$this->load->view('public/visiteurs', $data);

	    return $moyenne;

	}

	

	public function getCat($id_cat=null){
		if (!is_null($id_cat)) {
			return $this->db->where('id_cat', $id_cat)->join('users', 'users.id_user=category.id_user')
						->get('category')->row_object();
		}
		return $this->db->join('users', 'users.id_user=category.id_user')
						->get('category');
	}

	public function getSubCat($id_sub_cat=null){
		if (!is_null($id_sub_cat)) {
			return $this->db->where('id_sub_cat', $id_sub_cat)
							->join('users', 'users.id_user=sub_category.id_user')
							->join('category', 'category.id_cat=sub_category.id_cat')
							->get('sub_category')->row_object();
		}
		return $this->db->join('users', 'users.id_user=sub_category.id_user')
							->join('category', 'category.id_cat=sub_category.id_cat')
							->get('sub_category');
	}
    
	public function getGlassCat(){
		return $this->db->where('article', "LUNETTE")->where('state_cat', 1)->get('category');
	}

	public function getAdvice(){
		//$this->db->select('date_issue, issuer_id, img_issue, first_name, second_name, genre, phone, email, content');
		$this->db->select('*');
		$this->db->from('issue');
		$this->db->where('issue.state_msg=1');
		$this->db->where('communicate.pattern', 'CONSEIL');
		$this->db->join('communicate', 'communicate.id_com = issue.id_com');
		$this->db->join('customer', 'customer.id_costomer = issue.issuer_id');
		return $this->db->get();
	}

	public function forumSujects(){
		$this->db->select('*');
		$this->db->from('communicate');
		$this->db->where('pattern', 'FORUM');
		$this->db->where('state', 1);
		return $this->db->get();
	}

	public function comContact(){
		$this->db->select('*');
		$this->db->from('communicate');
		$this->db->where('subject', 'CONTACT');
		$this->db->where('state', 1);
		return $this->db->get()->row_object();
	}

	public function messageContactAdm(){
		$this->db->select('*');
		$this->db->from('issue');
		$this->db->join('communicate', 'communicate.id_com=issue.id_com');
		$this->db->where('subject', 'CONTACT');
		$this->db->where('state', 1);
		return $this->db->get();
	}

	public function issueAdm($id_issue){
		$this->db->where('id_issue', $id_issue)->update('issue', ['state_msg' => 1]);
		return $this->db->where('id_issue', $id_issue)
						->join('customer', 'customer.id_costomer=issue.issuer_id')
						->get('issue')->row_object();
	} 

	public function forumCloseSujects(){
		$this->db->select('*');
		$this->db->from('communicate');
		$this->db->where('pattern', 'FORUM');
		$this->db->where('state', 2);
		//$this->db->where('date_end !=', NULL);
		//$this->db->or_like('state', 2, 'both');
		return $this->db->get();
	}

	public function getOperators(){
		$this->db->select('*');
		$this->db->from('provider');
		$this->db->where('state_prov=1');
		$this->db->where('type_prov.name_type', 'OPERATEUR MONETAIRE');
		$this->db->join('type_prov', 'type_prov.id_type = provider.type_prov');
		return $this->db->get();
	}

	public function getPartners(){
		$this->db->select('*');
		$this->db->from('provider');
		$this->db->where('state_prov=1');
		$this->db->where('type_prov.name_type', 'PARTENAIRE');
		$this->db->join('type_prov', 'type_prov.id_type = provider.type_prov');
		return $this->db->get();
	}

	public function getGlassSubCat($id_cat=null){

		if (!is_null($id_cat)) {
			
			$this->db->select('*')->from('sub_category')->where('sub_category.id_cat', $id_cat)
									->where('state_cat', 1)->where('state_sub_cat', 1)->join('category', 'category.id_cat = sub_category.id_cat');
			return $this->db->get();
		}
		$this->db->select('*');
		$this->db->where('state_cat', 1)->where('state_sub_cat', 1);
		$this->db->from('sub_category');
		$this->db->join('category', 'category.id_cat = sub_category.id_cat');
		return $this->db->get();

	}

	public function getSimpleGlassCat(){
		return $this->db->where('article', "VERRE")->where('state_cat', 1)->get('category');
	}

	public function getOptician(){
		$this->db->select('*')->from('users')->where('users_role.state', 1)
									->where('role.name_role', 'OPTICIEN')
									->where('storeshop.po_box !=', 'TOUT.HORIZON')
									->join('users_role', 'users_role.id_user = users.id_user')
									->join('storeshop', 'storeshop.id_mag = users.id_mag')
									->join('role', 'role.id_role = users_role.id_role');
		return $this->db->get();
	}

	public function getConsultant(){
		$this->db->select('*')->from('users')->where('users_role.state', 1)
									->where('role.name_role', 'OPTICIEN')
									->where('storeshop.po_box', 'TOUT.HORIZON')
									->join('users_role', 'users_role.id_user = users.id_user')
									->join('storeshop', 'storeshop.id_mag = users.id_mag')
									->join('role', 'role.id_role = users_role.id_role');
		return $this->db->get();
	}

	public function comTestimony(){
		$this->db->select('*');
		$this->db->from('communicate');
		$this->db->where('subject', 'TEMOIGNAGE');
		$this->db->where('state', 1);
		return $this->db->get()->row_object();
	}

	public function comAdvise(){
		$this->db->select('*');
		$this->db->from('communicate');
		$this->db->where('subject', 'CONSEIL');
		$this->db->where('state', 1);
		return $this->db->get()->row_object();
	}

	public function getTestimonial(){
		$testimonies = $this->db->select('*')
						->where('communicate.pattern=', 'TEMOIGNAGE')
						->where('state_account=1')
						->where('state_msg=1')
						->join('communicate', 'communicate.id_com = issue.id_com')
						->join('customer', 'customer.id_costomer = issue.issuer_id')
						->get('issue');

		return $testimonies;
	}

	public function getTestimonialAdm(){
		return $this->db->select('*')
						->where('communicate.id_com=', 'TEMOIGNAGE')
						->or_where('communicate.pattern=', 'TEMOIGNAGE')
						->join('communicate', 'communicate.id_com = issue.id_com')
						->join('customer', 'customer.id_costomer = issue.issuer_id')
						->get('issue');
	}

	public function getAdviseAdm(){
		return $this->db->select('*')
						->where('communicate.id_com=', 'CONSEIL')
						->or_where('communicate.pattern=', 'CONSEIL')
						->join('communicate', 'communicate.id_com = issue.id_com')
						->join('customer', 'customer.id_costomer = issue.issuer_id')
						->get('issue');
	}

	public function getUsersRole($id_user){
		return $this->db->where('id_user', $id_user)->where('state', 1)->get('users_role');
	}

	public function getSimpleGlassSubCat(){

		$this->db->select('*');
		$this->db->where('state_cat', 1);
		$this->db->from('sub_category');
		$this->db->join('category', 'category.id_cat = sub_category.id_cat');
		$this->db->where('article', "VERRE");
		$query = $this->db->get();

		return $query;
	}

	public function getStoreShopRegUser(){
		$this->db->select('*');
		$this->db->from('storeshop');
		$this->db->where('state_mag=1');
		$this->db->join('town', 'town.id_town = storeshop.id_town');
		return $this->db->get();
	}

	public function getStoreShop($id_mag=null, $id_country=null){

		if (!is_null($id_mag)) {
			$this->db->select('*');
			$this->db->from('storeshop');
			$this->db->where('id_mag', $id_mag);
			$this->db->join('town', 'town.id_town = storeshop.id_town');
			return $this->db->get()->row_object();
		}

		if (!is_null($id_country)) {
			$this->db->select('*');
			$this->db->from('storeshop');
			$this->db->where('town.id_country', $id_country);
			$this->db->where('state_mag=1');
			$this->db->join('town', 'town.id_town = storeshop.id_town');
			$this->db->join('country', 'country.id_country = town.id_country');
			return $this->db->get();
		}

		if (empty($this->session->userdata['auth_user']['function'])) {
			$this->db->select('*');
			$this->db->from('storeshop');
			$this->db->where('state_mag=1');
			$this->db->join('town', 'town.id_town = storeshop.id_town');
			return $this->db->get();
		}
		elseif ($this->getUsersRole($this->session->userdata['auth_user']['id_user'])) {
			$this->db->select('*');
			$this->db->from('storeshop');
			$this->db->join('town', 'town.id_town = storeshop.id_town');
			return $this->db->get();
		}

	}

	public function getTown(){
		$this->db->select('*');
		$this->db->from('town');
		$this->db->join('country', 'town.id_country = country.id_country');
		$towns = $this->db->get();

		return $towns;
	}

	public function slides(){
		$this->db->select('*');
		$this->db->where('state_slide', 1);
		//$this->db->where('title !=', 'presentation');
		$this->db->from('slide');
		$this->db->join('users', 'users.id_user = slide.id_user');
		return $this->db->get();

	}

	public function slidesAdm(){
		$this->db->select('*');
		$this->db->from('slide');
		$this->db->where('title !=', 'Termes de ventes / Commandes / achats');
		$this->db->join('users', 'users.id_user = slide.id_user');
		return $this->db->get();

	}

	public function presentationAdm(){
		$this->db->select('*');
		$this->db->where('title', 'Termes de ventes / Commandes / achats');
		$this->db->from('slide');
		$this->db->join('users', 'users.id_user = slide.id_user');
		return $this->db->get();
	}

	public function updPresentationAdm($id_slide=null){

		if (!is_null($id_slide)) {

			$this->db->where('id_slide', $id_slide);
			$this->db->update('slide', ['title0' => $this->input->post('title0'.$id_slide), 'description' => $this->input->post('description'.$id_slide)]);
			return true;
		}

		$bool = false;
		$presentations = $this->presentationAdm();

		foreach ($presentations->result_array() as $slide){
			$this->db->where('id_slide', $slide['id_slide']);
			$this->db->update('slide', ['description' => $this->input->post('description'.$slide['id_slide']), 'title' => 'presentation', 'title0' => 'BIOLUX OPTICAL', 'state_slide' => 1]) ? $bool=true : $bool = false;
		}
		return $bool;
	}

	public function search($search){

		$db_results['categories'] = $this->db->select('id_cat, label, article, img_cat, generation')
											->where('state_cat', 1)
											->like('label', $search, 'both')
											->or_like('article', $search, 'both')
											->or_like('generation', $search, 'both')
											->get('category');

		$db_results['sub_categories'] = $this->db->select('id_sub_cat, label_c_cat, img_sub_cat, id_cat')
											->where('state_sub_cat', 1)
											->like('label_c_cat', $search, 'both')
											->get('sub_category');

		$db_results['communications'] = $this->db->select('communicate.id_com, communicate.id_user, img_com, subject, pattern, date_init, id_issue, issue.content, date_end, issue.issuer_id')
											->from('communicate')
											->where('state', 1)
											->where('state_msg', 1)
											->join('issue', 'issue.id_com = communicate.id_com')
											->like('subject', $search, 'both')
											->like('pattern', 'FORUM')
											->or_like('pattern', $search, 'both')
											->or_like('issue.content', $search, 'both')
											->get();

		$db_results['materials'] = $this->db->select('id_mat, name_mat, desc_mat, img_mat')
											->where('state_mat', 1)
											->like('name_mat', $search, 'both')
											->or_like('desc_mat', $search, 'both')
											->get('material');

		$db_results['propositions'] = $this->db->select('id_prop, description_prop, img_prop, duration_prop')
											->like('description_prop', $search, 'both')
											->get('propose');

		$db_results['reasons'] = $this->db->select('id_reason, name_reason, code_reason, price_reason, note_reason, description_reason, origine_reason, img_reason, type_reason')
											->where('state_reason', 1)
											->like('name_reason', $search, 'both')
											->or_like('code_reason', $search, 'both')
											->or_like('price_reason', $search, 'both')
											->or_like('note_reason', $search, 'both')
											->or_like('description_reason', $search, 'both')
											->or_like('origine_reason', $search, 'both')
											->get('reason');

		$db_results['storeshops'] = $this->db->select('id_mag, po_box, description, building_img, storeshop.id_town, town.name_town, country.name_country')
											->where('state_mag', 1)
											->join('town', 'town.id_town = storeshop.id_town')
											->join('country', 'country.id_country = town.id_country')
											->like('po_box', $search, 'both')
											->or_like('description', $search, 'both')
											->or_like('town.name_town', $search, 'both')
											->or_like('country.name_country', $search, 'both')
											->get('storeshop');

		return $db_results;
	}

	public function readMore($indexed, $other =null){

		if ($other == 'slide') {
			$this->db->select('description, last_modification, id_user, title, img_slide, title0');
			$this->db->from('slide');
			$this->db->where('id_slide', $indexed);
			
			$slide = $this->db->get()->result_array();

			return array(0 => array('content' =>$slide[0]['description'], 'date_issue' =>$slide[0]['last_modification'], 'issuer_id' =>$slide[0]['id_user'], 'title_rm' =>$slide[0]['title'], 'img_com' => $slide[0]['img_slide'], 'subject' =>$slide[0]['title0'], 'img_issue' =>$slide[0]['img_slide']));
		}

		$this->db->select('content, date_issue, issuer_id, title_rm, img_issue, communicate.subject, communicate.pattern, communicate.img_com, communicate.id_com');
		$this->db->from('issue');
		$this->db->where('id_issue', $indexed);
		$this->db->join('communicate', 'communicate.id_com=issue.id_com');
		
		return $this->db->get()->result_array();
	}

	public function serviceReadMore($indexed){

		$this->db->select('*');
		$this->db->from('reason');
		$this->db->where('id_reason', $indexed);
		$this->db->join('category', 'category.id_cat=reason.id_cat_reason');
		$this->db->join('sub_category', 'sub_category.id_sub_cat=reason.id_sub_cat');
		
		return $this->db->get()->row_object();
	}

	public function structurationDoc(){

		$this->db->select('id_issue, content, date_issue, communicate.id_com, issuer_id, title_rm, img_issue, communicate.subject, communicate.pattern, communicate.img_com');
		$this->db->from('issue');
		$this->db->join('communicate', 'communicate.id_com=issue.id_com');
		$this->db->where('communicate.pattern', "LIRE");
		$this->db->where('state_msg', 1);
		
		return $this->db->get();
	}

	public function structurationDocAdm(){

		$this->db->select('id_issue, content, date_issue, communicate.id_com, issuer_id, title_rm, img_issue, communicate.subject, communicate.pattern, communicate.img_com, fname_cost, sname_cost, profession, state_msg');
		$this->db->from('issue');
		$this->db->join('communicate', 'communicate.id_com=issue.id_com');
		$this->db->join('customer', 'customer.id_costomer=issue.issuer_id');
		$this->db->where('communicate.pattern', "LIRE");
		
		return $this->db->get();
	}


	public function getLastOut(){

		$this->db->select('id_reason, name_reason, price_reason, old_price, origine_reason, img_reason, img2_reason, note_reason, description_reason, date_manufacturate, date_experation, category.generation, category.article, type_reason.name_type');
		$this->db->from('reason');
		$this->db->where('state_reason', 1);
		$this->db->where('price_reason >', 0);
		$this->db->where('old_price > price_reason');
		$this->db->where('date_manufacturate <= date_experation');
		$this->db->join('category', 'category.id_cat=reason.id_cat_reason');
		$this->db->join('type_reason', 'type_reason.id_type=reason.type_reason');
		
		return $this->db->get();
	}

	public function updateSlide($id_slide, $title0, $title, $description, $img_slide){

		if (!is_null($img_slide)) {
			$params = array(
			'id_user' => $this->session->userdata['auth_user']['id_user'],
			'title0' => $title0,
			'title' => $title,
			'description' => $description,
			'img_slide' => $img_slide,			
			);
		}
		else{
			$params = array(
			'id_user' => $this->session->userdata['auth_user']['id_user'],
			'title0' => $title0,
			'title' => $title,
			'description' => $description,
			);
		}

		return $this->db->where('id_slide',$id_slide)-> update('slide',$params);
	}
	
	public function updateCat($id_cat, $label, $generation, $article, $img_cat){
	
		if (!is_null($img_cat) or sizeof($img_cat) !=0) {
			$params = array(
				'id_user' => $this->session->userdata['auth_user']['id_user'],
				'label' => $label,
				'generation' => $generation,
				'article' => $article,
				'img_cat' => $img_cat,
			);
		}
		else {
			$params = array(
				'id_user' => $this->session->userdata['auth_user']['id_user'],
				'label' => $label,
				'generation' => $generation,
				'article' => $article,
			);
		}
		return $this->db->where('id_cat',$id_cat)-> update('category',$params);
	}

	public function updateSubCat($id_sub_cat, $id_cat, $label_c_cat, $img_sub_cat){

		if (!is_null($img_sub_cat)) {
			$params = array(
				'id_user' => $this->session->userdata['auth_user']['id_user'],
				'label_c_cat' => $label_c_cat,
				'id_cat' => $id_cat,
				'img_sub_cat' => $img_sub_cat,
			);
		}
		else {
			$params = array(
				'id_user' => $this->session->userdata['auth_user']['id_user'],
				'label_c_cat' => $label_c_cat,
				'id_cat' => $id_cat,
			);
		}
		return $this->db->where('id_sub_cat',$id_sub_cat)-> update('sub_category',$params);
	}

	public function addCat($id_cat, $label, $generation, $article, $img_cat){
	
		$params = array(
			'id_user' => $this->session->userdata['auth_user']['id_user'],
			'label' => $label,
			'generation' => $generation,
			'article' => $article,
			'img_cat' => $img_cat,
		);

		return $this->db->insert('category',$params);
	}

	public function addSubCat($id_cat, $label_c_cat, $img_sub_cat){
		
		$params = array(
			'id_user' => $this->session->userdata['auth_user']['id_user'],
			'label_c_cat' => $label_c_cat,
			'id_cat' => $id_cat,
			'img_sub_cat' => $img_sub_cat,
		);

		return $this->db->insert('sub_category',$params);
	}


	public function stateSlide($id_slide, $state_slide){
		($state_slide == -1 or $state_slide ==0) ? $state_slide = 1 : $state_slide = 0;
		$params = array(
		'id_user' => $this->session->userdata['auth_user']['id_user'],
		'state_slide' => $state_slide
		);
		return $this->db->where('id_slide',$id_slide)-> update('slide',$params);
	}

	public function stateCat($id_cat, $state_cat){
		($state_cat == -1 or $state_cat ==0) ? $state_cat = 1 : $state_cat = 0;
		$params = array(
		'id_user' => $this->session->userdata['auth_user']['id_user'],
		'state_cat' => $state_cat
		);
		return $this->db->where('id_cat',$id_cat)-> update('category',$params);
	}

	public function stateSubCat($id_sub_cat, $state_sub_cat){
		($state_sub_cat == -1 or $state_sub_cat ==0) ? $state_sub_cat = 1 : $state_sub_cat = 0;
		$params = array(
		'id_user' => $this->session->userdata['auth_user']['id_user'],
		'state_sub_cat' => $state_sub_cat
		);
		return $this->db->where('id_sub_cat',$id_sub_cat)-> update('sub_category',$params);
	}

	public function updateStrucDoc($id_issue, $title_rm, $img_issue, $content){
		$params = array(
		'issuer_id' => $this->session->userdata['auth_user']['id_user'],
		'title_rm' => $title_rm,
		'content' => $content,
		'img_issue' => $img_issue,
		
		);
		return $this->db->where('id_issue',$id_issue)-> update('issue',$params);
	}

	public function stateStrucDoc($id_issue, $state_msg){
		($state_msg == -1 or $state_msg ==0) ? $state_msg = 1 : $state_msg = 0;
		$params = array(
		//'id_user' => $this->session->userdata['auth_user']['id_user'],
		'state_msg' => $state_msg
		);
		return $this->db->where('id_issue',$id_issue)-> update('issue',$params);
	}

	public function addStrucDoc($title_rm, $img_issue, $content){
		$params = array(
		//'issuer_id' => $this->session->userdata['auth_user']['id_user'],
		'issuer_id' => 1,
		'title_rm' => $title_rm,
		'id_com' => $this->db->select('id_com')->where('pattern', 'LIRE')->get('communicate')->row_object()->id_com,
		'content' => $content,
		'img_issue' => $img_issue,
		
		);
		return $this->db->insert('issue',$params);
	}

	public function addCouncil($title_rm, $img_issue, $content){
		$params = array(
		'issuer_id' => $this->session->userdata['auth_user']['id_user'],
		'title_rm' => $title_rm,
		'id_com' => $this->db->select('id_com')->where('pattern', 'CONSEIL')->get('communicate')->row_object()->id_com,
		'content' => $content,
		'img_issue' => $img_issue,
		
		);
		return $this->db->insert('issue',$params);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerPanel extends CI_Controller {

	private $title = 'ESPACE CLIENT | ';

    public function __construct() {
        parent::__construct();
        $this->load->model('control/Auth_user');
        
        $this->load->model('public/M_Account');
        $this->load->model('admin/M_Reason');
        $this->load->model('public/M_Header');
        $this->load->model('customer/M_Order');
        $this->load->model('control/M_RandomCode');
        $this->load->model('public/M_Forum');
        $this->load->model('admin/M_Customer');
        $this->is_connect();
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
            ($this->session->userdata["auth_user"]['id_role'] == $this->M_Account->getIdsMan()->result_array()[0]['id_role'])){
            redirect ('manager/ControlPanelM');

        }
        elseif(!isset($this->session->userdata["auth_user"])){
            redirect ('Bioluxoptical/connection');

        }
    }

    public function loadindfirst($title, $presentation=null, $active=null, $sub_active=null) {
        $this->is_connect();

        $data['title'] = $this->title .= $title;
        $data['sub_title'] = $title;
        $data['active'] = $active;
        $data['presentation'] = $presentation;

        $data['presentations'] = $this->M_Header->presentationAdm();
        $data['old_orders'] = $this->M_Order->oldOrderCustomer($this->session->userdata['auth_user']['id_user']);
        $data['consultations'] = $this->M_Customer->get_consult($this->session->userdata['auth_user']["id_user"]);

        $data['his_forums'] = $this->M_Forum->hisForums($this->session->userdata['auth_user']["id_user"]);
        //var_dump($data['his_forums']); die;

        $data['operators'] = $this->M_Header->getOperators();
        $data['storeshops'] = $this->M_Header->getStoreShop();

        $this->load->view('control/redirect');
        $this->load->view('customer/common/head',$data);
        $this->load->view('customer/common/header');
        $this->load->view('customer/common/navbar');
    }

    public function loadindlast() {
        $this->load->view('customer/common/javascript');
        $this->load->view('customer/common/footer');
    }
    public function index(){
        $state = $this->db->where('id_user', $this->session->userdata['auth_user']["id_user"])->where('state', 1)->where('id_role', $this->session->userdata['auth_user']["id_role"])->get('customer_role')->row_object();

        if (is_null($state)) {
            $data['code_to_send'] = $this->M_RandomCode->activate_code();
            $this->flashdata_success('Votre compte est encore inactif : Veuillez consulter votre boite Email pour achever votre inscription.');
            
            redirect('customer/CustomerPanel/stateAccount');
        }

        $this->loadindfirst("Panel de gestion :", 'Les différentes gestions', 'dashboard');
        $this->load->view('customer/index');

        $this->loadindlast();
    	
    }

    public function stateAccount(){

        $this->loadindfirst("Acceuil", null, 'dashboard');

        //$this->flashdata_info('Compte en attente d\'activation');
        $this->load->view('customer/blank');

        $this->loadindlast();
    }

    public function checkStateAccount(){

        if ($this->input->post('account')=='refresh') {

            $code = $this->M_RandomCode->activate_code();
            //Envoi du code générer par Email 

            $this->flashdata_success($code); //die();

            redirect('customer/CustomerPanel/stateAccount');
        }
        elseif ($this->input->post('account')=='check') {

            $this->form_validation->set_rules('code', 'Code ', 'required|min_length[14]|max_length[14]|trim');

            if ($this->form_validation->run()) {

                $code = $this->input->post('code');

                $state = $this->M_Customer->checkStateAccount();

                if ($state) {
                    $this->flashdata_success($code);

                    redirect ('customer/CustomerPanel/index');
                }
                else{

                    $this->flashdata_warning("Échec d'activation de compte");
                
                    $this->loadindfirst("Compte en attente d'activation", null, 'dashboard');

                    $this->load->view('customer/blank');

                    $this->loadindlast();
                }
            }

            else {
                $this->flashdata_warning("Échec de reconnaissance du code");
                
                $this->loadindfirst("Compte en attente d'activation", null, 'dashboard');

                $this->load->view('customer/blank');

                $this->loadindlast();
            }
        }
        else {
            redirect ('customer/CustomerPanel/index');
        }
    }

    public function profile(){
        $data['slices_ages'] = $this->M_Account->getSliceAge();
        $data['countries']   = $this->M_Account->getCountry();
        $data['thisCus']     = $this->M_Customer->get_customer($this->session->userdata['auth_user']["id_user"]);
        

        $this->loadindfirst("Gestion du profile", null, 'dashboard');
        $this->load->view('customer/profile', $data);

        $this->loadindlast();
        
    }

    public function personalyzed(){

        $data['countries'] = $this->M_Account->getCountry();

        $data2['storeshops'] = $this->M_Header->getStoreShop(null, $this->db->select('id_country')->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->get('customer')->row_object()->id_country);

        $data['reasons'] = $this->M_Reason->getMounts();
        $data['reasons2'] = $this->M_Reason->getGlassesOnly();
        $data['mesures'] = $this->M_Reason->getMesurePublic();
        $data['categories'] = $this->M_Header->getGlassCat();

        //$this->flashdata_info(" ");

        $this->loadindfirst("Commandes sur-mesures", null, 'personalyzed');
        $this->load->view('customer/personalyzed', $data);

        $this->loadindlast();
        
    }

    public function listPersonalyzed(){

        $data['old_orders'] = $this->M_Order->getAllOrderMagMesure(null, null, $this->session->userdata['auth_user']['id_user']);

        //var_dump($data['old_orders']->result_array()); die;

        //$this->M_Order->oldOrderCustomer($this->session->userdata['auth_user']['id_user']);
        //$this->flashdata_info(" ");

        $this->loadindfirst("Liste de vos commandes sur-mesures effectuées", null, 'personalyzed');
        $this->load->view('customer/old_personalyzed', $data);

        $this->loadindlast();
        
    }

    public function addmesure(){

        $data['countries'] = $this->M_Account->getCountry();

        $data2['storeshops'] = $this->M_Header->getStoreShop(null, $this->db->select('id_country')->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->get('customer')->row_object()->id_country);

        $data['reasons'] = $this->M_Reason->getMounts();
        $data['reasons2'] = $this->M_Reason->getGlassesOnly();
        $data['mesures'] = $this->M_Reason->getMesurePublic();
        $data['categories'] = $this->M_Header->getGlassCat();
        
        $this->form_validation->set_rules('id_reason', 'Choix de la monture ', 'required|min_length[1]|max_length[8]|trim');
        $this->form_validation->set_rules('id_reason2', 'Choix du verre ', 'required|min_length[1]|max_length[8]|trim');

        foreach ($data['mesures']->result_array() as $mesure) {
            $this->form_validation->set_rules($mesure['id_mes'], $mesure['mane_mes'], 'required|min_length[1]|max_length[3]|trim');
        }
        
        $this->form_validation->set_rules('id_mag', 'Point de reception', 'required|numeric|trim|min_length[1]|max_length[4]|is_natural_no_zero');
        
        $this->form_validation->set_rules('fname_cost', 'Nom &nbsp;:', 'required|min_length[4]|max_length[44]|trim');
        
        $this->form_validation->set_rules('sname_cost', 'Prénom &nbsp;:', 'min_length[4]|max_length[44]|trim');

        $this->form_validation->set_rules('profession', 'Profession &nbsp;:', 'min_length[5]|max_length[53]|trim');

        $this->form_validation->set_rules('email', 'Email &nbsp;:', 'required|min_length[10]|max_length[62]|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Téléphone &nbsp;:', 'required|max_length[13]|numeric|trim|exact_length[9]');
        $this->form_validation->set_rules('country', 'Code Pays &nbsp;:', 'required|max_length[13]|numeric|trim|min_length[1]');

        if ($this->form_validation->run()) {

            $mesures = '';
            foreach ($data['mesures']->result_array() as $mesure) {
                $mesures .= $mesure['mane_mes'].'='.$this->input->post($mesure['id_mes']).'; ';
            }

            $id_costomer = $this->session->userdata['auth_user']["id_user"];

            $costomer = $this->db->where('id_costomer', $id_costomer)->get('customer')->row_object();

            $fname_cost = $this->input->post('fname_cost');
            $sname_cost = $this->input->post('sname_cost');
            $profession = $this->input->post('profession');
            $email_cost = $this->input->post('email');
            $phone = $this->input->post('phone');
            $id_country = $this->input->post('country');

            $img_pers = $this->addImg($id_costomer, 'assets/img/customers/personalyzed/'.$id_costomer.'/');

            $this->M_Customer->personalyzed($mesures, $img_pers);

            $this->cart->destroy();

            $state = $this->M_Customer->updateCustomer($id_costomer, $fname_cost, $sname_cost, $costomer->genre, $costomer->id_slice_age, $profession, $email_cost, $phone, $costomer->password, $costomer->profile_img, $id_country);

            if ($state) {

                $this->flashdata_success("Commande personnalisée enregistrée avec succès");
                redirect('customer/CustomerPanel/personalyzed');
            }
            else{
                $this->flashdata_warning('Échec d\'enregistrement de la commande personnalisée');               

                $this->loadindfirst("Commandes sur-mesures", null, 'personalyzed');
                $this->load->view('customer/personalyzed', $data);

                $this->loadindlast();
            }
            
        }
        else {
            $this->flashdata_warning('Échec d\'enregistrement de la commande personnalisée');

            $this->loadindfirst("Commandes sur-mesures", null, 'personalyzed');
            $this->load->view('customer/personalyzed', $data);

            $this->loadindlast();
        }
        
    }

    public function consult($id_com=null){

        if (!is_null($id_com)) {

            $data['consult'] = $this->M_Customer->get_consult($this->session->userdata['auth_user']["id_user"])->row_object();
            $data['issues'] = $this->M_Forum->get_issues($id_com);
            $this->loadindfirst("Consultations du ".date('d/m/Y (H:i:s)', strtotime($data['consult']->date_init)), null, 'consult', $data['consult']->date_init);
            $this->load->view('customer/this_consult', $data);

            $this->loadindlast();
        }
        else{
            $this->loadindfirst("Consultations", null, 'consult');
            $this->load->view('customer/consult');

            $this->loadindlast();

        }        
    }

    public function askConsult(){

        $this->form_validation->set_rules('descrip', 'Description en quelques mots ', 'required|min_length[13]|max_length[255]|trim');
        if ($this->form_validation->run()) {

            $state = $this->M_Customer->askConsult();

            if ($state) {
                
                $this->flashdata_success('Demande d\'une consultation enregistrée avec succès');                

                redirect('customer/CustomerPanel/consult');
            }
            else{
                $this->flashdata_danger('Échec de demande d\'une consultation');                

                $this->loadindfirst("Consultations", null, 'consult');
                $this->load->view('customer/consult');

                $this->loadindlast();
            }
            
        }
        else {
            $this->flashdata_danger('Échec de demande d\'une consultation');                         

            $this->loadindfirst("Consultations", null, 'consult');
            $this->load->view('customer/consult');

            $this->loadindlast();
        }
        
    }

    public function updateCus(){

        $id_costomer = $this->input->post('id_costomer');
        $data['thisCus'] = $this->M_Customer->get_customer($id_costomer);

        $data['slices_ages'] = $this->M_Account->getSliceAge();
        $data['countries'] = $this->M_Account->getCountry();

        $this->loadindfirst("Gestion du profile", null, 'dashboard');

        if ($this->form_validation->run()) {

            $fname_cost = $this->input->post('fname_cost');
            $sname_cost = $this->input->post('sname_cost');
            $genre = $this->input->post('genre');
            $id_slice_age = $this->input->post('id_slice_age');
            $profession = $this->input->post('profession');
            $email_cost = $this->input->post('email_cost');

            $id_country = $this->input->post('country');

            $data['presentations'] = $this->M_Header->presentationAdm();
            
            $password = null;
            if (!strlen($this->input->post('password')==0)) {
                $password = sha1(sha1(sha1(sha1($this->input->post('password')))));
            }

            $phone = $this->input->post('phone');
            
            $profile_img = $this->addImg($id_country, 'assets/img/customers/'.$id_country.'/');

            if (!is_null($profile_img)) {
                $state = $this->M_Customer->updateCustomer($id_costomer, $fname_cost, $sname_cost, $genre, $id_slice_age, $profession, $email_cost, $phone, $password, $profile_img, $id_country);

                if ($state) {
                    $this->flashdata_success('Modification de compte client effectuée avec succès');
                    redirect ('admin/ControlPanel/customer');
                }
                else{
                    
                    $this->flashdata_warning('Échec de modification de compte client');

                    $this->load->view('customer/profile', $data);

                    $this->loadindlast();
                }
            }
            else{
                $state = $this->M_Customer->updateCustomer($id_costomer, $fname_cost, $sname_cost, $genre, $id_slice_age, $profession, $email_cost, $phone, $password, $this->session->userdata['auth_user']["profile_img"], $id_country);

                if ($state) {
                    $this->flashdata_success('Modification de compte client effectuée avec succès');
                    redirect ('admin/ControlPanel/customer');
                }
                else{
                    $this->flashdata_warning('Échec de modification de compte client');

                    $this->load->view('customer/profile', $data);

                    $this->loadindlast();
                }
            }
        }
        else {
            $this->flashdata_warning('Échec de modification de compte client');

            $this->load->view('customer/profile', $data);

            $this->loadindlast();
        }
    }

    public function shoppingCartGlass($id_reason=null){
        if (!is_null($id_reason)) {
            $reason = $this->db->where('id_reason', $id_reason)->get('reason')->row_object();

            $data = array(
            'id'      => $id_reason,
            'qty'     => 1,
            'price'   => $reason->price_reason,
            'name'    => $reason->name_reason,
            'img_reason'    => $reason->img_reason,
            'img2_reason'    => $reason->img2_reason,

            'options' => array(
                'Type' => $this->db->select('name_type')->where('id_type', $reason->type_reason)->get('type_reason')->row_object()->name_type,

                'Origine/Garantie' => $reason->origine_reason,

                'Catégorie' => $this->db->select('label')->where('id_cat', $reason->id_cat_reason)->get('category')->row_object()->label,

                'Sous-Catégorie' => $this->db->select('label_c_cat')->where('id_sub_cat', $reason->id_sub_cat)->get('sub_category')->row_object()->label_c_cat

                )

            );

            $this->cart->insert($data);

            $this->flashdata_info( "Le produit(besoin) '".$reason->name_reason."' de la catégorie '".$this->db->select('label_c_cat')->where('id_sub_cat', $reason->id_sub_cat)->get('sub_category')->row_object()->label_c_cat."' a été ajouter à votre panier.");
            redirect('customer/CustomerPanel/Cart');
        }

        //$this->flashdata_info( "Vous trouvere");
        redirect('customer/CustomerPanel/Cart');
    }

    public function Cart(){
        $data['old_orders'] = $this->M_Order->oldOrderCustomer($this->session->userdata['auth_user']['id_user']);

        $this->loadindfirst("Liste de vos commandes et Achats", sizeof($this->cart->contents()) == 0 ? 'Aucun article choisi' : (sizeof($this->cart->contents()) == 1 ? "1 article choisi" : sizeof($this->cart->contents()).' Articles'), 'shopping');
        $this->load->view('customer/Cart', $data);

        $this->loadindlast();
    }


    public function updateCart(){

        if ($this->cart->total()!=0) {

            if ($this->input->post('cart') == 'acheter') {

                $this->flashdata_info( "Commande enregistrée : veuillez compléter l'achat.");

                $this->M_Order->addOrder(); /////////////////////
                
                redirect("Bioluxoptical/detailsThisPayment");
            }
        }

        $i =1;
        foreach ($this->cart->contents() as $key) {
            $data = array('rowid' => $this->input->post($i.'[rowid]'), 'qty' => $this->input->post($i.'[qty]') ); $i++;
            $this->cart->update($data);
        }

        $data['id_op'] = $this->input->post('id_op');
        $this->loadindfirst("Liste de vos commandes et Achats", sizeof($this->cart->contents()) == 0 ? 'Aucun article choisi' : (sizeof($this->cart->contents()) == 1 ? "1 article choisi" : sizeof($this->cart->contents()).' Articles'), 'shopping');
        $this->load->view('customer/Cart', $data);
 
        $this->loadindlast();        
    }

    public function removeCart($id, $id_reason){

        $reason = $this->db->where('id_reason', $id_reason)->get('reason')->row_object();

        $exit = $this->db->from('order_qty')
                        ->where('id_reason', $id_reason)
                        ->where('id_costomer', $this->session->userdata['auth_user']['id_user'])
                        ->where('state_paid', -1)
                        ->join('order_cart', 'order_cart.id_ord=order_qty.id_order')
                        ->get()->result_array();

        if (!empty($exit)) {
            $this->db->where('id_reason', $id_reason)
            ->where('id_oq', $exit[0]['id_oq'])
            ->delete('order_qty');
        }

        $this->cart->remove($id);

        $this->flashdata_info( "Le produit(besoin) '".$reason->name_reason."' de la catégorie '".$this->db->select('label_c_cat')->where('id_sub_cat', $reason->id_sub_cat)->get('sub_category')->row_object()->label_c_cat."' a été retiré de votre panier.");

        redirect('customer/CustomerPanel/shoppingCartGlass');

    }




    function delOrd($id_ord){
        $order = $this->db->where('id_ord', $id_ord)->get('order_cart')->row_object();

        $this->db->where('id_order', $id_ord)->delete('order_qty');
        $this->db->where('id_ord', $id_ord)->delete('order_cart');
        $this->flashdata_success('Suppresion de la commande de référence '.$order->paid_ref.' de total '.$order->total.' FCFA.');
        $this->Auth_user->activity("Visibilité : '".$order->paid_ref, "COMMANDES");
        redirect('customer/CustomerPanel/Cart');
    }
   

    function deleteConsult(){
        $id_com = $this->uri->segment(4);
        $comm = $this->db->select('subject')->where('id_com', $id_com)->get('communicate')->row_object();
        $this->M_Forum->delete($id_com);
        $this->flashdata_info("Consultation annulée avant programmation");
        $this->Auth_user->activity('Suppression demande consultation : '.$comm->subject, "Succès");

        redirect('customer/CustomerPanel/consult');
    }

    function Actualisation(){
        $id_com = $this->uri->segment(4);
        $this->db->select('subject')->where('id_com', $id_com)->update('communicate', ['date_init' => date('Y-m-d H:i:s')]);
        $this->flashdata_info("Demande d'une consultation : actualisée");
        $this->Auth_user->activity('Actualisation demande consultation : '.$comm->subject, "Succès");

        redirect('customer/CustomerPanel/consult');
    }

    public function addImg($id, $upload_path, $max_size=null, $max_width=null, $max_height=null) {

        if($_FILES["userimage"]['name']=='') {
            return null;
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
            
            if (strlen($config['file_name'])==0) {
                $this->flashdata_info( "Aucune image choisie");
                return null;
            }
            
            $this->load->library('upload', $config); //Loads the Uploader Library
            
            $this->upload->initialize($config);


            if (file_exists($config['upload_path'].$config['file_name'])) {
                
                if(is_null($id)){
                    return $config['file_name'];
                }
                return $id.'/'.$config['file_name'];
            }

            if ( ! $this->upload->do_upload('userimage')) {
                $this->flashdata_info( "Aucune image choisie | Type de fichier inattendu");
                $error = array('error' => $this->upload->display_errors());

                return $error;
            }

            $data = $this->upload->data(); 

            if(is_null($id)){
                return $config['file_name'];
            }

            return $id.'/'.$config['file_name'];
        }
    }
}

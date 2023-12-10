<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdfController extends CI_Controller {
    private $title = 'BIOLUX OPTICAL - GESTION DES DOCUMENTS | ';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('control/Auth_user');
        
    }

    function index(){
    	$this->load->view('control/redirect');
    	
        $html = $this->load->view('GeneratePdfView', [], true);
        //$html = $this->load->view('public/javascript', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

    function receipt($id_ord){
    	$this->load->view('control/redirect');

        $html = $this->load->view('GeneratePdfView', [], true);
        //$html = $this->load->view('public/javascript', [], true);
        $this->pdf->createPDF($html, 'Facture'.date('d_m_Y.H.i.s', time()).($id_ord*2021).'BO', false);    	
    }
}
?>
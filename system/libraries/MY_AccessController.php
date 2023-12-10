<?php
	
	class MY_AccessController extends CI_Controller{
		
		public function __construct(){
		parent::__construct();
		
		$this->load->library('AuthLib'); // AuthLib is your library name
	}
}
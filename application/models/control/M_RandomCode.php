<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_RandomCode extends CI_Model {
                            
	private $quotes = array(
        "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
        "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
        "0","1","2","3","4","5","6","7","8","9"
    );

	public function activate_code(){
	    $code = '';
	    $i = 1;

	    while ($i <= 4) {
	        $code .= random_element($this->quotes);
	        $i++;
	    }
	    $code .='-';
	    $i = 1;

	    while ($i <= 4) {
	        $code .= random_element($this->quotes);
	        $i++;
	    }
	    $code .='-';
	    $i = 1;

	    while ($i <= 4) {
	        $code .= random_element($this->quotes);
	        $i++;
	    }
	    return $code;
	}

}

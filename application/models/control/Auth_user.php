<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_user extends CI_Model {

	protected $username;
	protected $id_user;
	protected $id_mag;
	protected $function;
	protected $profile_img ;
	protected $id_role ;

	public function __construct() {
		parent :: __construct();
		$this->load_from_session();
	}

	public function __get ( $key ) {
		$method_name = 'get_property_'.$key ;
		if (method_exists($this, $method_name)) {
			return $this -> $method_name ();
		} else {
			return parent :: __get ( $key );
		}
	}

	protected function clear_data () {
		$this->id_user = NULL ;
		$this ->username = NULL ;
	}

	protected function clear_session () {
		$this->session->auth_user = NULL ;
	}

	protected function get_property_id () {
		return $this->id_user;
	}

	protected function get_property_is_connected () {
		return $this ->id_user !== NULL ;
	}

	protected function get_property_username () {
		return $this ->username ;
	}

	protected function load_from_session () {
		if ($this->session->auth_user) {
			$this->id_user = $this->session->auth_user['id_user'];
			$this->username = $this ->session->auth_user ['username'];
			$this->id_mag = $this->session->auth_user['id_mag'];
			$this->function = $this ->session->auth_user ['function'];
			$this->profile_img = $this->session->auth_user['profile_img'];
			$this->id_role = $this->session->auth_user['id_role'];
		} else {
			$this->clear_data();
		}
	}

	protected function load_user($username) {

		$personal = $this->db->select('*')
							->from ('users')
							->where ('first_name', $username )
							->or_where ('email', $username )
							->join ('users_role', 'users_role.id_user = users.id_user')
							->get()
							->first_row();


		if ($personal === null) {

			return $this->db->select('*')
							->from ('customer')
							->where ('fname_cost', $username )
							->or_where ('email_cost', $username)
							->join ('customer_role', 'customer_role.id_user = customer.id_costomer')
							->get()
							->first_row();
		}
		return $personal;
	}

	public function login($username, $password) {
		$user = $this->load_user($username);

		if (is_null($user)) {
			$user = $this->db->select('*')
							->from ('users')
							->where ('first_name', $username )
							->or_where ('email', $username )
							->get()
							->first_row();				
		}
		if (is_null($user)) {
			$user = $this->db->select('*')
							->from ('customer')
							->where ('fname_cost', $username )
							->or_where ('email_cost', $username)
							->get()
							->first_row();								
		}

		if (($user !== NULL)) {

			$user_password = isset($user->password) ? $user->password : $user->password_cost;

			if ($password == $user_password) {

				$id_uObject = $this->db->select('users_role.id_role, users.id_user, id_mag, function, profile_img')
											->from ('users')
											->join('users_role', 'users_role.id_user=users.id_user')
											->where ('first_name', $username )
											->get()->result_array();


				if ((sizeof($id_uObject) == 0)) {

					if (isset($user->first_name)) {

						$this->id_user = $user->id_user;
						$this->username = $user->first_name;
						$this->id_mag = $user->id_mag;
						$this->function = $user->function;
						$this->profile_img = $user->profile_img;;
						$this->id_role = 0;
						
						$this->save_session();
					}
					else {

						$id_uObject = $this->db->select('customer_role.id_role, id_costomer, customer.id_user, profession, profile_img')->from ('customer')
												->join('customer_role', 'customer_role.id_user=customer.id_costomer')
												->where ('fname_cost', $username )
												->get()->result_array();

						$this->id_user = $id_uObject[0]['id_costomer'];
						$this->username = $username;
						$this->id_mag = $id_uObject[0]['id_user'];
						$this->function = $id_uObject[0]['profession'];
						$this->profile_img = 'customers/'.$id_uObject[0]['profile_img'];
						$this->id_role = $id_uObject[0]['id_role'];

						$this->save_session();
						$this->restoreCart();

					}
				}

			
				else{

					$this->id_user = $id_uObject[0]['id_user'];
					$this->username = $user->first_name;
					$this->id_mag = $id_uObject[0]['id_mag'];
					$this->function = $id_uObject[0]['function'];
					$this->profile_img = 'personnals/'.$id_uObject[0]['profile_img'];
					$this->id_role = $id_uObject[0]['id_role'];

					$this->save_session();
				}
			}

		}
		else {
			$this-> logout ();
		}
	}

	public function getIp(){
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	      $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	      $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	public function logout() {
		$this->clear_data();
		$this->clear_session();
		$this->activity('Déconnexion', 'Succès');
	}

	protected function save_session() {
		$this->session->auth_user = ['id_user' => $this->id_user,
									 'username' => $this->username,
									 'id_mag' => $this->id_mag,
									 'function' => $this->function,
									 'profile_img' => $this->profile_img,
									 'id_role' => $this->id_role];


		$this->activity('Connexion', 'Succès');
	}

	public function activity($last_activity=" ", $user_data=" "){

		if (isset($this->session->userdata["auth_user"]['id_user'])) {

			$this->db->insert('bo_sessions', 
				['ip_address' => $this->getIp(),

				 'user_agent' => $_SERVER['HTTP_USER_AGENT'],

				 'last_activity' => $last_activity, 

				 'user_data' => $user_data,

				 'id_user' => $this->id_user,
				]);
		}
		else{
			$this->db->insert('bo_sessions', 
				['ip_address' => $this->getIp(),

				 'user_agent' => $_SERVER['HTTP_USER_AGENT'],

				 'last_activity' => $last_activity, 

				 'user_data' => $user_data
				]);
		}
	}

	public function getAllactivities($id_user=null){

		if (!is_null($id_user)) {
			$this->db->where('id_user', $id_user)->get('bo_sessions');
		}
		else{
			$this->db->get('bo_sessions');
		}
	}

	public function emailExit($email) {

		$name = $this->db->select('first_name')->where ('email', $email )->get('users')->first_row();


		if ($name === null) {
			$name = $this->db->select('fname_cost')->where ('email_cost', $email )->get('customer')->first_row();
			
			if ($name === null) {
				return false;
			}

			$first_name = $name->fname_cost;
		}
		else{
			$first_name = $name->first_name;
		}


		$subject = 'Réinitialisation du mot de passe';

		$message = 'biolux@-571s2';
		$this->sendEmail($email, $first_name, $subject, $message);
		return true;
	}

	public function sendEmail($email, $first_name, $subject, $message){
		$biolux = $this->db->select('*')->where('first_name', 'BIOLUXOPTICAL')->get('users')->row_object();
		
		$this->email->from($biolux->email, $biolux->first_name.' '.$biolux->second_name.' - '.$biolux->phone);
		$this->email->to($email, $first_name);
		$this->email->subject($subject);
		$this->email->message($message);

		$sent = $this->email->send();
		
		if(isset($sent)) {
			$this->activity($subject, 'Succès - '.$email.' - '.$first_name);
		}
		else {
			$this->activity($subject, 'Échec - '.$email.' - '.$first_name);
		}
	}

	public function restoreCart(){

		$order = $this->db->where('id_costomer', $this->session->userdata['auth_user']['id_user'])->where('state_paid', -1)->get('order_cart')->row_object();

		if (!is_null($order)) {
			$i =0; $k =0;
			$c0 = ''; $c1 = ''; 

			$p = array();
			$q = array();
			$size = strlen($order->reasons);

			while ($i < $size) {
				$c0 .= $order->reasons[$i];

				if ($order->reasons[$i+1] == '(') {
					array_push($p, $c0);
					$c0 = ''; 

					while ($order->reasons[$i] != ')') {
						$c1 .= $order->reasons[$i];
						$i++;
					}
					array_push($q, $c1);
					$c1 = '';
				}
				
				$i++; 

				var_dump($p, $q); die;
			}
		}
	}
}

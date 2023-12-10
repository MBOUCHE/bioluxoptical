<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Personal extends CI_Model {

	public function getPersonal(){
		return $this->db->select('*')
						->where('age >', 0)->where('users_role.state', 1)
						->join('users_role', 'users_role.id_user = users.id_user')
						->join('role', 'role.id_role = users_role.id_role')
						->from('users')
						->get();
	}

	public function getThisPersonal($id_user){
		return $this->db->select('*')
						->from('users')->where('users.id_user', $id_user)
						->join('users_role', 'users_role.id_user = users.id_user')
						->join('role', 'role.id_role = users_role.id_role')
						->get()->row_object();
	}

	public function getPersonals($id_mag=null){

		if (!is_null($id_mag)) {
			return $this->db->select('*')
						->where('age >', 0)->where('id_mag', $id_mag)
						->join('users_role', 'users_role.id_user = users.id_user')
						->join('role', 'role.id_role = users_role.id_role')
						->from('users')
						->get();
		}

		return $this->db->select('*')
						->where('age >', 0)
						->join('users_role', 'users_role.id_user = users.id_user')
						->join('role', 'role.id_role = users_role.id_role')
						->from('users')
						->get();
	}

	public function changeState($id_user, $state, $id_role) {
		if ($this->db->where('id_user', $id_user)->where('id_role', $id_role)->get('users_role')->result_array()[0]['state']=='1') {
			return $this->db->where('id_user', $id_user)->where('id_role', $id_role)->set('state', '0')->update('users_role');
		}
		return $this->db->where('id_user', $id_user)->where('id_role', $id_role)->set('state', '1')->update('users_role');
	}

	public function getManagers(){
		$id_manager = $this->db->select('id_role')
						->from('role')->where('role.name_role', 'MANAGER')->get()->row_object()->id_role;

		
		return $this->db->select('users.id_user, first_name, second_name, id_mag')
						->from('users')->where('users_role.id_role', $id_manager)->where('users_role.state', 1)
						->join('users_role', 'users_role.id_user = users.id_user')
						->join('role', 'role.id_role = users_role.id_role')->get();
	}

	public function getTypeProv(){

		
		return $this->db->select('id_type, name_type, img_type')
						->from('type_prov')->where('state', 1)->get();
	}

	public function addPersonal($first_name, $second_name, $reg_number, $age, $working_time1, $working_time2, $genre, $phone, $email, $diploma, $years_exp, $function, $password, $id_mag, $profile_img, $id_role){
		$data = array(
			'first_name' => $first_name,
			'second_name' => $second_name,
			'reg_number' => $reg_number,
			'age' => $age,
			'working_time1' => $working_time1,
			'working_time2' => $working_time2,
			'genre' => $genre,
			'phone' => $phone,
			'email' => $email,
			'diploma' => $diploma,
			'years_exp' => $years_exp,
			'function' => $function,
			'password' => $password,
			'id_mag' => $id_mag,
			'profile_img' => $profile_img
		);
		$this->db->insert('users', $data);

		$id_user = $this->db->select('id_user')->where('first_name', $first_name)->where('second_name', $second_name)->where('id_mag', $id_mag)->where('email', $email)->get('users')->row_object()->id_user;
		return $this->db->insert('users_role',  ['id_role' => $id_role, 'id_user' => $id_user]);
	}

	public function updPersonal($first_name, $second_name, $reg_number, $age, $working_time1, $working_time2, $genre, $phone, $email, $diploma, $years_exp, $function, $password, $id_mag, $profile_img, $id_role, $id_user){

		if (!is_null($password)) {

			if (!is_null($profile_img)) {
				$data = array(
					'first_name' => $first_name,
					'second_name' => $second_name,
					'reg_number' => $reg_number,
					'age' => $age,
					'working_time1' => $working_time1,
					'working_time2' => $working_time2,
					'genre' => $genre,
					'phone' => $phone,
					'email' => $email,
					'diploma' => $diploma,
					'years_exp' => $years_exp,
					'function' => $function,
					'password' => $password,
					'id_mag' => $id_mag,
					'profile_img' => $profile_img
				);
			}
			else{
				$data = array(
					'first_name' => $first_name,
					'second_name' => $second_name,
					'reg_number' => $reg_number,
					'age' => $age,
					'working_time1' => $working_time1,
					'working_time2' => $working_time2,
					'genre' => $genre,
					'phone' => $phone,
					'email' => $email,
					'diploma' => $diploma,
					'years_exp' => $years_exp,
					'function' => $function,
					'password' => $password,
					'id_mag' => $id_mag,
				);

			}
		}
		else{

			if (!is_null($profile_img)) {
				$data = array(
					'first_name' => $first_name,
					'second_name' => $second_name,
					'reg_number' => $reg_number,
					'age' => $age,
					'working_time1' => $working_time1,
					'working_time2' => $working_time2,
					'genre' => $genre,
					'phone' => $phone,
					'email' => $email,
					'diploma' => $diploma,
					'years_exp' => $years_exp,
					'function' => $function,
					'id_mag' => $id_mag,
					'profile_img' => $profile_img
				);
			}
			else{
				$data = array(
					'first_name' => $first_name,
					'second_name' => $second_name,
					'reg_number' => $reg_number,
					'age' => $age,
					'working_time1' => $working_time1,
					'working_time2' => $working_time2,
					'genre' => $genre,
					'phone' => $phone,
					'email' => $email,
					'diploma' => $diploma,
					'years_exp' => $years_exp,
					'function' => $function,
					'id_mag' => $id_mag,
				);

			}
		}

		
		return $this->db->where('id_user', $id_user)->update('users', $data);;
	}

	/*public function getPresonalRole(){
		$this->db->select('*');
		$this->db->from('personal');
		$this->db->join('users_role', 'users_role.id_country = personal.id_country');
		$towns = $this->db->get();

		return $towns;
	}*/



	public function affectPersonal($id_mag, $id_user, $id_role, $function){
		$data = array(
			'id_mag' => $id_mag,
			'function' => $function
		);

		$data1 = array(
			'id_role' => $id_role,
		);

		$this->db->where('id_user', $id_user)->where('id_role', $id_role)->update('users_role', $data1);
		return $this->db->where('id_user', $id_user)->update('users', $data);
	}


	public function delPersonal($id_user) {
		$this->db->where('id_user', $id_user)->delete('users_role');
		$this->db->where('id_user', $id_user)->delete('users');
	}
}
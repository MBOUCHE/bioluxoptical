<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Forum extends CI_Model{
	// return all data provider
	function select_all($pattern, $id_mag=null){

		if (!is_null($id_mag)) {
			return $this->db->where('pattern', $pattern)
							->where('id_mag', $id_mag)->join('users', 'users.id_user=communicate.id_user')
							//->join('issue', 'issue.id_com=communicate.id_com')
							->get('communicate');
		}
		return $this->db->where('pattern', $pattern)
						//->join('issue', 'issue.id_com=communicate.id_com')
						->get('communicate');
	}
	// return one provider
	function get_com($id_com){
		$this->db->where('id_com',$id_com);
		return $this->db->get('communicate');
	}

	function getAllConsult(){
		$this->db->where('pattern', 'CONSULTATION')->where('id_user', null);
		return $this->db->get('communicate');
	}

	function thisForum($id_com){
		return $this->db->where('communicate.id_com', $id_com)
						->where('title_rm', 'indexForum')
						->join('issue', 'issue.id_com=communicate.id_com')
						->get('communicate')->row_object();
	}

	function thisConsult($id_com){
		return $this->db->where('communicate.id_com', $id_com)
						//->join('issue', 'issue.id_com=communicate.id_com')
						->get('communicate')->row_object();
	}

	function addThereConsult(){
		$ids_com = $this->db->select('id_com')->where('pattern', 'CONSULTATION')->where('id_user', null)->get('communicate');
		$checked = false;
		foreach ($ids_com->result_array() as $consult) {
			if ($this->input->post('checked'.$consult['id_com'])) {

				$id_user = $this->input->post('id_user'.$consult['id_com']);

				$date_init_d = $this->input->post('date_init_d'.$consult['id_com']);

				$date_init_h = $this->input->post('date_init_h'.$consult['id_com']);

				$params = array(
					'date_init' => $date_init_d.' '.$date_init_h,
					'id_user' => $id_user,
					'state' => 0,
				);

				$checked = $this->db->where('id_com', $consult['id_com'])->update('communicate', $params);
				if (!$checked) {
					return false;
				}
			}
		}
		return $checked;
	}
	
	function get_issues($id_com){
		$this->db->where('id_com', $id_com)->where('title_rm !=','indexForum');
		return $this->db->get('issue');
	}
	// store new provider to database
	function save($subject, $fisrt_content, $descrip, $img_com){

		if (!is_null($img_com)) {
			$id_user = $this->session->userdata['auth_user']['id_user'];
		}
		else{
			$id_user = 1;
			$img_com = '0/defaultImgCom.png';
		}

		$datestring = '%Y-%m-%d %H:%i:%s';
		$time = time();
		$date_init = mdate($datestring, $time);
		$params = array(
			'subject' => $subject,
			'img_com' => $img_com,
			'descrip' => $descrip,
			'pattern' => 'FORUM',
			'date_init' => $date_init,
			'id_user' => $id_user,
		);

		$this->db->insert('communicate', $params);

		$id_com = $this->db->select('id_com')->from('communicate')->where('date_init', $date_init)->where('pattern', 'FORUM')->get()->row_object();
		
		$params2 = array(
			'content' => $fisrt_content,
			'issuer_id' => $this->session->userdata['auth_user']['id_user'],
			'title_rm' => 'indexForum',
			'date_issue' => $date_init,
			'id_com' => $id_com->id_com,
			'state_msg' => 1,
			'img_issue' => $img_com
		);

		return $this->db->insert('issue', $params2);
	}

	function saveMsg($content, $id_com, $title_rm){
		
		$datestring = '%Y-%m-%d %H:%i:%s';
		$time = time();
		$date_issue = mdate($datestring, $time);

		if (!isset($this->session->userdata['auth_user']['id_user'])) {
			redirect('connection');
		}
		$params2 = array(
			'content' => $content,
			'issuer_id' => $this->session->userdata['auth_user']['id_user'],
			'title_rm' => $title_rm,
			'date_issue' => $date_issue,
			'id_com' => $id_com,
			'state_msg' => 1,
			'img_issue' => 'fa fa-users'
		);
		//var_dump($params2); die; 
		return $this->db->insert('issue', $params2);
	}


	// update data provider
	function update($id_prov, $name_prov, $social_reason, $contact, $code_number, $description, $termes, $id_user, $type_prov, $date_reg_prov, $img_logo){

		if (!is_null($img_logo)) {
			$params = array(
			'name_prov' => $name_prov,
			'social_reason' => $social_reason,
			'description' => $description,
			'code_number' => $code_number,
			'id_user' => $id_user,
			'termes' => $termes,
			'contact' => $contact,
			'type_prov' => $type_prov
			);
		}
		else{
			$params = array(
			'name_prov' => $name_prov,
			'social_reason' => $social_reason,
			'img_logo' => $img_logo,
			'description' => $description,
			'code_number' => $code_number,
			'id_user' => $id_user,
			'termes' => $termes,
			'contact' => $contact,
			'type_prov' => $type_prov
			);
		}
		//var_dump($params, $id_com); die;
		return $this->db->where('id_prov', $id_prov)->update('provider', $params);
	}

	function updateCondition($id_com, $subject, $descrip, $content, $img_gen_cond){

		if (!is_null($img_gen_cond)) {
			$params = array(
				'id_com' => $id_com,
				'subject' => $subject,
				'descrip' => $descrip,
				'id_user' => $this->session->userdata['auth_user']['id_user'],
				'img_com' => $img_gen_cond,
			);
		}
		else{
			$params = array(
				'id_com' => $id_com,
				'subject' => $subject,
				'descrip' => $descrip,
				'id_user' => $this->session->userdata['auth_user']['id_user'],
			);
		}
		//var_dump($params); die;
		$params2 = array(
			'content' => $content,
			'issuer_id' => $this->session->userdata['auth_user']['id_user']
		);
		return ($this->db->where('id_com', $id_com)->update('communicate', $params) and $this->db->where('id_com', $id_com)->where('title_rm', 'indexForum')->update('issue', $params2));

	}
	// delete provider record
	function delete($id_com){
		$this->db->where('id_com',$id_com)->delete('issue');
		$this->db->where('id_com',$id_com)->delete('communicate');
	}

	function deleteMsg($id_issue){
		$this->db->where('id_issue',$id_issue)->delete('issue');
	}


	// update data provider
	function activate($id_com, $state){

		$this->flashdata_info("Etat de la communication modifié");
		if ($state == 1) {
			
			$params = array('state' => 0, 'date_end' => null);
		}
		else{
			$params = array('state' => 1, 'date_end' => date('Y-m-d H:i:s', time()));
		}
		$communication = $this->db->select('')->where('id_com', $id_com)->get('communicate')->row_object();
		$this->session->set_flashdata('flsh_mess', "Etat modifié pour la communication '".$communication->subject.' du '.date('d/m/Y H:i:s')."'");

		$this->db->where('id_com', $id_com)->update('communicate', $params);
	}

	function hisForums($id_user){

        $issues_on_coms = $this->db->select('communicate.id_com, subject')->where('issuer_id', $id_user)->where('pattern', 'FORUM')->where('state', 1)->join('issue', 'issue.id_com=communicate.id_com')->order_by('id_com', 'DESC')->get('communicate')->result_array();

        if (sizeof($issues_on_coms)>0) {

	        $forums = array();

	        //var_dump($issues_on_coms); die;
	        
	        array_push($forums, $issues_on_coms[0]);
	        
	        for ($i=0; $i < sizeof($issues_on_coms); $i++) { 

	    		if ($this->appart($forums, $issues_on_coms[$i]['id_com'])) {
	    			array_push($forums, $issues_on_coms[$i]);
	    		}
	        }
				//var_dump($forums); die;
	        return $forums ;
        }
        else{
        	return null;
        }
	}

	function appart($tab = array(), $id){
		$appart=false;
		$i=0;
		while ($i < sizeof($tab) and $appart==false) {
			if ($tab[$i]['id_com'] == $id) {
				$appart = true;
			}
			$i++;
		}
		return $appart;
	}
}
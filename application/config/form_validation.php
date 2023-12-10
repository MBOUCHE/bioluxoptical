<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array (
	'Bioluxoptical/connexion' => array (
		array(
			'field' => 'username',
			'label' => 'Nom d’utilisateur &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[53]|trim',
		),
		array(
			'field' => 'password',
			'label' => 'Mot de passe &nbsp;:',
			'rules' => 'required|min_length[8]|max_length[17]|trim',
		)
	),

	'Bioluxoptical/emailNewsLetter' => array (
		array(
			'field' => 'email',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[53]|trim|valid_email',
		)
	),

	'Bioluxoptical/resetPass' => array (
		array(
			'field' => 'email',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[53]|trim|valid_email',
		),
	),

	'Bioluxoptical/emailNewsLetter' => array (
		array(
			'field' => 'email',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[53]|trim|valid_email',
		)
	),

	'Bioluxoptical/sendMessage' => array (
		array(
			'field' => 'author',
			'label' => 'Nom ou Prénom &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[62]|trim',
		),
		array(
			'field' => 'email',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[53]|trim|valid_email',
		),
		array(
			'field' => 'subject',
			'label' => 'Sujet de message &nbsp;:',
			'rules' => 'required|min_length[5]|trim',
		),
		array(
			'field' => 'comment',
			'label' => 'Contenu du message &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[512]|trim',
		)
	),

	'Bioluxoptical/send_msg' => array (
		array(
			'field' => 'content',
			'label' => 'Contenu du message &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[512]|trim',
		)
	),

	'admin/ControlPublic/send_msg' => array (
		array(
			'field' => 'content',
			'label' => 'Contenu du message &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[512]|trim',
		)
	),

	'admin/C_Forum/send_msg' => array (
		array(
			'field' => 'content',
			'label' => 'Contenu du message &nbsp;:',
			'rules' => 'required|min_length[17]|max_length[121]|trim',
		)
	),

	'admin/C_Forum/addCondition' => array (
		array(
			'field' => 'condition',
			'label' => 'Condition énumérée &nbsp;:',
			'rules' => 'required|min_length[17]|max_length[121]|trim',
		)
	),

	'admin/C_Forum/updateCondition' => array (
		array(
			'field' => 'subject',
			'label' => 'Sujet de la page &nbsp;:',
			'rules' => 'required|min_length[13]|max_length[121]|trim',
		),
		array(
			'field' => 'descrip',
			'label' => 'Description de l\'attribution &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[512]|trim',
		),
		array(
			'field' => 'content',
			'label' => 'Description &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[989]|trim',
		)
	),

	'Bioluxoptical/ThisPayment' => array (
		array(
			'field' => 'fname_cost',
			'label' => 'Nom &nbsp;:',
			'rules' => 'required|min_length[4]|max_length[44]|trim',
		),
		array(
			'field' => 'sname_cost',
			'label' => 'Prénom &nbsp;:',
			'rules' => 'min_length[4]|max_length[44]|trim',
		),
		array(
			'field' => 'profession',
			'label' => 'Profession &nbsp;:',
			'rules' => 'min_length[5]|max_length[53]|trim',
		),
		array(
			'field' => 'id_prov',
			'label' => 'Opérateur/ moyen de paiement &nbsp;:',
			'rules' => 'required|min_length[1]|max_length[4]|trim|is_natural_no_zero|numeric',
		),
		
		array(
			'field' => 'payload',
			'label' => 'Numéro de Téléphone ou Numéro de Compte ayant servi pour le paiement &nbsp;:',
			'rules' => 'required|min_length[8]|max_length[53]|trim',
		),

		array(
			'field' => 'pay_ref',
			'label' => 'Reférence &nbsp;:',
			'rules' => 'required|min_length[8]|max_length[44]|trim',
		),
		array(
			'field' => 'id_mag',
			'label' => 'Magasin &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[4]|is_natural_no_zero',
		)
	),

	'admin/ControlPanel/affectMat' => array (
		array(
			'field' => 'id_mag',
			'label' => 'Magasin &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[4]|is_natural_no_zero',
		),
		array(
			'field' => 'quantity',
			'label' => 'Quantité &nbsp;:',
			'rules' => 'required|min_length[1]|max_length[5]|trim',
		),
		array(
			'field' => 'duration_prop',
			'label' => 'Durée de l\'attribution  &nbsp;:',
			'rules' => 'required|min_length[1]|max_length[4]|trim',
		),
		array(
			'field' => 'description_prop',
			'label' => 'Description de l\'attribution &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[512]|trim',
		)
	),

	'admin/C_Forum/addCom' => array (
		array(
			'field' => 'subject',
			'label' => 'Sujet &nbsp;:',
			'rules' => 'required|min_length[5]|trim',
		),
		array(
			'field' => 'fisrt_content',
			'label' => 'Premier message &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[512]|trim',
		),
		array(
			'field' => 'descrip',
			'label' => 'Description du Sujet &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[1024]|trim',
		)
	),

	'Bioluxoptical/addCom' => array (
		array(
			'field' => 'subject',
			'label' => 'Sujet &nbsp;:',
			'rules' => 'required|min_length[5]|trim',
		),
		array(
			'field' => 'fisrt_content',
			'label' => 'Premier message &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[512]|trim',
		),
		array(
			'field' => 'descrip',
			'label' => 'Description du Sujet &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[1024]|trim',
		)
	),

	'admin/ControlPanel/affectRea' => array (
		array(
			'field' => 'id_mag',
			'label' => 'Magasin &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[4]|is_natural_no_zero',
		),
		array(
			'field' => 'id_reason',
			'label' => 'Magasin &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[8]|is_natural_no_zero',
		),
		array(
			'field' => 'quantity',
			'label' => 'Quantité &nbsp;:',
			'rules' => 'required|min_length[1]|max_length[5]|trim',
		),
		array(
			'field' => 'duration_prop',
			'label' => 'Durée de l\'attribution  &nbsp;:',
			'rules' => 'required|min_length[1]|max_length[4]|trim',
		),
		array(
			'field' => 'description_prop',
			'label' => 'Description de l\'attribution &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[512]|trim',
		)
	),
	
	'admin/ControlPanel/addThisPersonal' => array (
		array(
			'field' => 'first_name',
			'label' => 'Nom &nbsp;:',
			'rules' => 'required|min_length[4]|max_length[17]|trim',
		),

		array(
			'field' => 'second_name',
			'label' => 'Prénom &nbsp;:',
			'rules' => 'min_length[4]|max_length[17]|trim',
		),

		array(
			'field' => 'reg_number',
			'label' => 'Matricule &nbsp;:',
			'rules' => 'required|trim|exact_length[8]',
		),

		array(
			'field' => 'age',
			'label' => 'Age &nbsp;:',
			'rules' => 'required|trim|exact_length[2]|numeric|is_natural_no_zero',
		),

		array(
			'field' => 'working_time11',
			'label' => 'Plage 1-1 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time12',
			'label' => 'Plage 1-2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),


		array(
			'field' => 'working_time21',
			'label' => 'Début plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time22',
			'label' => 'Fin plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time31',
			'label' => 'Début plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time32',
			'label' => 'Fin plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),


		array(
			'field' => 'working_time41',
			'label' => 'Début plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time42',
			'label' => 'Fin plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'genre',
			'label' => 'Genre &nbsp;:',
			'rules' => 'required|trim',
		),

		array(
			'field' => 'phone',
			'label' => 'Téléphone &nbsp;:',
			'rules' => 'required|max_length[13]|numeric|trim|exact_length[9]',
		),

		array(
			'field' => 'email',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[62]|trim|valid_email',
		),

		array(
			'field' => 'diploma',
			'label' => 'Diplôme &nbsp;:',
			'rules' => 'min_length[4]|max_length[44]|trim',
		),
		array(
			'field' => 'years_exp',
			'label' => 'Annés d\'epérience &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[2]|is_natural_no_zero',
		),

		array(
			'field' => 'function',
			'label' => 'Fonction &nbsp;:',
			'rules' => 'required|trim|min_length[4]|max_length[53]',
		),

		array(
			'field' => 'password',
			'label' => 'Mot de passe &nbsp;:',
			'rules' => 'required|min_length[8]|max_length[13]|trim',
		),
		array(
			'field' => 'cpassword',
			'label' => 'Confirmation &nbsp;:',
			'rules' => 'required|min_length[8]|max_length[13]|trim|matches[password]',
		),


		array(
			'field' => 'id_mag',
			'label' => 'Magasin &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[4]|is_natural_no_zero',
		),
		array(
			'field' => 'id_role',
			'label' => 'Rôle &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[3]|is_natural_no_zero',
		),
	),


	
	'admin/ControlPanel/updateHispersonal' => array (
		array(
			'field' => 'first_name',
			'label' => 'Nom &nbsp;:',
			'rules' => 'required|min_length[4]|max_length[17]|trim',
		),

		array(
			'field' => 'second_name',
			'label' => 'Prénom &nbsp;:',
			'rules' => 'min_length[4]|max_length[17]|trim',
		),

		array(
			'field' => 'reg_number',
			'label' => 'Matricule &nbsp;:',
			'rules' => 'required|trim|min_length[2]',
		),

		array(
			'field' => 'age',
			'label' => 'Age &nbsp;:',
			'rules' => 'required|trim|exact_length[2]|numeric|is_natural_no_zero',
		),

		array(
			'field' => 'working_time11',
			'label' => 'Plage 1-1 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time12',
			'label' => 'Plage 1-2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),


		array(
			'field' => 'working_time21',
			'label' => 'Début plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time22',
			'label' => 'Fin plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time31',
			'label' => 'Début plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time32',
			'label' => 'Fin plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),


		array(
			'field' => 'working_time41',
			'label' => 'Début plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'working_time42',
			'label' => 'Fin plg 2 &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[2]',
		),

		array(
			'field' => 'genre',
			'label' => 'Genre &nbsp;:',
			'rules' => 'required|trim',
		),

		array(
			'field' => 'phone',
			'label' => 'Téléphone &nbsp;:',
			'rules' => 'required|max_length[13]|numeric|trim|exact_length[9]',
		),

		array(
			'field' => 'email',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[62]|trim|valid_email',
		),

		array(
			'field' => 'diploma',
			'label' => 'Diplôme &nbsp;:',
			'rules' => 'min_length[4]|max_length[44]|trim',
		),
		array(
			'field' => 'years_exp',
			'label' => 'Annés d\'epérience &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[2]|is_natural_no_zero',
		),

		array(
			'field' => 'function',
			'label' => 'Fonction &nbsp;:',
			'rules' => 'required|trim|min_length[4]|max_length[53]',
		),

		array(
			'field' => 'password',
			'label' => 'Mot de passe &nbsp;:',
			'rules' => 'min_length[8]|max_length[13]|trim',
		),
		array(
			'field' => 'cpassword',
			'label' => 'Confirmation &nbsp;:',
			'rules' => 'min_length[8]|max_length[13]|trim|matches[password]',
		),


		array(
			'field' => 'id_mag',
			'label' => 'Magasin &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[4]|is_natural_no_zero',
		),
		array(
			'field' => 'id_role',
			'label' => 'Rôle &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[3]|is_natural_no_zero',
		),
	),

	'admin/ControlPanel/affectHispersonal' => array (
		
		array(
			'field' => 'id_mag',
			'label' => 'Magasin &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[4]|is_natural_no_zero',
		),
		array(
			'field' => 'id_role',
			'label' => 'Rôle &nbsp;:',
			'rules' => 'required|numeric|trim|min_length[1]|max_length[3]|is_natural_no_zero',
		),

		array(
			'field' => 'function',
			'label' => 'Fonction &nbsp;:',
			'rules' => 'required|trim|min_length[4]|max_length[53]',
		)
	),

	'Bioluxoptical/createAccount' => array (
		array(
			'field' => 'fname_cost',
			'label' => 'Nom d’utilisateur &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[17]|trim',
		),
		array(
			'field' => 'password',
			'label' => 'Mot de passe &nbsp;:',
			'rules' => 'required|min_length[8]|max_length[13]|trim',
		),
		array(
			'field' => 'cpassword',
			'label' => 'Confirmation &nbsp;:',
			'rules' => 'required|min_length[8]|max_length[13]|trim|matches[password]',
		),
		array(
			'field' => 'sname_cost',
			'label' => 'Prénom &nbsp;:',
			'rules' => 'min_length[4]|max_length[17]|trim',
		),
		array(
			'field' => 'email',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[53]|trim|valid_email',
		),
		array(
			'field' => 'id_slice_age',
			'label' => 'Tranche d\'âge &nbsp;:',
			'rules' => 'required|max_length[13]|trim|exact_length[1]',
		),
		array(
			'field' => 'genre',
			'label' => 'Genre &nbsp;:',
			'rules' => 'required|trim|exact_length[1]|exact_length[1]',
		),
		array(
			'field' => 'phone',
			'label' => 'Téléphone &nbsp;:',
			'rules' => 'required|max_length[13]|numeric|trim|min_length[8]',
		),
		array(
			'field' => 'country',
			'label' => 'Code Pays &nbsp;:',
			'rules' => 'required|max_length[13]|numeric|trim|min_length[1]',
		)

	),


	'admin/ControlPanel/updateCus' => array (
		array(
			'field' => 'fname_cost',
			'label' => 'Nom d’utilisateur &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[17]|trim',
		),
		array(
			'field' => 'sname_cost',
			'label' => 'Prénom &nbsp;:',
			'rules' => 'min_length[4]|max_length[17]|trim',
		),
		array(
			'field' => 'password',
			'label' => 'Mot de passe &nbsp;:',
			'rules' => 'min_length[8]|max_length[13]|trim',
		),
		array(
			'field' => 'cpassword',
			'label' => 'Confirmation &nbsp;:',
			'rules' => 'min_length[8]|max_length[13]|trim|matches[password]',
		),
		array(
			'field' => 'email_cost',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[53]|trim|valid_email',
		),
		array(
			'field' => 'profession',
			'label' => 'Profession &nbsp;:',
			'rules' => 'min_length[5]|max_length[53]|trim',
		),
		array(
			'field' => 'id_slice_age',
			'label' => 'Tranche d\'âge &nbsp;:',
			'rules' => 'required|max_length[13]|trim|exact_length[1]',
		),
		array(
			'field' => 'genre',
			'label' => 'Genre &nbsp;:',
			'rules' => 'required|trim|exact_length[1]|exact_length[1]',
		),
		array(
			'field' => 'phone',
			'label' => 'Téléphone &nbsp;:',
			'rules' => 'required|max_length[13]|numeric|trim|min_length[8]',
		),
		array(
			'field' => 'country',
			'label' => 'Code Pays &nbsp;:',
			'rules' => 'required|max_length[13]|numeric|trim|min_length[1]',
		)

	),

	'customer/CustomerPanel/updateCus' => array (
		array(
			'field' => 'fname_cost',
			'label' => 'Nom d’utilisateur &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[17]|trim',
		),
		array(
			'field' => 'sname_cost',
			'label' => 'Prénom &nbsp;:',
			'rules' => 'min_length[4]|max_length[17]|trim',
		),
		array(
			'field' => 'password',
			'label' => 'Mot de passe &nbsp;:',
			'rules' => 'min_length[8]|max_length[13]|trim',
		),
		array(
			'field' => 'cpassword',
			'label' => 'Confirmation &nbsp;:',
			'rules' => 'min_length[8]|max_length[13]|trim|matches[password]',
		),
		array(
			'field' => 'email_cost',
			'label' => 'Email &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[53]|trim|valid_email',
		),
		array(
			'field' => 'profession',
			'label' => 'Profession &nbsp;:',
			'rules' => 'min_length[5]|max_length[53]|trim',
		),
		array(
			'field' => 'id_slice_age',
			'label' => 'Tranche d\'âge &nbsp;:',
			'rules' => 'required|max_length[13]|trim|exact_length[1]',
		),
		array(
			'field' => 'genre',
			'label' => 'Genre &nbsp;:',
			'rules' => 'required|trim|exact_length[1]|exact_length[1]',
		),
		array(
			'field' => 'phone',
			'label' => 'Téléphone &nbsp;:',
			'rules' => 'required|max_length[13]|numeric|trim|min_length[8]',
		),
		array(
			'field' => 'country',
			'label' => 'Code Pays &nbsp;:',
			'rules' => 'required|max_length[13]|numeric|trim|min_length[1]',
		)

	),

	
	'admin/ControlPanel/addThisMat' => array (
		array(
			'field' => 'name_mat',
			'label' => 'Désignqtion &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[31]|trim',
		),
		array(
			'field' => 'reg_num_mat',
			'label' => 'Matricule &nbsp;:',
			'rules' => 'required|min_length[3]|max_length[13]|trim',
		),
		array(
			'field' => 'desc_mat',
			'label' => 'Description / Usage &nbsp;:',
			'rules' => 'required|trim',
		)

	),

	'admin/ControlPanel/updateMat' => array (
		array(
			'field' => 'name_mat',
			'label' => 'Désignqtion &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[31]|trim',
		),
		array(
			'field' => 'reg_num_mat',
			'label' => 'Matricule &nbsp;:',
			'rules' => 'required|min_length[3]|max_length[13]|trim',
		),
		array(
			'field' => 'desc_mat',
			'label' => 'Description / Usage &nbsp;:',
			'rules' => 'required|trim',
		)

	),

	'admin/ControlPanel/addMag' => array (
		array(
			'field' => 'po_box',
			'label' => 'Boite postale &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[31]|trim',
		),
		array(
			'field' => 'phone_ss',
			'label' => 'Téléphone du point de vente &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[15]|trim',
		),
		array(
			'field' => 'description',
			'label' => 'Description &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[202]|trim',
		),
		array(
			'field' => 'longitude',
			'label' => 'Longitude &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[17]|trim|decimal',
		),
		array(
			'field' => 'latitude',
			'label' => 'Latitude &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[17]|trim|decimal',
		),
		array(
			'field' => 'altitude',
			'label' => 'Altitude &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[31]|trim|decimal',
		),
		array(
			'field' => 'id_town',
			'label' => 'Ville &nbsp;:',
			'rules' => 'required|exact_length[1]|trim|numeric'
		),
	),
	'admin/ControlPanel/updMag' => array (
		array(
			'field' => 'po_box',
			'label' => 'Boite postale &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[31]|trim',
		),
		array(
			'field' => 'phone_ss',
			'label' => 'Téléphone du point de vente &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[15]|trim',
		),
		array(
			'field' => 'description',
			'label' => 'Description &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[202]|trim',
		),
		array(
			'field' => 'longitude',
			'label' => 'Longitude &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[17]|trim|decimal',
		),
		array(
			'field' => 'latitude',
			'label' => 'Latitude &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[17]|trim|decimal',
		),
		array(
			'field' => 'altitude',
			'label' => 'Altitude &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[31]|trim|decimal',
		),
		array(
			'field' => 'id_town',
			'label' => 'Ville &nbsp;:',
			'rules' => 'required|exact_length[1]|trim|numeric'
		),
	),
	'admin/ControlPanel/addRea' => array (
		array(
			'field' => 'name_reason',
			'label' => 'Nom du produit &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[62]|trim',
		),
		array(
			'field' => 'origine_reason',
			'label' => 'Origine du produit &nbsp;:',
			'rules' => 'required|min_length[3]|max_length[17]|trim',
		),
		array(
			'field' => 'description_reason',
			'label' => 'Description du produit &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[809]|trim',
		),
		array(
			'field' => 'price_reason',
			'label' => 'Prix du produit &nbsp;:',
			'rules' => 'required|min_length[3]|max_length[10]|trim|is_natural_no_zero',
		),
		array(
			'field' => 'type_reason',
			'label' => 'Type du produit &nbsp;:',
			'rules' => 'required|exact_length[1]|trim|integer',
		),
		array(
			'field' => 'date_manufacturate',
			'label' => 'Date de fabrication &nbsp;:',
			'rules' => 'trim|exact_length[10]',
		),
		array(
			'field' => 'date_experation',
			'label' => 'Date d\'expiration &nbsp;:',
			'rules' => 'trim|exact_length[10]',
		),
		array(
			'field' => 'id_cat_reason',
			'label' => '(Sous) Catégorie &nbsp;:',
			'rules' => 'required|min_length[1]|max_length[8]|integer',
		),/*
		array(
			'field' => 'note_reason',
			'label' => 'Remarque &nbsp;:',
			'rules' => 'trim'
		),*/
		array(
			'field' => 'code_reason',
			'label' => 'Code &nbsp;:',
			'rules' => 'required|min_length[6]|max_length[17]|trim'
		),
	),


	'admin/ControlPublic/updTestimonialPage' => array (
		array(
			'field' => 'descrip',
			'label' => 'Description de la page &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[872]|trim',
		),
	),

	'admin/C_Provider/addProv' => array (
		array(
			'field' => 'name_prov',
			'label' => 'Nom du partenaire &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[31]|trim',
		),
		array(
			'field' => 'social_reason',
			'label' => 'Raison social &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[202]|trim',
		),
		array(
			'field' => 'contact',
			'label' => 'Contact &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[103]|trim',
		),
		array(
			'field' => 'code_number',
			'label' => 'Numéro de code &nbsp;:',
			'rules' => 'required|min_length[6]|max_length[13]|trim',
		),
		array(
			'field' => 'description',
			'label' => 'Description des échanges &nbsp;:',
			'rules' => 'required|min_length[6]|max_length[202]|trim',
		),
		array(
			'field' => 'termes',
			'label' => 'Termes du contrat &nbsp;:',
			'rules' => 'trim|min_length[6]|max_length[809]',
		),
		array(
			'field' => 'id_user',
			'label' => 'Intermédiare interne / Gestionnaire &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[8]|integer|is_natural_no_zero',
		),
		array(
			'field' => 'type_prov',
			'label' => 'Type de partenaire &nbsp;:',
			'rules' => 'required|trim|exact_length[1]|integer',
		),
		array(
			'field' => 'date_reg_prov',
			'label' => 'Date de signature du partenariat &nbsp;:',
			'rules' => 'required|trim|exact_length[10]',
		),
	),

	'admin/C_Provider/update' => array (
		array(
			'field' => 'name_prov',
			'label' => 'Nom du partenaire &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[31]|trim',
		),
		array(
			'field' => 'social_reason',
			'label' => 'Raison social &nbsp;:',
			'rules' => 'required|min_length[10]|max_length[202]|trim',
		),
		array(
			'field' => 'contact',
			'label' => 'Contact &nbsp;:',
			'rules' => 'required|min_length[9]|max_length[103]|trim',
		),
		array(
			'field' => 'code_number',
			'label' => 'Numéro de code &nbsp;:',
			'rules' => 'required|min_length[6]|max_length[13]|trim',
		),
		array(
			'field' => 'description',
			'label' => 'Description des échanges &nbsp;:',
			'rules' => 'required|min_length[6]|max_length[202]|trim',
		),
		array(
			'field' => 'termes',
			'label' => 'Termes du contrat &nbsp;:',
			'rules' => 'trim|min_length[6]|max_length[809]',
		),
		array(
			'field' => 'id_user',
			'label' => 'Intermédiare interne / Gestionnaire &nbsp;:',
			'rules' => 'required|trim|min_length[1]|max_length[8]|integer|is_natural_no_zero',
		),
		array(
			'field' => 'type_prov',
			'label' => 'Type de partenaire &nbsp;:',
			'rules' => 'required|trim|exact_length[1]|integer',
		),
		array(
			'field' => 'date_reg_prov',
			'label' => 'Date de signature du partenariat &nbsp;:',
			'rules' => 'required|trim|exact_length[10]',
		),
	),


	'admin/ControlPanel/updRea' => array (
		array(
			'field' => 'name_reason',
			'label' => 'Nom du produit &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[62]|trim',
		),
		array(
			'field' => 'origine_reason',
			'label' => 'Origine du produit &nbsp;:',
			'rules' => 'required|min_length[3]|max_length[17]|trim',
		),
		array(
			'field' => 'description_reason',
			'label' => 'Description du produit &nbsp;:',
			'rules' => 'required|min_length[5]|max_length[809]|trim',
		),
		array(
			'field' => 'price_reason',
			'label' => 'Prix du produit &nbsp;:',
			'rules' => 'required|min_length[3]|max_length[10]|trim|is_natural_no_zero',
		),
		array(
			'field' => 'type_reason',
			'label' => 'Type du produit &nbsp;:',
			'rules' => 'required|exact_length[1]|trim|integer',
		),
		array(
			'field' => 'date_manufacturate',
			'label' => 'Date de fabrication &nbsp;:',
			'rules' => 'trim|exact_length[10]',
		),
		array(
			'field' => 'date_experation',
			'label' => 'Date d\'expiration &nbsp;:',
			'rules' => 'trim|exact_length[10]',
		),
		array(
			'field' => 'id_cat_reason',
			'label' => '(Sous) Catégorie &nbsp;:',
			'rules' => 'required|min_length[1]|max_length[8]|integer',
		),/*
		array(
			'field' => 'note_reason',
			'label' => 'Remarque &nbsp;:',
			'rules' => 'trim'
		),*/
		array(
			'field' => 'code_reason',
			'label' => 'Code &nbsp;:',
			'rules' => 'required|min_length[6]|max_length[17]|trim'
		),
	)
	
);
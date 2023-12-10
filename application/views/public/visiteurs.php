<?php

	//Oncompte le nombre d'entrées pour aujourd'hui
	$donnees_count = $retour_count;
	echo 'Pages vues aujourd\'hui : <strong>';

	// On affiche tout de suite pour pas le retaper 2 fois après
	if ($donnees_count == 0) {

		$data = array(
	        'visites' => 1,
	        'date' => date("Y/m/d"),
		);

		$this->db->insert('visites_jour', $data);

		//On rentre la date d'aujourd'hui et on marque 1 comme nombre de visites.
		echo '1'; 

		//On affiche une visite car c'est la première visite de la journée
	} 
	else { 
		//Si la date a déjà été enregistrée
		$retour = $this->db->select('visites')->where('date', date("Y/m/d"))->get('visites_jour')->result_array();  

		//On sélectionne l'entrée qui correspond à notre date
		$donnees = $retour;

		$visites =0;
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
		echo $visites; 

		//Enfin, on affiche le nombre de visites d'aujourd'hui !
		}
		echo '</strong></br/>';

		//ETAPE 2 - Record des connectés par jour
		$retour_max = $this->db->select('visites, date')->where('date', date("Y/m/d"))->order_by('visites', 'DESC')->limit(0, 1)->get('visites_jour');

		//On sélectionne Des statistiques pour votre site ! 5/16 www.openclassrooms.coml'entrée qui a le nombre visite le plus important
		$donnees_max = $retour_max->result_array();

		foreach ($donnees_max as $key) {
			echo 'Record : <strong>' . $key['visites'] . '</strong>
		établi le <strong>' . $key['date'] . '</strong><br/>';
		} 

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

		$total = array();
		foreach ($total_visite as $key) {
			$total_visites += $key['visites'];
			$total_jours +=1;
		}
		
		$moyenne = $total_visites/($total_jours); 

		//on fait la moyenne
		echo 'Moyenne : <strong>' . $moyenne . '</strong> visiteurs par jour<br/>'; // On affiche ! Terminé !!!


?>
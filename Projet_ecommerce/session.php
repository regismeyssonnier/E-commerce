<?php

	session_start();
	
	$fichier = split("/", $_SERVER['SCRIPT_NAME']);
	$n = count($fichier);
		
	if(!isset($_SESSION['login']))
	{
		if(isset($_GET['ajout_article']))
			$_SESSION['ajout_article'] = $_GET['ajout_article'];
			
		header('Refresh:0; URL=redir_authentification.php?redirection=' .$fichier[$n-1]);
			
	}
	else if($fichier[$n-1] == 'commande.php')
	{
		if(!isset($_GET['id_commande']))
		{
			header('Refresh:0; URL=liste_commande.php');
				
		}
			
	}
	
	
	

?>
<?php
	
	$serveur = 'localhost';
	$identifiant = 'rm188766';
	$mdp = 'rm188766';
	$base = 'rm188766';
	
	$connect = mysql_connect($serveur, $identifiant, $mdp)or die ("Connexion impossible à la base");
	mysql_select_db($base, $connect)or die("Base inconnue");
	

?>
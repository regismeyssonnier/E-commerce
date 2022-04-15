<?php

	session_start();

?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type="text/javascript" src="site.js"></script>
</head>
<body>

	<table class="tab_principal">
		<tr>
			<td class="cell_entete" colspan="3">
				<center><h1>TOP ACHAT</h1></center>
			</td>
		</tr>
		<tr>
			<td class="cote_gauche" valign="top">
			
			<p><a href="index.php">Accueil</a><br/></p>
			
			<?php
			
				include("connect.php");
												
				include("menu_categorie.php");
			
			
			
			?>
			
			
			</td>
			<td class="centre" valign="top">
			
			<form action="index.php" method="post" >
				<table class="tab_recherche">
					<tr>
						<td align="left">Recherche :
							<input type="text" name="text_rech" value="" size="50"/>
							<input type="submit" name="rechercher" value="Rechercher"/>
						</td>
					</tr>
							
				</table>
			</form>
				
			<?php
			
				if(isset($_GET['id_article']) || (isset($_POST['id_article']) && !isset($_POST['rech_cat'])) )
				{
					include("afficher_article.php");
				}
				else
				{
					include("liste_resultat.php");
				}
			
			?>
			
			
			
			
			</td>
			<td class="cote_droit" valign="top">
			
			<?php
			
			
				if(isset($_GET['deconnexion']))
				{
					//Destruction des variables de session
					session_unregister('login');
					session_unregister('id_client');
					session_unregister('index_tab');
					session_unregister('tab_article');
					session_unregister('tab_nb_article');
					session_unregister('profil');
					session_unregister('ajout_article');
					
				}
			
			
				$erreur = false;
				$mess_err = '';
				if(isset($_POST['connecter']))
				{
					$sql_connect = "SELECT * FROM CLIENT WHERE LOGIN = '" .$_POST['login'] ."' AND MDP = '" .md5($_POST['mdp']) ."';";
					
					if($res_con = mysql_query($sql_connect))
					{
						if(mysql_num_rows($res_con) != 0)
						{
							//si on est pas deja connecte
							if(!isset($_SESSION['login']))
							{
								$client = mysql_fetch_array($res_con);
								$_SESSION['login'] = $_POST['login'];
								$_SESSION['index_tab'] = 0;
								$_SESSION['tab_article'] = array();
								$_SESSION['tab_nb_article'] = array();
								$_SESSION['profil'] = $client['PROFIL'];
								$_SESSION['id_client'] = $client['ID_CLIENT'];
							}
							
																		
						}
						else
						{
							$erreur = true;
							$mess_err = '<center>Mauvais login ou mot de passe</center>';
						
						}
					
					}
					else
					{
						$erreur = true;
						$mess_err = '<center>Erreur lors de la connection. Reconnectez - vous.</center>';
					
					} 
					
					
				}
			
				if(!isset($_SESSION['login']))
				{
					echo '<form action="index.php" method="post">';
					echo '<table class="tab_menu">';	
					echo '<tr><td align="center" class="entete_menu" colspan="2">Se connecter</td></tr>';
					echo '<tr><td align="center">Login</td><td><input type="text" name="login" value=""/></td></tr>';
					echo '<tr><td align="center">Mot de passe</td><td><input type="password" name="mdp" value=""/></td></tr>';
					if($erreur)
					{
						echo '<tr><td class="mess_erreur" colspan="2" align="center">' .$mess_err .'</td></tr>';
					}
					echo '<tr><td align="center" class="lien_rouge9" colspan="2" onclick="Afficher_inscription();">Vous n\'êtes pas inscrit. Inscrivez-vous !!!</td></tr>';
					echo '<tr><td></td><td align="right"><input type="submit" name="connecter" value="Se connecter"/></td></tr>';
					echo '</table>';
					
					if(isset($_GET['id_article']))
						echo '<input type="hidden" name="id_article" value="' .$_GET['id_article'] .'" />';
						
					if(isset($_POST['id_article']) && !isset($_POST['rech_cat']))
						echo '<input type="hidden" name="id_article" value="' .$_POST['id_article'] .'" />';
						
					echo '</form>';
				
				
				}
				else
				{
					echo '<table class="tab_menu">';
					echo '<tr><td align="center" class="entete_menu"><a onclick="javascript:panier.close();commande.close();" href="index.php?deconnexion';
					
					if(isset($_GET['id_article']))
						echo '&id_article=' .$_GET['id_article'];
						
					if(isset($_POST['id_article']) && !isset($_POST['rech_cat']))
						echo '&id_article=' .$_POST['id_article'];
					
					
					echo '">Déconnectez -vous ' .$_SESSION['login'] .'</a></td></tr>';
					echo '</table>';	
				
				
				}
			
			
			
			
				$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CAT IS NULL;";
				if($res_c = mysql_query($sql_categ))
				{
					
					echo '<form id="rech_cat_f" action="index.php" method="post">';
					echo '<table class="tab_menu">';
					echo '<tr><td class="entete_menu" align="center">Recherche par catégorie</td></tr>';
					echo '<tr><td><select name="cat_princ" onchange="Soumettre_form(' ."'rech_cat_f'" .')">';
					echo '<option value="0">Aucune</option>';
					while($categ = mysql_fetch_array($res_c))
					{
						if(isset($_POST['cat_princ']))
						{
							if($_POST['cat_princ'] == $categ['CODE_CATEGORIE'])
							{
								echo '<option value="' .$categ['CODE_CATEGORIE'] .'" selected="selected">' .$categ['LIBELLE_CATEGORIE'] .'</option>';
								
							}
							else
								echo '<option value="' .$categ['CODE_CATEGORIE'] .'">' .$categ['LIBELLE_CATEGORIE'] .'</option>';
						}
						else
						{
							echo '<option value="' .$categ['CODE_CATEGORIE'] .'">' .$categ['LIBELLE_CATEGORIE'] .'</option>';
						
						}					
					
					}
					
					echo '</select></td></tr>';
					echo '<input type="hidden" id="debut" name="debut" value="0"/>';
					
					if(isset($_POST['cat_princ']))
					{
						if( ( ($_POST['cat_princ'] != 0) && !isset($_POST['post_ss_cat']) ) || ($_POST['debut'] == 1) )
						{
							$sql_ss_cat = "SELECT * FROM CATEGORIE WHERE CODE_CAT = " .$_POST['cat_princ'];
							if($res_ss_c = mysql_query($sql_ss_cat))
							{
								if(mysql_num_rows($res_ss_c) != 0)
								{
									echo '<tr><td>';
									echo '<select id="ss_cat_1" onchange="Soumettre_form2(1);">';
									echo '<option value="0">Aucune</option>';
									while($ss_cat = mysql_fetch_array($res_ss_c))
									{
									
										echo '<option value="' .$ss_cat['CODE_CATEGORIE'] .'">' .$ss_cat['LIBELLE_CATEGORIE'] .'</option>';
									
									}
									
									echo '</select></td></tr>';
									
									
								
								}
								
								
							
							}
							else
							{
								echo mysql_error();
							}
							
							echo '<input type="hidden" name="post_ss_cat" value="' .$_POST['cat_princ'] .'"/>';
						
						}
						else
						{
							
							if(isset($_POST['post_ss_cat']))
							{
								$t_cat = split("-", $_POST['post_ss_cat']);
								$nb_cat = count($t_cat);
								for($i = 0;($i < $nb_cat) && ($t_cat[$i] != 0);$i++)
								{
								
									$sql_ss_cat = "SELECT * FROM CATEGORIE WHERE CODE_CAT = " .$t_cat[$i];
									if($res_ss_c = mysql_query($sql_ss_cat))
									{
										if(mysql_num_rows($res_ss_c) != 0)
										{
											echo '<tr><td>';$ind = $i + 1;
											echo '<select id="ss_cat_' .$ind .'" onchange="Soumettre_form2(' .$ind .');">';
											echo '<option value="0">Aucune</option>';
											while($ss_cat = mysql_fetch_array($res_ss_c))
											{
												if($t_cat[$i+1] == $ss_cat['CODE_CATEGORIE'])
													echo '<option value="' .$ss_cat['CODE_CATEGORIE'] .'" selected="selected">' .$ss_cat['LIBELLE_CATEGORIE'] .'</option>';
												else
													echo '<option value="' .$ss_cat['CODE_CATEGORIE'] .'">' .$ss_cat['LIBELLE_CATEGORIE'] .'</option>';
											
											}
											
											echo '</select></td></tr>';
											
										}
										
										
									
									}
									else
									{
										echo mysql_error();
									}
									
									
								
								
								
								}
							
								echo '<input type="hidden" name="post_ss_cat" value="' .$_POST['post_ss_cat'] .'"/>';
								
							}
						
						
						
						}
					
					
					}
					
					if(isset($_GET['id_article']))
						echo '<input type="hidden" name="id_article" value="' .$_GET['id_article'] .'" />';
						
					if(isset($_POST['id_article']) && !isset($_POST['rech_cat']))
						echo '<input type="hidden" name="id_article" value="' .$_POST['id_article'] .'" />';
					
					echo '<tr><td><input type="submit" name="rech_cat" value="Rechercher" /></td></tr>';
					echo '</table>';
					echo '</form>';
					
					
				
				}
				else
				{
					echo mysql_error();
				
				}
				
				if(isset($_SESSION['login']))
				{
				
					if($_SESSION['profil'] != 'administrateur')
					{
						echo '<table class="tab_menu">';	
						echo '<tr><td align="center" class="entete_menu">Panier</td></tr>';
						echo '<tr><td align="center"><a onclick="Afficher_panier_only();">Voir son panier</a></td></tr>';
						echo '<tr><td align="center"><a onclick="Afficher_panier_vide();">Vider son panier</a></td></tr>';
						echo '</table>';
					}
					
					if($_SESSION['profil'] == 'acheteur')
					{
						echo '<table class="tab_menu">';	
						echo '<tr><td align="center" class="entete_menu">Commande</td></tr>';
						echo '<tr><td align="center"><a onclick="Afficher_commande();">Voir ses commandes</a></td></tr>';
						echo '</table>';
					
					}
					
					if($_SESSION['profil'] == 'administrateur')
					{
						echo '<table class="tab_menu">';	
						echo '<tr><td align="center" class="entete_menu">Administration</td></tr>';
						echo '<tr><td align="center"><a href="admin.php';
						if(isset($_GET['id_article']))
							echo '?id_article=' .$_GET['id_article'];
						if(isset($_POST['id_article']) && !isset($_POST['rech_cat']))
							echo '?id_article=' .$_POST['id_article'];
						echo '">Ajouter attribut</a></td></tr>';
						echo '</table>';
					
					}
					
				}			
					
			
			?>
			
			
			
			</td>
		</tr>
		<tr>
			<td class="cell_pied_page" colspan="3"></td>
		</tr>
	
	</table>


</body>
</html>
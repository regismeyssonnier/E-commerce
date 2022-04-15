<?php

	include("session.php");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css"  rel="stylesheet" href="style.css" />
<script type="text/javascript" src="site.js"></script>
<title>Passez votre commande</title>
</head>

<body>

	<?php
	
		include("connect.php");
		
		
		$aff_com = true;
		$erreur_com = false;
		
		$num_carte = true;
		$num_carte_val = true;
		
		if(isset($_POST['commander']))
		{
			if($_POST['mode_paiement'] == 'cb')
			{
				if($_POST['num_cb'] == '')
				{
					$num_carte = false;
				}
				else
				{
					if(!ctype_digit($_POST['num_cb']))
					{
						$num_carte_val = false;
					}
					else
					{
						if(strlen($_POST['num_cb']) != 16)
							$num_carte_val = false;
					
					}
					
				
				}
			
			
			}
			
			
			
			
			if($num_carte && $num_carte_val)
			{
				$num_com = 0;
				$sql_num_comm = "SELECT MAX(ID_COMMANDE) FROM COMMANDE;";
				if($res_nc = mysql_query($sql_num_comm))
				{
					$nc = mysql_fetch_array($res_nc);
					$num_com = $nc[0] + 1;
				
				}
				else
				{
					echo mysql_error();
					$erreur_com = true;
				
				}
				
				if(!$erreur_com)
				{
					$num_cb = 'NULL';
					if($_POST['mode_paiement'] == 'cb')
						$num_cb = $_POST['num_cb'];
						
					$sql_commande = "INSERT INTO COMMANDE VALUES(" .$num_com .", '" .$_POST['mode_paiement'] ."', " .$num_cb .", CURDATE(), " .$_SESSION['id_client'] .");";
					if(!mysql_query($sql_commande))
					{
						echo mysql_error();
						$erreur_com = true;
					
					}
				
				}
				
				
				if(!$erreur_com)
				{
					
					$tab_art = array();
					$ind = 0;
					
					for($i = 0;$i < $_SESSION['index_tab'];$i++)
					{
						$sql_commander = "INSERT INTO COMMANDER VALUES(" .$num_com .", " .$_SESSION['tab_article'][$i] .", " .$_SESSION['tab_nb_article'][$i] .");";
						if(mysql_query($sql_commander))
						{
							$tab_art[$ind] = $_SESSION['tab_article'][$i];
							$ind++;
						}
						else
						{
							echo mysql_error();
							$erreur_com = true;
						
						}
					
					}
					
					if(!$erreur_com)
					{
						$_SESSION['index_tab'] = 0;
						$_SESSION['tab_article'] = array();
						$_SESSION['tab_nb_article'] = array();
						$aff_com = false;
						
						//Changer le profil de l'utilisateur si c'est un visiteur => acheteur
						if($_SESSION['profil'] == 'visiteur')
						{
							$up_profil = "UPDATE CLIENT 
										  SET PROFIL = 'acheteur'
										  WHERE ID_CLIENT = " .$_SESSION['id_client'];
							mysql_query($up_profil);	
							
							$_SESSION['profil'] = 'acheteur';
						}
	?>
	
						<script type="text/javascript">
							opener.document.getElementById('rech_cat_f').submit();
						</script>
	
	<?php
	
									  
						
					}
					else
					{
						//Si erreur pendant la transaction efface ttes les insertions(la commande)
						$sql_del = "DELETE FROM COMMANDE WHERE ID_COMMANDE = " .$num_com;
						mysql_query($sql_del);
						
						for($j = 0;$j < $ind;$j++)
						{
							$sql_del = "DELETE FROM COMMANDER WHERE ID_COMMANDE = " .$num_com ." AND ID_ARTICLE = " .$tab_art[$j] .";";
							mysql_query($sql_del);
						
						}
						
						
					
					
					}
					
					
					
				}
				
		
			
			
			}
			
		
		}
		
		
					
		
		$Total_red = 0;
		$Total_TVA = 0;
		$Total_TTC = 0;
	
	?>

	<center><h2>Passez votre Commande</h2></center>
	
	<?php
	
		if($aff_com)
		{
		
			if($erreur_com)
			{
				echo '<center><h2 class="rouge">Erreur lors de l\'enregistrement de votre commande.</h2></center>';
				echo '<center><h2 class="rouge">Repassez votre commande en appuyant sur le bouton Commander</h2></center>';
				
			}
		
	
	?>

	<table class="tab_panier">
		<tr>
			<td>
				<table class="tab_panier_art">
					<tr class="cell_entete_article">
						<td>Article</td>
						<td>Qté</td>
						<td>Prix unitaire TTC</td>
						<td>Réduction</td>
						<td>Prix Total TTC</td>
						
					</tr>
			
		<?php
		
			for($i = 0;$i < $_SESSION['index_tab'];$i++)
			{
			
				$sql_article = "SELECT * FROM ARTICLE WHERE ID_ARTICLE = " .$_SESSION['tab_article'][$i];
				if($res_a = mysql_query($sql_article))
				{
					$article = mysql_fetch_array($res_a);
				
		?>		
			
					
					<tr>
						<td class="cell_panier_article"><?php echo $article['NOM_ARTICLE']; ?></td>
						<td>
							<?php echo $_SESSION['tab_nb_article'][$i]; ?>
														
						</td>
						<td><?php echo $article['PRIX_ARTICLE']; ?></td>
						<td>
		<?php
		
					$red_offre = 0;
					$sql_offre = "SELECT * FROM OFFRE WHERE CODE_OFFRE = " .$article['CODE_OFFRE'];
					if($res_o = mysql_query($sql_offre))
					{
						if(mysql_num_rows($res_o) != 0)
						{
							$offre = mysql_fetch_array($res_o);
							$red_offre = $offre['REDUCTION_OFFRE'];
							echo "-" .$offre['REDUCTION_OFFRE'] ."%";
		
		
						}
		
					}
		?>				
						</td>
						<td>
							<?php
								$tva = ($article['PRIX_ARTICLE'] * $_SESSION['tab_nb_article'][$i]) - round(($article['PRIX_ARTICLE'] * $_SESSION['tab_nb_article'][$i]) / 1.196, 2);
								
								$red = $article['PRIX_ARTICLE'] * $red_offre / 100;
								$prix_ttc = ($article['PRIX_ARTICLE'] - $red) * $_SESSION['tab_nb_article'][$i]; 
								
								echo $prix_ttc;
								
								$Total_red += $red * $_SESSION['tab_nb_article'][$i];
								
								$Total_TVA += $tva;
								$Total_TTC += $prix_ttc;								
							?>
						
						</td>
					
					</tr>
					
					
		<?php
		
				}
		
			}
		
		
		?>		
					
			
				</table>
			</td>
		<tr>
			<td align="right" >
				<br/>
				<table class="tab_panier_totaux">
					
					<tr>
						<td>Total Réduction</td>
						<td><?php echo "-" .$Total_red ."€"; ?></td>
					</tr>	
					<tr>
						<td>Total TVA</td>
						<td><?php echo $Total_TVA ."€"; ?></td>
					</tr>	
					<tr class="gras_rouge">
						<td>Total TTC</td>
						<td><?php echo $Total_TTC ."€"; ?></td>
					</tr>		
											
	
				</table>
							
			</td>
		</tr>
		
		<form action="passer_commande.php" method="post">
		<tr>
			<td>
				
				<fieldset>
					
					<legend>Mode de paiement</legend>
					
					<table>
						<tr>
							<td colspan="2"><input type="radio" name="mode_paiement" value="cheque"  checked="checked" />Chèque</td>
						</tr>
						<tr>
							<td>
								<?php 
									if(isset($_POST['mode_paiement']))
									{
										if($_POST['mode_paiement'] == 'cb')
										{
											echo '<input type="radio" name="mode_paiement" value="cb"  checked="checked"/>Carte Bancaire&nbsp;&nbsp;&nbsp;';
								
										}
										else
										{
											echo '<input type="radio" name="mode_paiement" value="cb"  />Carte Bancaire&nbsp;&nbsp;&nbsp;';
										}
										
									}
									else
									{
										echo '<input type="radio" name="mode_paiement" value="cb"  />Carte Bancaire&nbsp;&nbsp;&nbsp;';
									
									}
									
								?>
								
							</td>
							<td>
								<?php if((!$num_carte) || (!$num_carte_val)){ ?>
									N° carte : <input type="text" name="num_cb" value="" maxlength="16" size="16" style="background-color:red;" />
								<?php } else { ?>
									N° carte : <input type="text" name="num_cb" value="<?php if($erreur_com)echo $_POST['num_cb']; ?>" maxlength="16" size="16" />
								<?php } ?>
								
								
							</td>
						</tr>
						<?php if(!$num_carte){ ?>
						<tr>
							<td colspan="2">Vous devez donner votre numéro de carte bancaire.</td>
						</tr>
						<?php }else if(!$num_carte_val){ ?>
						<tr>
							<td colspan="2">Le numéro de carte bancaire est invalide.</td>
						</tr>
						<?php } ?>
					</table>
					
				</fieldset>
				
						
				
			</td>
					
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="commander" value="Commander" /></td>
		</tr>
		</form>
	
	</table>
	
	<?php
	
		}
		else
		{
			echo '<br/><center>Votre commande a bien été enregistré.</center><br/>';
			echo '<center>Merci de votre fidélité</center>';
		
		}
	
	?>




</body>
</html>

<?php

	include("session.php");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css"  rel="stylesheet" href="style.css" />
<script type="text/javascript" src="site.js"></script>
<title> Votre Commande</title>
</head>

<body>

	<?php
	
		include("connect.php");
			
		
					
		
		$Total_red = 0;
		$Total_TVA = 0;
		$Total_TTC = 0;
		
		if(isset($_GET['id_commande']))
		{
		
			$sql_commande = "SELECT * FROM COMMANDE WHERE ID_COMMANDE = " .$_GET['id_commande'] ." AND ID_CLIENT = " .$_SESSION['id_client'] .";";
			if($res_c = mysql_query($sql_commande))
			{
				if(mysql_num_rows($res_c) != 0)
				{
				
					$commande = mysql_fetch_array($res_c);
					
					$sql_ligne_com = "SELECT * FROM COMMANDER WHERE ID_COMMANDE = " .$_GET['id_commande'];
					if($res_com = mysql_query($sql_ligne_com))
					{
			
	
	?>

						<center><h2>Commande n°<?php echo $commande['ID_COMMANDE'] ." du " .$commande['DATE_COMMANDE']; ?></h2></center>
						
						
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
							
								
							
								while($ligne_com = mysql_fetch_array($res_com))
								{
								
									$sql_article = "SELECT * FROM ARTICLE WHERE ID_ARTICLE = " .$ligne_com['ID_ARTICLE'];
									if($res_a = mysql_query($sql_article))
									{
										$article = mysql_fetch_array($res_a);
									
							?>		
								
										<tr>
											<td class="cell_panier_article"><?php echo $article['NOM_ARTICLE']; ?></td>
											<td>
												<?php echo $ligne_com['QUANTITE_COMMANDER']; ?>
																			
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
													$tva = ($article['PRIX_ARTICLE'] * $ligne_com['QUANTITE_COMMANDER']) - round(($article['PRIX_ARTICLE'] * $ligne_com['QUANTITE_COMMANDER']) / 1.196, 2);
													$red = $article['PRIX_ARTICLE'] * $red_offre / 100;
													$prix_ttc = ($article['PRIX_ARTICLE'] - $red) * $ligne_com['QUANTITE_COMMANDER']; 
													
													echo $prix_ttc;
													
													$Total_red += $red * $ligne_com['QUANTITE_COMMANDER'];
													
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
							
							
							<tr>
								<td>
									
									<fieldset>
										
										<legend>Mode de paiement</legend>
										<table>
											<tr>
												<td>Paiement par <?php echo $commande['MODE_PAIEMENT']; ?></td>
											</tr>
										</table>
										
										
									</fieldset>
									
											
									
								</td>
										
							</tr>
							<tr>
								<td><a href="liste_commande.php">Retour à la liste des commandes</a></td>
							</tr>
							
						
						</table>
	
	<?php
	
					}
					else
					{
						echo mysql_error();
					}
				
				}
				else
				{
					echo '<center>Aucune de vos commandes ne possède ce numéro.</center>';
				}
			
			}
			else
			{
				echo '<center>Aucune de vos commandes ne possède ce numéro.</center>';
			}
	
		}
		else
		{
			echo '<center>Aucune commande ne peut être affiché.</center>';
		
		}
	
	?>



</body>
</html>

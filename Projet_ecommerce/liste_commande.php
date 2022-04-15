<?php

	include("session.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css"  rel="stylesheet" href="style.css" />
<script type="text/javascript" src="site.js"></script>
<title>Liste des commandes</title>
</head>

<body>

	<center>Voici vos commande <?php echo $_SESSION['login']; ?></center>

	<table class="tab_commande">
		<tr>
			<td class="entete_tab_commande" align="center">&nbsp;Num Commande&nbsp;</td>
			<td class="entete_tab_commande" align="center">&nbsp;Mode paiement&nbsp;</td>
			<td class="entete_tab_commande" align="center">Date</td>
			<td class="entete_tab_commande" align="center">&nbsp;Total TTC&nbsp;</td>
		</tr>
		
		<?php
		
			include("connect.php");
		
					
			$sql_commande = "SELECT * FROM COMMANDE WHERE ID_CLIENT = " .$_SESSION['id_client'] ." ORDER BY DATE_COMMANDE DESC, ID_COMMANDE DESC;";
			if($res_c = mysql_query($sql_commande))
			{
				$blanc = true;
				while($commande = mysql_fetch_array($res_c))
				{
					$Total_TTC = 0;
				
					$sql_ligne_com = "SELECT * FROM COMMANDER WHERE ID_COMMANDE = " .$commande['ID_COMMANDE'];
					if($res_com = mysql_query($sql_ligne_com))
					{
						while($ligne_com = mysql_fetch_array($res_com))
						{
						
							$sql_article = "SELECT * FROM ARTICLE WHERE ID_ARTICLE = " .$ligne_com['ID_ARTICLE'];
							if($res_a = mysql_query($sql_article))
							{
								$article = mysql_fetch_array($res_a);
							
								$red_offre = 0;
								$sql_offre = "SELECT * FROM OFFRE WHERE CODE_OFFRE = " .$article['CODE_OFFRE'];
								if($res_o = mysql_query($sql_offre))
								{
									if(mysql_num_rows($res_o) != 0)
									{
										$offre = mysql_fetch_array($res_o);
										$red_offre = $offre['REDUCTION_OFFRE'];
													
					
									}
					
								}
					
								$red = $article['PRIX_ARTICLE'] * $red_offre / 100;
								$prix_ttc = ($article['PRIX_ARTICLE'] - $red) * $ligne_com['QUANTITE_COMMANDER'];; 
																					
								$Total_TTC += $prix_ttc;							
											
							}
					
						}
						
					
					}
					
					
					if($blanc)
					{
						echo '<tr><td align="center" class="cell_tab_comm_blanche"><a href="commande.php?id_commande=' .$commande['ID_COMMANDE'] .'">' .$commande['ID_COMMANDE'] .'</a></td>';
						echo '<td align="center" class="cell_tab_comm_blanche"><a href="commande.php?id_commande=' .$commande['ID_COMMANDE'] .'">' .$commande['MODE_PAIEMENT'] .'</a></td>';
						echo '<td align="center" class="cell_tab_comm_blanche"><a href="commande.php?id_commande=' .$commande['ID_COMMANDE'] .'">' .$commande['DATE_COMMANDE'] .'</a></td>';		
						echo '<td align="center" class="cell_tab_comm_blanche"><a href="commande.php?id_commande=' .$commande['ID_COMMANDE'] .'">' .$Total_TTC .'€</a></td></tr>';
						
						$blanc = false;
						
					}
					else
					{
						echo '<tr ><td align="center" class="cell_tab_comm_bleu"><a href="commande.php?id_commande=' .$commande['ID_COMMANDE'] .'">' .$commande['ID_COMMANDE'] .'</a></td>';
						echo '<td align="center" class="cell_tab_comm_bleu"><a href="commande.php?id_commande=' .$commande['ID_COMMANDE'] .'">' .$commande['MODE_PAIEMENT'] .'</a></td>';
						echo '<td align="center" class="cell_tab_comm_bleu"><a href="commande.php?id_commande=' .$commande['ID_COMMANDE'] .'">' .$commande['DATE_COMMANDE'] .'</a></td>';	
						echo '<td align="center" class="cell_tab_comm_bleu"><a href="commande.php?id_commande=' .$commande['ID_COMMANDE'] .'">' .$Total_TTC .'€</a></td></tr>';	
							
						$blanc = true;
					
					
					}
					
				
				}
			
			
			}
		
		?>
		
		
	</table>




</body>
</html>

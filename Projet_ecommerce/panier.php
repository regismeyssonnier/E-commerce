<?php

	include("session.php");



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css"  rel="stylesheet" href="style.css" />
<script type="text/javascript" src="site.js"></script>
<title>Panier</title>
</head>

<body>

	<?php
	
		include("connect.php");
	
				
		if(isset($_GET['ajout_article']))
		{
			$trouver = false;
			for($i = 0;$i < $_SESSION['index_tab'];$i++)
			{
				if($_SESSION['tab_article'][$i] == $_GET['ajout_article'])
				{
					$_SESSION['tab_nb_article'][$i]++;
					$trouver = true;
					break;
				}
			
			}
			
			if(!$trouver)
			{
				$_SESSION['tab_article'][$_SESSION['index_tab']] = $_GET['ajout_article'];
				$_SESSION['tab_nb_article'][$_SESSION['index_tab']] = 1;
				$_SESSION['index_tab']++;
			}
			
		}
		else if(isset($_SESSION['ajout_article']))
		{
			if($_SESSION['ajout_article'] != '')
			{
				$trouver = false;
				for($i = 0;$i < $_SESSION['index_tab'];$i++)
				{
					if($_SESSION['tab_article'][$i] == $_SESSION['ajout_article'])
					{
						$_SESSION['tab_nb_article'][$i]++;
						$trouver = true;
						break;
					}
				
				}
				
				if(!$trouver)
				{
					$_SESSION['tab_article'][$_SESSION['index_tab']] = $_SESSION['ajout_article'];
					$_SESSION['tab_nb_article'][$_SESSION['index_tab']] = 1;
					$_SESSION['index_tab']++;
				}
				
				$_SESSION['ajout_article'] = '';
				
			}
		
		}
		
		if(isset($_GET['vider']))
		{
			$_SESSION['index_tab'] = 0;
			$_SESSION['tab_article'] = array();
			$_SESSION['tab_nb_article'] = array();
		
		
		}
		
		if(isset($_POST['type_submit']))
		{
						
			if($_POST['type_submit'] == 'p_moins')
			{

				for($i = 0;$i < $_SESSION['index_tab'];$i++)
				{
					if($_SESSION['tab_article'][$i] == $_POST['id_article'])
					{
						if($_SESSION['tab_nb_article'][$i] > 1)
							$_SESSION['tab_nb_article'][$i]--;
						
						break;
					}
				
				}
			
			}
			else if($_POST['type_submit'] == 'p_plus')
			{
				for($i = 0;$i < $_SESSION['index_tab'];$i++)
				{
					if($_SESSION['tab_article'][$i] == $_POST['id_article'])
					{
						$_SESSION['tab_nb_article'][$i]++;
						
						break;
					}
				
				}
			
			
			}
			else if($_POST['type_submit'] == 'p_suppr')
			{
			
				$trouver = false;
				for($i = 0;$i < $_SESSION['index_tab'];$i++)
				{
					if($_SESSION['tab_article'][$i] == $_POST['id_article'])
					{
						$trouver = true;
						break;
					}
					
				
				}
				
				if($trouver)
				{
				
					for($j = $i;$j < ($_SESSION['index_tab'] - 1);$j++)
					{
						$_SESSION['tab_article'][$j] = $_SESSION['tab_article'][$j+1];
						$_SESSION['tab_nb_article'][$j] = $_SESSION['tab_nb_article'][$j+1];
					}
					
					$_SESSION['index_tab']--;
					
				}
				
			
			
			}
		
		}
		
		
					
		$Total_red = 0;
		$Total_TVA = 0;
		$Total_TTC = 0;
	
	?>

	<center><h2>Votre Panier</h2></center>

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
						<td>Retirer</td>
					</tr>
			
		<?php
		
			for($i = 0;$i < $_SESSION['index_tab'];$i++)
			{
			
				$sql_article = "SELECT * FROM ARTICLE WHERE ID_ARTICLE = " .$_SESSION['tab_article'][$i];
				if($res_a = mysql_query($sql_article))
				{
					$article = mysql_fetch_array($res_a);
				
		?>		
			
					<form action="panier.php" method="post" id="article_<?php echo $_SESSION['tab_article'][$i]; ?>">
					<input type="hidden"  name="id_article" value="<?php echo $_SESSION['tab_article'][$i]; ?>"  />
					<input type="hidden" name="type_submit" value=""  />
					<tr>
						<td class="cell_panier_article"><?php echo $article['NOM_ARTICLE']; ?></td>
						<td>
							<img src="panier_moins.gif" alt="moins" onclick="Soumettre_article('article_<?php echo $_SESSION['tab_article'][$i]; ?>', 'p_moins');" />
							<?php echo $_SESSION['tab_nb_article'][$i]; ?>
							<img src="panier_plus.gif" alt="plus" onclick="Soumettre_article('article_<?php echo $_SESSION['tab_article'][$i]; ?>', 'p_plus');" />
							
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
						<td><img src="panier_suppr.gif" alt="supprimer" onclick="Soumettre_article('article_<?php echo $_SESSION['tab_article'][$i]; ?>', 'p_suppr');" /></td>
					</tr>
					</form>
					
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
			<td align="right">
			<?php if($_SESSION['index_tab'] > 0){ ?>
			<form action="passer_commande.php" method="post">
				<input type="submit" name="passer_commander" value="Passer votre comande"  />
			</form>
			<?php } ?>
			</td>
					
		</tr>
	
	</table>




</body>
</html>

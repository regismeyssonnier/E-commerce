<?php

	if(isset($_GET['id_article']))
		$sql_article = "SELECT * FROM ARTICLE WHERE ID_ARTICLE = " .$_GET['id_article'];
	
	if(isset($_POST['id_article']))
		$sql_article = "SELECT * FROM ARTICLE WHERE ID_ARTICLE = " .$_POST['id_article'];
	
			
	if($res_a = mysql_query($sql_article))
	{
		if(mysql_num_rows($res_a) != 0)
		{
			$article = mysql_fetch_array($res_a);
			
			
			echo '<table class="tab_article">';
			echo '<tr><td colspan="3" class="cell_entete_article">' .$article['NOM_ARTICLE'] .'</td></tr>';
			echo '<tr><td rowspan="2" class="cell_photo">';
			
			$path_im = "Apercu/" .$article['ID_ARTICLE'] ."_apercu.jpg";
			if(file_exists($path_im))
			{
				echo '<img src="' .$path_im .'" width="60" height="60"/>';
			
			}
			else
			{
				echo "no photo";
			}
			
			echo '</td>';
			echo '<td>' .$article['NOM_ARTICLE'] .'</td>';
			
			echo '<td rowspan="2" class="cell_panier" align="center" onclick="Afficher_panier(' .$article['ID_ARTICLE'].');">';
			echo '<img src="caddy.gif" alt="ajouter panier"  /><br/>';
			echo '<span class="texte_petit">Ajouter au panier</span>';
			echo '</td>';
			
			
			echo '</tr>';
			
			$aff_lib_o = true;
			$poss_offre = false;
			$offre = '';
			$nouv_prix = 0;
			
			$sql_offre = "SELECT * FROM OFFRE WHERE CODE_OFFRE = " .$article['CODE_OFFRE'];
			if($res_o = mysql_query($sql_offre))
			{
				if(mysql_num_rows($res_o) != 0)
				{
					$poss_offre = true;
					
					$offre = mysql_fetch_array($res_o);
					
					$sql_meta_offre = "SELECT AFFICHAGE_CHAMP FROM META_OFFRE WHERE NOM_CHAMP = 'LIBELLE_OFFRE';";
					if($res_mto = mysql_query($sql_meta_offre))
					{
						$lib_offre = mysql_fetch_array($res_mto);
						$aff_lib_o = $lib_offre['AFFICHAGE_CHAMP'];
					
					}
					
					
					$nouv_prix = $article['PRIX_ARTICLE'] - ($article['PRIX_ARTICLE'] * ($offre['REDUCTION_OFFRE'] / 100));
									
				}
			
			}
			
			if($poss_offre)
				echo '<tr><td>Prix: <span class="barre">' .$article['PRIX_ARTICLE'] .'</span> €</td></tr>';
			else
				echo '<tr><td>Prix: ' .$article['PRIX_ARTICLE'] .' €</td></tr>';
			
			echo '</table>';
			
			echo '<table class="tab_car_article">';
			
			if($poss_offre)
			{
				if($aff_lib_o)
					echo '<tr><td>' .$offre['LIBELLE_OFFRE'] .'</td></tr>';
			
				echo '<tr><td><h2 class="rouge">Réduction -' .$offre['REDUCTION_OFFRE'] .'% soit un prix de ' .$nouv_prix .'€</h2></td></tr>';
					
			
			}
			
						
			$aff_lib = true;
			$sql_meta_art = "SELECT AFFICHAGE_CHAMP FROM META_ARTICLE WHERE NOM_CHAMP = 'LIBELLE_ARTICLE';";
			if($res_mta = mysql_query($sql_meta_art))
			{
				$lib_art = mysql_fetch_array($res_mta);
				$aff_lib = $lib_art['AFFICHAGE_CHAMP'];
			
			}
			
			if($aff_lib)
			{
				echo '<tr><td class="souligne">Description:</td></tr>';
				echo '<tr><td>' .$article['LIBELLE_ARTICLE'] .'</td></tr>';
				echo '<tr><td><br/></td></tr>';
			}
			
			$sql_car = "SELECT * FROM CARACTERISTIQUE, ART_CAT_CAR, ARTICLE 
					    WHERE CARACTERISTIQUE.CODE_CARACTERISTIQUE = ART_CAT_CAR.CODE_CARACTERISTIQUE_A 
						AND ART_CAT_CAR.ID_ARTICLE_A = ARTICLE.ID_ARTICLE 
						AND ID_ARTICLE = " .$article['ID_ARTICLE'];
						
									
			if($res_c = mysql_query($sql_car))
			{
				if(mysql_num_rows($res_c) != 0)
				{
					echo '<tr><td class="souligne">Caractéristique:</td></tr>';
					while($caract = mysql_fetch_array($res_c))
					{
						echo '<tr><td>- ' .$caract['LIBELLE_CARACTERISTIQUE'] .'</td></tr>';
					}
					echo '<tr><td><br/></td></tr>';
				}
				
			}
			else
			{
				echo mysql_error();
			}
			
			
			echo '</table>';
			
			$sql_art_ass = "SELECT A2.* FROM ARTICLE A1, ARTICLE A2, EST_ASSOCIE 
						    WHERE A1.ID_ARTICLE = EST_ASSOCIE.ID_ARTICLE1
							AND EST_ASSOCIE.ID_ARTICLE2 = A2.ID_ARTICLE
							AND A1.ID_ARTICLE = " .$article['ID_ARTICLE'] 
						  ." ORDER BY A2.NOM_ARTICLE;";
						  						

			if($res_art_ass = mysql_query($sql_art_ass))
			{
				if(mysql_num_rows($res_art_ass) != 0)
				{
					echo '<table class="tab_ass_article">';
					echo '<tr><td class="souligne">Vous êtes peut-être aussi intéressés par ces articles indispensables :</td></tr>';
					while($art_ass = mysql_fetch_array($res_art_ass))
					{
						echo '<tr><td>- <a href="index.php?id_article=' .$art_ass['ID_ARTICLE'] .'&categ=' .$categ .'">'  .$art_ass['NOM_ARTICLE'] ." - " .$art_ass['PRIX_ARTICLE'] ."€ </a>&nbsp;";
						$sql_offre = "SELECT * FROM OFFRE WHERE CODE_OFFRE = " .$art_ass['CODE_OFFRE'];
						if($res_o = mysql_query($sql_offre))
						{
							$offre = mysql_fetch_array($res_o);
							echo '<span class="rouge">' .'promo -'.$offre['REDUCTION_OFFRE'] .'%</span>';
						}
						
						echo '</td></tr>';
					
					}
					
					echo '</table>';
				}
			}
			else
			{
				echo mysql_error();
			}
			
			
		}
		else
		{
			echo '<center>Aucun article pour ce code.</center>';
		
		}
		
		
	}
	else
	{
		echo mysql_error();
	
	}












?>
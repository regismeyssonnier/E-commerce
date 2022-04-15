<?php
			
	$page = 1;
	$article_par_page = 5;
	$sql_article = '';
	
	Function Recherche_Categorie($c, &$tab, &$i, &$trouver_cat)
	{
		$sql_a = "SELECT CODE_CATEGORIE_A FROM ART_CAT_CAR WHERE CODE_CATEGORIE_A = " .$c;
		if($res_a = mysql_query($sql_a))
		{
			if(mysql_num_rows($res_a) != 0)
			{
				$tab[$i] = $c;
				$i++;
				$trouver_cat = true;
			
			}
		
		}
							
		$sql_cat = "SELECT CODE_CATEGORIE FROM CATEGORIE WHERE CODE_CAT = " .$c;
		if($res_c = mysql_query($sql_cat))
		{
			while($cat = mysql_fetch_array($res_c))
			{
				Recherche_Categorie($cat['CODE_CATEGORIE'], $tab, $i, $trouver_cat);
			
			}
		
		
		}
		else
		{
		
		
		}					
	
	
	}
		

	Function Meta_Modele_Recherche($rech_texte, &$sql_article)
	{
	
		$and = true;
	
		//Meta article	   
		$sql_meta_article_t = "SELECT NOM_CHAMP FROM META_ARTICLE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%text%' OR TYPE_CHAMP LIKE '%char%');";
		$res_ma_t = mysql_query($sql_meta_article_t);
		if(mysql_num_rows($res_ma_t) != 0)
		{
			while($mat = mysql_fetch_array($res_ma_t))
			{
				if($and)
				{
					$sql_article .= " AND (";
					$and = false;
				}
				else
				{
					$sql_article .= " OR ";
				}
				$sql_article .=  $mat['NOM_CHAMP'] ." LIKE '%" .addslashes($rech_texte) ."%' ";
			}
		}
		
		if(is_numeric($rech_texte))
		{
			$sql_meta_article_n = "SELECT NOM_CHAMP FROM META_ARTICLE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%int%' OR TYPE_CHAMP = 'float' OR TYPE_CHAMP = 'double' OR TYPE_CHAMP = 'decimal');";
			$res_ma_n = mysql_query($sql_meta_article_n);
			if(mysql_num_rows($res_ma_n) != 0)
			{
				while($man = mysql_fetch_array($res_ma_n))
				{
					if($and)
					{
						$sql_article .= " AND (";
						$and = false;
					}
					else
					{
						$sql_article .= " OR ";
					}
					$sql_article .= $man['NOM_CHAMP'] ." = " .addslashes($rech_texte) ." ";
				
				}
			}
		
		}
		
		//Meta caracteristique
		$sql_meta_caracteristique_t = "SELECT NOM_CHAMP FROM META_CARACTERISTIQUE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%text%' OR TYPE_CHAMP LIKE '%char%');";
		$res_mc_t = mysql_query($sql_meta_caracteristique_t);
		if(mysql_num_rows($res_mc_t) != 0)
		{
			while($mct = mysql_fetch_array($res_mc_t))
			{
				if($and)
				{
					$sql_article .= " AND (";
					$and = false;
				}
				else
				{
					$sql_article .= " OR ";
				}
				$sql_article .= $mct['NOM_CHAMP'] ." LIKE '%" .addslashes($rech_texte) ."%' ";
			}
		}
		
		if(is_numeric($rech_texte))
		{
			$sql_meta_caracteristique_n = "SELECT NOM_CHAMP FROM META_CARACTERISTIQUE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%int%' OR TYPE_CHAMP = 'float' OR TYPE_CHAMP = 'double' OR TYPE_CHAMP = 'decimal');";
			$res_mc_n = mysql_query($sql_meta_caracteristique_n);
			if(mysql_num_rows($res_mc_n) != 0)
			{
				while($mcn = mysql_fetch_array($res_mc_n))
				{
					if($and)
					{
						$sql_article .= " AND (";
						$and = false;
					}
					else
					{
						$sql_article .= " OR ";
					}
					$sql_article .= $mcn['NOM_CHAMP'] ." = " .addslashes($rech_texte) ." ";
				
				}
			}
		
		}
		
		//Meta categorie
		$sql_meta_categorie_t = "SELECT NOM_CHAMP FROM META_CATEGORIE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%text%' OR TYPE_CHAMP LIKE '%char%');";
		$res_mc_t = mysql_query($sql_meta_categorie_t);
		if(mysql_num_rows($res_mc_t) != 0)
		{
			while($mct = mysql_fetch_array($res_mc_t))
			{
				if($and)
				{
					$sql_article .= " AND (";
					$and = false;
				}
				else
				{
					$sql_article .= " OR ";
				}
				$sql_article .= $mct['NOM_CHAMP'] ." LIKE '%" .addslashes($rech_texte) ."%' ";
			}
		}
		
		if(is_numeric($rech_texte))
		{
			$sql_meta_categorie_n = "SELECT NOM_CHAMP FROM META_CATEGORIE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%int%' OR TYPE_CHAMP = 'float' OR TYPE_CHAMP = 'double' OR TYPE_CHAMP = 'decimal');";
			$res_mc_n = mysql_query($sql_meta_categorie_n);
			if(mysql_num_rows($res_mc_n) != 0)
			{
				while($mcn = mysql_fetch_array($res_mc_n))
				{
					if($and)
					{
						$sql_article .= " AND (";
						$and = false;
					}
					else
					{
						$sql_article .= " OR ";
					}
					$sql_article .= $mcn['NOM_CHAMP'] ." = " .addslashes($rech_texte) ." ";
				
				}
			}
		
		}
		
		//Meta mot cle
		$sql_meta_mot_cle_t = "SELECT NOM_CHAMP FROM META_MOT_CLE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%text%' OR TYPE_CHAMP LIKE '%char%');";
		$res_mmc_t = mysql_query($sql_meta_mot_cle_t);
		if(mysql_num_rows($res_mmc_t) != 0)
		{
			while($mmct = mysql_fetch_array($res_mmc_t))
			{
				if($and)
				{
					$sql_article .= " AND (";
					$and = false;
				}
				else
				{
					$sql_article .= " OR ";
				}
				$sql_article .= $mmct['NOM_CHAMP'] ." LIKE '%" .addslashes($rech_texte) ."%' ";
			}
		}
		
		if(is_numeric($rech_texte))
		{
			$sql_meta_mot_cle_n = "SELECT NOM_CHAMP FROM META_MOT_CLE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%int%' OR TYPE_CHAMP = 'float' OR TYPE_CHAMP = 'double' OR TYPE_CHAMP = 'decimal');";
			$res_mmc_n = mysql_query($sql_meta_mot_cle_n);
			if(mysql_num_rows($res_mmc_n) != 0)
			{
				while($mmcn = mysql_fetch_array($res_mmc_n))
				{
					if($and)
					{
						$sql_article .= " AND (";
						$and = false;
					}
					else
					{
						$sql_article .= " OR ";
					}
					$sql_article .= $mmcn['NOM_CHAMP'] ." = " .addslashes($rech_texte) ." ";
				
				}
			}
		
		}
		
		//Meta offre
		$sql_meta_offre_t = "SELECT NOM_CHAMP FROM META_OFFRE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%text%' OR TYPE_CHAMP LIKE '%char%');";
		$res_mo_t = mysql_query($sql_meta_offre_t);
		if(mysql_num_rows($res_mo_t) != 0)
		{
			while($mot = mysql_fetch_array($res_mo_t))
			{
				if($and)
				{
					$sql_article .= " AND (";
					$and = false;
				}
				else
				{
					$sql_article .= " OR ";
				}
				$sql_article .= $mot['NOM_CHAMP'] ." LIKE '%" .addslashes($rech_texte) ."%' ";
			}
		}
		
		if(is_numeric($rech_texte))
		{
			$sql_meta_offre_n = "SELECT NOM_CHAMP FROM META_OFFRE WHERE RECHERCHE_CHAMP = 1 AND (TYPE_CHAMP LIKE '%int%' OR TYPE_CHAMP = 'float' OR TYPE_CHAMP = 'double' OR TYPE_CHAMP = 'decimal');";
			$res_mo_n = mysql_query($sql_meta_offre_n);
			if(mysql_num_rows($res_mo_n) != 0)
			{
				while($mon = mysql_fetch_array($res_mo_n))
				{
					if($and)
					{
						$sql_article .= " AND (";
						$and = false;
					}
					else
					{
						$sql_article .= " OR ";
					}
					$sql_article .= $mon['NOM_CHAMP'] ." = " .addslashes($rech_texte) ." ";
				
				}
			}
		
		}
		
		$sql_article .= " ) ";
		
	
	}
	
	$trouver_cat = false;
	$rech = '';	
	$rech_texte = '';			
	if(isset($_POST['rechercher']) || isset($_POST['text_rech']))
	{
		
		if($_POST['text_rech'] != '')
		{
			
			$rech_texte = stripslashes($_POST['text_rech']);
			
			//Requete de recherche optimisé
			$sql_article = "SELECT DISTINCT ID_ARTICLE, NOM_ARTICLE, PRIX_ARTICLE, A.CODE_OFFRE
							FROM ARTICLE AS A
							LEFT JOIN OFFRE AS O ON A.CODE_OFFRE = O.CODE_OFFRE
							LEFT JOIN IDENTIFIER AS I ON I.ID_ARTICLE_I = A.ID_ARTICLE
							LEFT JOIN ART_CAT_CAR AS ART ON ART.ID_ARTICLE_A = A.ID_ARTICLE
							LEFT JOIN MOT_CLE AS M ON I.ID_MOT_CLE_I = M.ID_MOT_CLE
							LEFT JOIN CARACTERISTIQUE AS C ON ART.CODE_CARACTERISTIQUE_A = C.CODE_CARACTERISTIQUE
							LEFT JOIN CATEGORIE AS CAT ON CAT.CODE_CATEGORIE = ART.CODE_CATEGORIE_A
							WHERE 1 ";
											
			Meta_Modele_Recherche($rech_texte, $sql_article);	
			
								   
			$trouver_cat = true;
			$rech = 'rech_texte';
			
			
		}
		
		
	}
	else if(isset($_GET['rech']))
	{
	
		$rech_texte = stripslashes($_GET['rech']);
		
		//Requete de recherche optimisé
		$sql_article = "SELECT DISTINCT ID_ARTICLE, NOM_ARTICLE, PRIX_ARTICLE, A.CODE_OFFRE
						FROM ARTICLE AS A
						LEFT JOIN OFFRE AS O ON A.CODE_OFFRE = O.CODE_OFFRE
						LEFT JOIN IDENTIFIER AS I ON I.ID_ARTICLE_I = A.ID_ARTICLE
						LEFT JOIN ART_CAT_CAR AS ART ON ART.ID_ARTICLE_A = A.ID_ARTICLE
						LEFT JOIN MOT_CLE AS M ON I.ID_MOT_CLE_I = M.ID_MOT_CLE
						LEFT JOIN CARACTERISTIQUE AS C ON ART.CODE_CARACTERISTIQUE_A = C.CODE_CARACTERISTIQUE
						LEFT JOIN CATEGORIE AS CAT ON CAT.CODE_CATEGORIE = ART.CODE_CATEGORIE_A
						WHERE 1 ";
											   
		Meta_Modele_Recherche($rech_texte, $sql_article);	
		
								   
		$trouver_cat = true;
		$rech = 'rech_texte';
		
			
	}
	else
	{
			
		if($categ == 0)
		{
			$sql_article = "SELECT * FROM ARTICLE ";
			$trouver_cat = true;	
		}
		else
		{
			$sql_article = "SELECT DISTINCT ID_ARTICLE, NOM_ARTICLE, PRIX_ARTICLE, LIBELLE_ARTICLE, CODE_OFFRE FROM ARTICLE, ART_CAT_CAR 
							WHERE ARTICLE.ID_ARTICLE = ART_CAT_CAR.ID_ARTICLE_A ";
			
			$fin = false;
			
			$i = 0;
			$tab = array();
			
											
			Recherche_Categorie($categ, $tab, $i, $trouver_cat);
			for($j = 0;$j < $i;$j++)
			{
				if($j == 0)
				{
					$fin = true;
					$sql_article .= " AND (ART_CAT_CAR.CODE_CATEGORIE_A = " .$tab[$j];
				}
				else
					$sql_article .= " OR ART_CAT_CAR.CODE_CATEGORIE_A = " .$tab[$j];
			
			}
			
			if($fin == true)$sql_article .= ")";
			
					
		}
		
				
	}
	
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
								
	}
	
	
	
	if($trouver_cat)
	{				
	
		if($res_a = mysql_query($sql_article))
		{
			$nb_article = mysql_num_rows($res_a);
			$max_page = $nb_article / $article_par_page;
			if(($max_page > 0) && ($max_page < 1))$max_page = 1;
			else $max_page = ceil($max_page);
			
			$index = ($page - 1) * $article_par_page;
								
			$sql_article .= "LIMIT $index, $article_par_page";
			
			
			if( (isset($_POST['cat_princ']) && !isset($_POST['rech_cat'])) || isset($_POST['connecter']) || isset($_GET['deconnexion']) || isset($_GET['retour']))
			{
				$sql_article = $_SESSION['sql_article'];
				$categ = $_SESSION['categ'];
				$page = $_SESSION['page'];
				$rech = $_SESSION['rech'];
				$rech_texte = $_SESSION['rech_texte'];
			
			}
									
			$_SESSION['sql_article'] = $sql_article;
			$_SESSION['categ'] = $categ;				
			$_SESSION['page'] = $page;
			$_SESSION['rech'] = $rech;
			$_SESSION['rech_texte'] = $rech_texte;
									
					
			if($nb_article != 0)
			{
				
				if($res_art = mysql_query($sql_article))
				{
					
					$ch_page = "";
					$ch_psuiv = "";
					$ch_pprec = "";
	
		
	
	?>
<link href="style.css" rel="stylesheet" type="text/css" />

	
	
		<table class="tab_liste_article">
			<tr>
				<td align="center" class="entete_liste_art">
					Liste des articles
				</td>
			</tr>
			<tr>
				<td align="center" class="cell_num_page">
					<table class="tab_page">
						<tr>
							<td class="cell_pgsp">
							
							<?php
										
								$pp = $page - 1;
								$ch_pprec = '<a href="index.php?page=' .$pp;  
								
								if($categ != 0)
								{
									$ch_pprec .= '&categ=' .$categ;
								}
								else if($rech == "rech_texte")
								{
									$ch_pprec .= '&rech=' .$rech_texte;
								}											
																															
								$ch_pprec .= '" ><< page prec</a>';
							
								if($page > 1)						
									echo $ch_pprec;
							
							?>
							
							
							</td>
							<td align="center" class="cell_page">
							
							<?php
										
								$ch_page = '<div class="div_blanc">page ';
									
							
								$i = $page - 5;
								if($page <= 5)
									$i = 1;
									
								$max = $page + 5;
								if($max > $max_page)
									$max = $max_page;
								
								
								while($i <= $max)
								{
									if($i == $page)
										$ch_page .= '<span class="lien_rouge">' .$i .'</span>';
									else
									{
										$ch_page .= '<a href="index.php?page=' .$i;
										
										if($categ != 0)
										{
											$ch_page .= '&categ=' .$categ;
										}
										else if($rech == "rech_texte")
										{
											$ch_page .= '&rech=' .$rech_texte;
											
										}									
																							
										$ch_page .= '" class="lien_blanc">' .$i .'</a>';
										 
									}
										
									if($i < $max)
										$ch_page .= " - ";
										
									$i++;
								
								}	
							
								$ch_page .= " sur $max_page pages";
								$ch_page .= "</div>";
								
								echo $ch_page;
																	
							?>
							
							
							
							</td>
							<td class="cell_pgsp" align="right">
							
							<?php
							
								$ps = $page + 1;
								$ch_psuiv = '<a href="index.php?page=' .$ps;
								
								if($categ != 0)
								{
									$ch_psuiv .= '&categ=' .$categ;
								}
								else if($rech == "rech_texte")
								{
									$ch_psuiv .= '&rech=' .$rech_texte;
								}	
																																										
								$ch_psuiv .= '" class="lien_blanc">page suiv >></a>';
							
								if($page < $max_page)						
									echo $ch_psuiv;
							
							?>
							
							
							
							</td>
							
						</tr>							
					</table>
				
				</td>
			</tr>
			
			<?php
				
				$blanc = true;
				
				while($article = mysql_fetch_array($res_art))
				{
				
					
					if($blanc)
					{
					
			?>
			
						<tr >
							<td class="cell_article">
							
								<table class="tab_pres_article">
									<tr>
										<td rowspan="2" class="cell_photo">
										<?php
										
											$path_im = "Apercu/" .$article['ID_ARTICLE'] ."_apercu.jpg";
											if(file_exists($path_im))
											{
												echo '<img src="' .$path_im .'" width="60" height="60"/>';
											
											}
											else
											{
												echo "no photo";
											}
										
										
										
										?>
										</td>
										<td>
										<?php 
										
											echo '<a href="index.php?id_article=' .$article['ID_ARTICLE'] .'&categ=' .$categ .'">' .$article['NOM_ARTICLE'] ."</a>";
											
										?>
										</td>
										<td >
										<?php
											
											$off = true;
											$offre = '';
											$sql_offre = "SELECT * FROM OFFRE WHERE CODE_OFFRE = " .$article['CODE_OFFRE'];
											if($res_o = mysql_query($sql_offre))
											{
												$offre = mysql_fetch_array($res_o);
												
												$aff_red = true;
												$sql_meta_offre = "SELECT AFFICHAGE_CHAMP FROM META_OFFRE WHERE NOM_CHAMP = 'REDUCTION_OFFRE';";
												if($res_mto = mysql_query($sql_meta_offre))
												{
													$red_offre = mysql_fetch_array($res_mto);
													$aff_red = $red_offre['AFFICHAGE_CHAMP'];
												
												}
												
																							
												if($aff_red)
													echo '<h2 class="rouge">' ."Réduction -" .$offre['REDUCTION_OFFRE'] ."%</h2>";
										
												
											}
											else
											{
												$off = false;													

											}
											
																						
										?>
										</td>
										
										<td rowspan="2" class="cell_panier" align="center" onclick="Afficher_panier(<?php echo $article['ID_ARTICLE']; ?>);">
											<img src="caddy.gif" alt="ajouter panier"  /><br/>
											<span class="texte_petit">Ajouter au panier</span>
										</td>
										
									</tr>
									<tr>
										<td><?php echo $article['PRIX_ARTICLE'] ."€"; ?></td>
										<td>
											<?php 
											
												if($off)
												{
													
													$aff_lib = true;
													$sql_meta_offre = "SELECT AFFICHAGE_CHAMP FROM META_OFFRE WHERE NOM_CHAMP = 'LIBELLE_OFFRE';";
													if($res_mto = mysql_query($sql_meta_offre))
													{
														$lib_offre = mysql_fetch_array($res_mto);
														$aff_lib = $lib_offre['AFFICHAGE_CHAMP'];
													
													}
													
													if($aff_lib)
														echo $offre['LIBELLE_OFFRE'];
													
												} 
										
										
											?>
										</td>
									</tr>
								</table>
							
							</td>								
						</tr>
			
			
			<?php
						
						$blanc = false;
						
					}
					else
								
					{
			?>
			
						<tr>
							<td class="cell_article2">
							
								<table class="tab_pres_article">
									<tr>
										<td rowspan="2" class="cell_photo">
										<?php
										
											$path_im = "Apercu/" .$article['ID_ARTICLE'] ."_apercu.jpg";
											if(file_exists($path_im))
											{
												echo '<img src="' .$path_im .'" width="60" height="60"/>';
											
											}
											else
											{
												echo "no photo";
											}
										
										
										
										?>
										</td>
										<td>
										<?php 
											
											echo '<a href="index.php?id_article=' .$article['ID_ARTICLE'] .'&categ=' .$categ .'">' .$article['NOM_ARTICLE'] ."</a>";
											
										?>
										</td>
										<td >
										<?php
											
											$off = true;
											$offre = '';
											$sql_offre = "SELECT * FROM OFFRE WHERE CODE_OFFRE = " .$article['CODE_OFFRE'];
											if($res_o = mysql_query($sql_offre))
											{
												$offre = mysql_fetch_array($res_o);
												echo '<h2 class="rouge">Réduction -' .$offre['REDUCTION_OFFRE'] ."%</h2>";
												
											}
											else
											{
												$off = false;
											
											}
											
																						
										?>
										</td>
										
										<td rowspan="2" class="cell_panier" align="center" onclick="Afficher_panier(<?php echo $article['ID_ARTICLE']; ?>);">
											<img src="caddy.gif" alt="ajouter panier"  /><br/>
											<span class="texte_petit">Ajouter au panier</span>
										</td>
										
									</tr>
									<tr>
										<td><?php echo $article['PRIX_ARTICLE'] ."€"; ?></td>
										<td><?php if($off)echo $offre['LIBELLE_OFFRE']; ?></td>
									</tr>
								</table>
							
							</td>								
						</tr>
			
			
			
			<?php
						$blanc = true;
					
					}
					

		
				
				
				}
							
			?>
			
			<tr>
				<td align="center" class="cell_num_page">
					<table class="tab_page">
						<tr>
							<td class="cell_pgsp">
							
							<?php
										
								if($page > 1)						
									echo $ch_pprec;
							
							?>
							
							
							</td>
							<td align="center" class="cell_page">
							
							<?php
										
								echo $ch_page;
							
							?>
							
							
							
							</td>
							<td class="cell_pgsp" align="right">
							
							<?php
										
								if($page < $max_page)						
										echo $ch_psuiv;
										
							?>
							
							
							</td>
							
						</tr>							
					</table>
				
				</td>
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
				echo "<center>Il n'y a plus d'article dans cette catégorie ou corespondant à votre recherche.</center>";
			
			}
	
		}
		else
		{
		
			echo mysql_error();
		
		}
		
	}
	else
	{
		echo "<center>Désolé, il n'y a plus aucun article dans cette catégorie ou aucun article ne correspond à votre recherche.</center>";
		$_SESSION['categ'] = $categ;
			
	}

?>
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
			
				$page = 1;
				$article_par_page = 2;
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
				
				$trouver_cat = false;
				$rech = '';	
				$rech_texte = '';			
				if(isset($_POST['rechercher']) || isset($_POST['text_rech']))
				{
					//Requete de recherche optimisé
					if($_POST['text_rech'] != '')
					{
						$sql_article = "SELECT DISTINCT ID_ARTICLE, NOM_ARTICLE, PRIX_ARTICLE, A.CODE_OFFRE
										FROM ARTICLE AS A
										LEFT JOIN OFFRE AS O ON A.CODE_OFFRE = O.CODE_OFFRE
										INNER JOIN IDENTIFIER AS I ON I.ID_ARTICLE_I = A.ID_ARTICLE
										INNER JOIN ART_CAT_CAR AS ART ON ART.ID_ARTICLE_A = A.ID_ARTICLE
										INNER JOIN MOT_CLE AS M ON I.ID_MOT_CLE_I = M.ID_MOT_CLE
										INNER JOIN CARACTERISTIQUE AS C ON ART.CODE_CARACTERISTIQUE_A = C.CODE_CARACTERISTIQUE
										INNER JOIN CATEGORIE AS CAT ON CAT.CODE_CATEGORIE = ART.CODE_CATEGORIE_A
										WHERE LIBELLE_OFFRE LIKE '%" .addslashes($_POST['text_rech']) ."%' "
									   ."OR NOM_ARTICLE LIKE '%" .addslashes($_POST['text_rech']) ."%' "
									   ."OR LIBELLE_ARTICLE LIKE '%" .addslashes($_POST['text_rech']) ."%' "
									   ."OR LIBELLE_CARACTERISTIQUE LIKE '%" .addslashes($_POST['text_rech']) ."%' "
									   ."OR MOT_CLE LIKE '%" .addslashes($_POST['text_rech']) ."%' ";
									   
						$trouver_cat = true;
						$rech = 'rech_texte';
						$rech_texte = $_POST['text_rech'];
						
						
				
					}
					
					
				}
				else if(isset($_GET['rech']))
				{
					$sql_article = "SELECT DISTINCT ID_ARTICLE, NOM_ARTICLE, PRIX_ARTICLE, A.CODE_OFFRE
									FROM ARTICLE AS A
									LEFT JOIN OFFRE AS O ON A.CODE_OFFRE = O.CODE_OFFRE
									INNER JOIN IDENTIFIER AS I ON I.ID_ARTICLE_I = A.ID_ARTICLE
									INNER JOIN ART_CAT_CAR AS ART ON ART.ID_ARTICLE_A = A.ID_ARTICLE
									INNER JOIN MOT_CLE AS M ON I.ID_MOT_CLE_I = M.ID_MOT_CLE
									INNER JOIN CARACTERISTIQUE AS C ON ART.CODE_CARACTERISTIQUE_A = C.CODE_CARACTERISTIQUE
									INNER JOIN CATEGORIE AS CAT ON CAT.CODE_CATEGORIE = ART.CODE_CATEGORIE_A
									WHERE LIBELLE_OFFRE LIKE '%" .addslashes($_GET['rech']) ."%' "
								   ."OR NOM_ARTICLE LIKE '%" .addslashes($_GET['rech']) ."%' "
								   ."OR LIBELLE_ARTICLE LIKE '%" .addslashes($_GET['rech']) ."%' "
								   ."OR LIBELLE_CARACTERISTIQUE LIKE '%" .addslashes($_GET['rech']) ."%' "
								   ."OR MOT_CLE LIKE '%" .addslashes($_GET['rech']) ."%' ";
									   
						$trouver_cat = true;
						$rech = 'rech_texte';
						$rech_texte = $_GET['rech'];
						
				
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
						$sql_article = "SELECT * FROM ARTICLE, ART_CAT_CAR 
										WHERE ARTICLE.ID_ARTICLE = ART_CAT_CAR.ID_ARTICLE_A ";
						
						$fin = false;
						
						$i = 0;
						$tab = array();
						
						echo "trouver_cat:" .$trouver_cat ."|";
						Recherche_Categorie($categ, $tab, $i, $trouver_cat);
						for($j = 0;$j < $i;$j++)
						{
							echo "-" .$tab[$j] ."-";
							if($j == 0)
							{
								$fin = true;
								$sql_article .= " AND (ART_CAT_CAR.CODE_CATEGORIE_A = " .$tab[$j];
							}
							else
								$sql_article .= " OR ART_CAT_CAR.CODE_CATEGORIE_A = " .$tab[$j];
						
						}
						
						if($fin == true)$sql_article .= ")";
						
						echo "trouver_cat:$trouver_cat|";
					
					}
					
					echo "categ:$categ";
					echo $sql_article;
					
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
						
						$_SESSION['sql_article'] = $sql_article;
						
						$sql_article .= "LIMIT $index, $article_par_page";
										
						$_SESSION['page'] = $page;
													
						
						if($nb_article != 0)
						{
							
							if($res_art = mysql_query($sql_article))
							{
								
								$ch_page = "";
								$ch_psuiv = "";
								$ch_pprec = "";
				
					
				
				?>
				
				
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
												$ch_pprec .= '&rech=' .urlencode($rech_texte);
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
														$ch_page .= '&rech=' .urlencode($rech_texte);
														
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
												$ch_psuiv .= '&rech=' .urlencode($rech_texte);
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
													
														$path_im = "Aperçu\\" .$article['ID_ARTICLE'] ."_apercu.gif";
														if(file_exists($path_im))
														{
															echo '<img src="' .$path_im .'" width="75" height="75"/>';
														
														}
														else
														{
															echo "no photo";
														}
													
													
													
													?>
													</td>
													<td>
													<?php 
														
														echo '<a href="afficher_article?id_article=' .$article['ID_ARTICLE'] .'">' .$article['NOM_ARTICLE'] ."</a>";
														
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
															echo '<h2 class="rouge">' ."Réduction -" .$offre['REDUCTION_OFFRE'] ."%</h1>";
															
														}
														else
														{
															$off = false;													
	
														}
														
																									
													?>
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
													
														$path_im = "Aperçu\\" .$article['ID_ARTICLE'] ."_apercu.gif";
														if(file_exists($path_im))
														{
															echo '<img src="' .$path_im .'" width="75" height="75"/>';
														
														}
														else
														{
															echo "no photo";
														}
													
													
													
													?>
													</td>
													<td>
													<?php 
														
														echo '<a href="afficher_article?id_article=' .$article['ID_ARTICLE'] .'">' .$article['NOM_ARTICLE'] ."</a>";
														
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
															echo "Réduction -" .$offre['REDUCTION_OFFRE'] ."%";
															
														}
														else
														{
															$off = false;
														
														}
														
																									
													?>
													</td>
													
												</tr>
												<tr>
													<td><?php echo $article['PRIX_ARTICLE']; ?></td>
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
				
				}
			
			?>
			
			
			
			</td>
			<td class="cote_droit" valign="top">
			
			<?php
			
				$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CAT IS NULL;";
				if($res_c = mysql_query($sql_categ))
				{
					
					echo '<form id="rech_cat" action="index.php" method="post">';
					echo '<table class="tab_rech_cat">';
					echo '<tr><td>Recherche par catégorie</td></tr>';
					echo '<tr><td><select name="cat_princ" onchange="Soumettre_form(' ."'rech_cat'" .')">';
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
									
									echo '<input type="hidden" name="post_ss_cat" value="' .$_POST['cat_princ'] .'"/>';
								
								}
							
							}
							else
							{
								echo mysql_error();
							}
						
						}
						else
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
					
					
					
					
					echo '</table>';
					echo '</form>';
				
				
				}
				else
				{
					echo mysql_error();
				
				}
				
					
			
			?>
			
			
			
			</td>
		</tr>
		<tr>
			<td class="cell_pied_page" colspan="3">dfsdfsd</td>
		</tr>
	
	</table>


</body>
</html>
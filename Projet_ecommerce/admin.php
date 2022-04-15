<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="site.js"></script>
<title>Administration</title>
</head>

<body>
	
	<?php
	
		include("connect.php");
		
		$select_table = '<select name="nom_table" onchange="Soumettre_admin();">';
		$debut = true;
		$possede_meta = '';
		
		$tables = mysql_list_tables($base);
		while(list($t) = mysql_fetch_array($tables))
		{
			if(isset($_POST['nom_table']))
			{
				if($_POST['nom_table'] == $t)
				{
					$select_table .= '<option value="' .$t .'" selected="selected">' .$t .'</option>';
					
					$sql_meta_table = "SELECT * FROM META_" .$t;
					if(mysql_query($sql_meta_table))
					{
						$possede_meta = true;
					}
					else
					{
						$possede_meta = false;
					}
				}
				else
				{
					if((substr($t, 0, 4) != 'meta') && (substr($t, 0, 4) != 'META'))
					{
						$select_table .= '<option value="' .$t .'">' .$t .'</option>';
					}
				}
			}
			else
			{
				if((substr($t, 0, 4) != 'meta') && (substr($t, 0, 4) != 'META'))
				{
					$select_table .= '<option value="' .$t .'">' .$t .'</option>';
					
					if($debut)
					{
						$sql_meta_table = "SELECT * FROM META_" .$t;
						if(mysql_query($sql_meta_table))
						{
							$possede_meta = true;
						}
						else
						{
							$possede_meta = false;
						}
						
						$debut = false;
					
					}
					
				}
			}
			
		}
		$select_table .= '</select>';
		
		$nom_champ = false;
		$nom_champ_ex = false;
		$type_champ = false;
		
		$ordre = false;
		$ordre_val = false;
		$ordre_ex = false;
		
		$erreur = false;
		$insert_reussi = false;
		$aff_mess = false;
		
		if(isset($_POST['ajouter']))
		{
			if($_POST['nom_champ'] =='' )
			{
				$nom_champ = true;
				$erreur = true;
			
			}
			else
			{
				$sql_nomchamp = "SELECT " .$_POST['nom_champ'] ." FROM " .$_POST['nom_table'];
				if(mysql_query($sql_nomchamp))
				{
					$nom_champ_ex = true;
					$erreur = true;
				}
			
			}
			
			if($_POST['type_champ'] == '')
			{
				$type_champ = true;
			
			}
			
			if($_POST['possede_meta'])
			{
				
				if($_POST['ordre_champ'] == '')
				{
					$ordre = true;
					$erreur = true;				
				}
				else
				{
				
					if(ctype_digit($_POST['ordre_champ']))
					{
						$sql_ordre = "SELECT ORDRE_CHAMP FROM META_" .$_POST['nom_table'] ." WHERE ORDRE_CHAMP = " .$_POST['ordre_champ'];
						if($res_o = mysql_query($sql_ordre))
						{
							if(mysql_num_rows($res_o) != 0)
							{
								$ordre_ex = true;
								$erreur = true;
							}			
						
						}
					}
					else
					{
						$ordre_val = true;
						$erreur = true;
					
					}
					
				}
			
			}
		
			if(!$erreur)
			{
				$aff_mess = true;
			
				$sql_alter = "ALTER TABLE " .$_POST['nom_table'] ." ADD " .$_POST['nom_champ'] ." " .$_POST['type_champ'];
				if(!mysql_query($sql_alter))
				{
					$erreur = true;
				}
				else
				{
					$insert_reussi = true;
				
				}			
				
				
				if(!$erreur)
				{
				
					if($_POST['possede_meta'])
					{
					
						$sql_insert_meta = "INSERT INTO META_" .$_POST['nom_table'] ." VALUES('" .$_POST['nom_champ'] ."', '" .$_POST['type_champ'] ."', '" .$_POST['valeur_champ'] ."', " .$_POST['ordre_champ'] .", '" .$_POST['nom_table'] ."', " .$_POST['affichage_champ'] .", " .$_POST['recherche_champ'] .");";
						if(!mysql_query($sql_insert_meta))
						{
							$erreur = true;
							$sql_alterd = "ALTER TABLE " .$_POST['nom_table'] ." DROP " .$_POST['nom_champ'];
							mysql_query($sql_alterd);
							$insert_reussi = false;
							
						}
						else
						{
							$insert_reussi = true;
							
							
						}
						
					}
				
				
				}
				
				
				
			}
			
			
			
		}
	
	
	?>

	<center><h2>Administration</h2></center>
	

	<form action="admin.php" method="post" id="form_admin" >
	<input type="hidden" name="possede_meta" value="<?php echo $possede_meta; ?>" />
	
	<?php
	
		if(isset($_GET['id_article']))
			echo '<input type="hidden" name="id_article" value="' .$_GET['id_article'] .'"/>';
			
		if(isset($_POST['id_article']))
			echo '<input type="hidden" name="id_article" value="' .$_POST['id_article'] .'"/>';
	
	?>
	
	<table class="tab_admin">
		<tr>
			<td colspan="2" class="entete_tab_admin" align="center">Ajouter un attribut à une table</td>
		</tr>
		<tr>
			<td>Nom Table</td>
			<td><?php echo $select_table; ?></td>
		</tr>
		<tr>
			<td>Nom Champ</td>
			<td>
				<?php if($nom_champ || $nom_champ_ex){ ?>
					<input type="text" name="nom_champ" value="" style="background-color:red;" />
				<?php } else { ?>
					<input type="text" name="nom_champ" value="<?php if(isset($_POST['nom_champ']))echo $_POST['nom_champ']; ?>" />
				<?php } ?>
			</td>
		</tr>
		<?php if($nom_champ){ ?>
		<tr>
			<td colspan="2" class="rouge">Le champ nom_champ est vide</td>
		</tr>		
		<?php } else if($nom_champ_ex){ ?>
		<tr>
			<td colspan="2" class="rouge">Le champ <?php echo $_POST['nom_champ']; ?> existe deja.</td>
		</tr>
		<?php } ?>
		<tr>
			<td>Type Champ</td>
			<td>
				<?php if($type_champ){ ?>
					<input type="text" name="type_champ" value="" style="background-color:red;"/>
				<?php } else { ?>
					<input type="text" name="type_champ" value="<?php if(isset($_POST['type_champ']))echo $_POST['type_champ']; ?>" />
				<?php } ?>
			</td>
		</tr>
		<?php if($type_champ){ ?>
		<tr>
			<td colspan="2" class="rouge">Le champ type_champ est vide.</td>
		</tr>
		<?php } ?>
		<?php if($possede_meta){ ?>
		<tr>
			<td colspan="2" class="entete_tab_admin" align="center">Info pour la métatable</td>
		</tr>
		<tr>
			<td>Valeur_champ</td>
			<td><input type="text" name="valeur_champ" value="<?php if(isset($_POST['valeur_champ']))echo $_POST['valeur_champ']; ?>" /></td>
		</tr>
		<tr>
			<td>Ordre_champ</td>
			<td>
				<?php if($ordre || $ordre_val || $ordre_ex){ ?>
					<input type="text" name="ordre_champ" value="" style="background-color:red;" />
				<?php } else { ?>
					<input type="text" name="ordre_champ" value="<?php if(isset($_POST['ordre_champ']))echo $_POST['ordre_champ']; ?>" />
				<?php } ?>
			</td>
		</tr>
		<?php if($ordre){ ?>
		<tr>
			<td colspan="2" class="rouge">Le champ ordre_champ est vide</td>
		</tr>		
		<?php } else if($ordre_val){ ?>
		<tr>
			<td colspan="2" class="rouge">Le champ ordre_champ est invalide.</td>
		</tr>
		<?php } else if($ordre_ex){ ?>
		<tr>
			<td colspan="2" class="rouge">Le champ ordre_champ existe deja.</td>
		</tr>
		<?php } ?>
		<tr>
			<td>Affichage_champ</td>
			<td>
				<select name="affichage_champ">
					<option value="1">oui</option>
					<option value="0">non</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Recherche_champ</td>
			<td>
				<select name="recherche_champ">
					<option value="1">oui</option>
					<option value="0">non</option>
				</select>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<td></td>
			<td align="right"><input type="submit" name="ajouter" value="Ajouter" /></td>
		</tr>
	</table>
	</form>
	
	
	
	<?php
	
		if($aff_mess)
		{
		
			if($insert_reussi)
			{
				echo "<center>L'attribut " .$_POST['nom_champ'] ." a été ajouté à la table " .$_POST['nom_table'] .".</center>";
			
			}
			else
			{
				echo '<center><h2 class="rouge">Erreur lors de la création du nouvel attribut. Réessayez.</h2></center>';
			
			}
			
		}
		
	
	
	?>
	
	<br/>
	
	<center><a href="index.php?retour
	<?php
	
		if(isset($_GET['id_article']))
			echo '&id_article=' .$_GET['id_article'];
			
		if(isset($_POST['id_article']))
			echo '&id_article=' .$_POST['id_article'];
	
	?>
	">Retour</a></center>


</body>

</html>

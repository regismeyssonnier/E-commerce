<?php

	include("connect.php");

	$nom = true;
	$prenom = true;
	$adresse = true;
	$adr_len = true;
	$cp = true;
	$cp_nb = true;
	$cp_len = true;
	$ville = true;
	$tel = true;
	$tel_nb = true;
	$tel_len = true;
	$email = true;
	$email_val = true;
	$login = true;
	$login_val = true;
	$mdp = true;
	$mdp_mm = true;
	
	$aff = true;
	$message = '';
	$erreur = false;

	if(isset($_POST['inscrire']))
	{
					
		$valide = true;
		
		if($_POST['nom'] == '')
		{
			$nom = false;
			$valide = false;
		}
			
		if($_POST['prenom'] == '')
		{
			$prenom = false;
			$valide = false;
		}
		
		if($_POST['adresse'] == '')
		{
			$adresse = false;
			$valide = false;
		}
		else if(strlen($_POST['adresse']) > 255)
		{
			$adr_len = false;
			$valide = false;
		
		}
		
		if($_POST['cp'] == '')
		{
			$cp = false;
			$valide = false;
		}
		else if(!ctype_digit($_POST['cp']))
		{
			$cp_nb = false;
			$valide = false;
		}
		else if(strlen($_POST['cp']) < 5)
		{
			$cp_len = false;
			$valide = false;
		}
		
		if($_POST['ville'] == '')
		{
			$ville = false;
			$valide = false;
		}
		
		if($_POST['tel'] == '')
		{
			$tel = false;
			$valide = false;
		}
		else if(!ctype_digit($_POST['tel']))
		{
			$tel_nb = false;
			$valide = false;
						
		}
		else if(strlen($_POST['tel']) < 10)
		{
				$tel_len = false;
				$valide = false;
		}
		
		if($_POST['email'] == '')
		{
			$email = false;
			$valide = false;
		}
		else
		{
			$arobase = strpos($_POST['email'], "@");
			$point = strpos($_POST['email'], ".", $arobase+2);
			
			if(($arobase == 0) || ($point == 0))
				$email_val = false;
		
		}
		
		if($_POST['login'] == '')
		{
			$login = false;
			$valide = false;
		}
		else
		{
			$sql_login = "SELECT LOGIN FROM CLIENT WHERE LOGIN = '" .addslashes($_POST['login']) ."';";
			$res_l = mysql_query($sql_login);
					
			if(mysql_num_rows($res_l) > 0)
			{
				$login_val = false;
				$valide = false;
			
			}
		
		}
		
		if($_POST['mdp1'] == '')
		{
			$mdp = false;
			$valide = false;
		}
		
		if($_POST['mdp1'] != $_POST['mdp2'])
		{
			$mdp_mm = false;
			$valide = false;
		
		}
		
		if($valide)
		{
		
			$sql_insert = "INSERT INTO CLIENT VALUES('', '" .addslashes($_POST['nom']) ."', '" .addslashes($_POST['prenom']) ."', '" .addslashes($_POST['adresse']) ."', " .$_POST['cp'] .", '" .addslashes($_POST['ville']) ."', '" .addslashes($_POST['tel']) ."', '" .addslashes($_POST['email']) ."', '" .$_POST['login'] ."', '" .md5($_POST['mdp1']) ."', 'visiteur');";
			
			if(mysql_query($sql_insert))
			{
				$aff = false;
				$message = 'Vous êtes maintenant inscrit sur notre site.'; 
			
			}
			else
			{
				$message =  "<h2>Erreur lors de l'inscription, retentez votre inscription.</h2>";
				$aff = true;
				$erreur = true;
				echo mysql_error();
			}
		
	

		}		
	}


	if($aff)
	{
?>	

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Inscription</title>
		</head>
		<body>
		
		<center><h1>TOP ACHAT</h1></center>

<?php
		if($erreur)
			echo '<center class="rouge">' .$message .'</center><br/>';
			
		

?>

		<center>Bienvenue sur notre site, si vous voulez faire un achat vous devez être inscrit.</center>
	
		<form action="inscription.php" method="post">
			<table class="tab_inscription">
				<tr>
					<td colspan="2" class="cell_entete_article" align="center">Inscrivez - vous</td>
				</tr>
				<tr>
					<td align="center">Nom : </td>
					<td>
						<?php if($nom == false){ ?>
							<input type="text" name="nom"  size="45" maxlength="100" style="background-color:red;" value=""/>
						<?php } else { ?>
							<input type="text" name="nom" value="<?php if(isset($_POST['inscrire'])) echo $_POST['nom']; ?>" size="45" maxlength="100"/>
						<?php } ?>	
						
					</td>
				</tr>	
				<?php if($nom == false){ ?>
					<tr>
						<td></td>
						<td>Le Champ nom est vide</td>
					</tr>
				<?php } ?>	
				<tr>
					<td align="center">Prénom : </td>
					<td>
						<?php if($prenom == false){ ?>
							<input type="text" name="prenom" size="45" maxlength="100" style="background-color:red;" value=""/>
						<?php } else { ?>
							<input type="text" name="prenom" value="<?php if(isset($_POST['inscrire'])) echo $_POST['prenom']; ?>"size="45" maxlength="100"/>
						<?php } ?>	
					</td>
				</tr>
				<?php if($prenom == false){ ?>
					<tr>
						<td></td>
						<td>Le Champ prenom est vide</td>
					</tr>
				<?php } ?>	
				<tr>
					<td align="center">Adresse : </td>
					<td>
						<?php if(($adresse == false) || ($adr_len == false)){ ?>
							<textarea name="adresse" cols="35" rows="10" style="background-color:red;"></textarea>
						<?php } else { ?>
							<textarea name="adresse" cols="35" rows="10"><?php if(isset($_POST['inscrire'])) echo $_POST['adresse']; ?></textarea>
						<?php } ?>	
							
						
					</td>
				</tr>
				<?php if($adresse == false){ ?>
					<tr>
						<td></td>
						<td>Le Champ adresse est vide</td>
					</tr>
				<?php } else if($adr_len == false){ ?>
					<tr>
						<td></td>
						<td>L'adresse ne doit pas dépasser 255 caractères.</td>
					</tr>
				<?php } ?>	
				<tr>
					<td align="center">CP : </td>
					<td>
						<?php if($cp == false){ ?>
							<input type="text" name="cp"  size="5" maxlength="5" style="background-color:red;" value=""/>Le champ est vide
						<?php } else if($cp_nb == false){ ?>
							<input type="text" name="cp" value="" size="5" maxlength="5" style="background-color:red;"/>Le CP ne contient que des chiffres.
						<?php } else if($cp_len == false){ ?>
							<input type="text" name="cp" value="" size="5" maxlength="5" style="background-color:red;"/>Le CP contient 5 chiffres.
						<?php } else { ?>
							<input type="text" name="cp" value="<?php if(isset($_POST['inscrire'])) echo $_POST['cp']; ?>" size="5" maxlength="5"/>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td align="center">Ville : </td>
					<td>
						<?php if($ville == false){ ?>
							<input type="text" name="ville"  size="45" maxlength="100" style="background-color:red;" value=""/>
						<?php } else { ?>
							<input type="text" name="ville" value="<?php if(isset($_POST['inscrire'])) echo $_POST['ville']; ?>" size="45" maxlength="100"/>
						<?php } ?>	
						
					</td>
				</tr>
				<?php if($ville == false){ ?>
					<tr>
						<td></td>
						<td>Le Champ ville est vide</td>
					</tr>
				<?php } ?>	
				<tr>
					<td align="center">N°Tél. : </td>
					<td>
						<?php if($tel == false){ ?>
							<input type="text" name="tel"  size="10" maxlength="10" style="background-color:red;" value=""/>Le champ est vide
						<?php } else if($tel_nb == false) { ?>
							<input type="text" name="tel" value="" size="10" maxlength="10" style="background-color:red;"/>Le N°tel ne doit contenir que des chiffres.
						<?php } else if($tel_len == false) { ?>
							<input type="text" name="tel" value="" size="10" maxlength="10" style="background-color:red;"/>Le N°tel contient 10chiffres.
						<?php } else { ?>
							<input type="text" name="tel" value="<?php if(isset($_POST['inscrire'])) echo $_POST['tel']; ?>" size="10" maxlength="10"/>
						<?php } ?>	
					</td>
				</tr>
				<tr>
					<td align="center">e-mail : </td>
					<td>
						<?php if(($email == false) || ($email_val == false)){ ?>
							<input type="text" name="email" value="" size="45" maxlength="150" style="background-color:red;"/>
						<?php } else { ?>
							<input type="text" name="email" value="<?php if(isset($_POST['inscrire'])) echo $_POST['email']; ?>" size="45" maxlength="150"/>
						<?php } ?>	
					
					</td>
				</tr>
				<?php if($email == false){ ?>
					<tr>
						<td></td>
						<td>Le Champ e-mail est vide</td>
					</tr>
				<?php } else if($email_val == false){ ?>
					<tr>
						<td></td>
						<td>L'e-mail est non valide.</td>
					</tr>
				<?php } ?>		
				<tr>
					<td align="center">Login : </td>
					<td>
						<?php if(($login == false) || ($login_val == false)){ ?>
							<input type="text" name="login" value="" size="45" maxlength="50" style="background-color:red;"/>
						<?php } else { ?>
							<input type="text" name="login" value="<?php if(isset($_POST['inscrire'])) echo $_POST['login']; ?>" size="45" maxlength="50"/>
						<?php } ?>	
					</td>
				</tr>
				<?php if($login == false){ ?>
					<tr>
						<td></td>
						<td>Le Champ login est vide</td>
					</tr>
				<?php } else if($login_val == false){ ?>	
					<tr>
						<td></td>
						<td>Le login est déjà pris.</td>
					</tr>
				<?php } ?>	
				<tr>
					<td align="center">Mot de passe : </td>
					<td>
						<?php if($mdp == false){ ?>
							<input type="password" name="mdp1" value="" size="45" maxlength="50" style="background-color:red;"/>
						<?php } else { ?>
							<input type="password" name="mdp1" value="<?php if(isset($_POST['inscrire'])) echo $_POST['mdp1']; ?>" size="45" maxlength="50"/>
						<?php } ?>	
					</td>
				</tr>
				<?php if($mdp == false){ ?>
					<tr>
						<td></td>
						<td>Le Champ mot de passe est vide</td>
					</tr>
				<?php } ?>	
				<tr>
					<td align="center">Confirmation<br/> du mot de passe : </td>
					<td>
						<?php if($mdp_mm == false){ ?>
							<input type="password" name="mdp2" value="" size="45" maxlength="50" style="background-color:red;"/>
						<?php } else { ?>
							<input type="password" name="mdp2" value="<?php if(isset($_POST['inscrire'])) echo $_POST['mdp2']; ?>" size="45"/>
						<?php } ?>	
					</td>
				</tr>
				<?php if($mdp_mm == false){ ?>
					<tr>
						<td></td>
						<td>Le mot de passe est différent</td>
					</tr>
				<?php } ?>	
				<tr>
					<td></td>
					<td align="right"><input type="submit" name="inscrire" value="                         S'inscrire                         "/></td>
				</tr>
			
			</table>
			
			<?php
			
				if(isset($_GET['redirection']))
					echo '<input type="hidden" name="redirection" value="' .$_GET['redirection'] .'" />';
					
				if(isset($_POST['redirection']))
					echo '<input type="hidden" name="redirection" value="' .$_POST['redirection'] .'" />';
			
			
			?>
			
		</form>
	
		</body>
		</html>
	
<?php

	}
	else
	{
	
		if($_POST['redirection'] == 'inscrit.html')
		{
			header('Refresh:0; URL=' .$_POST['redirection']);
		}
		else
		{
			header('Refresh:2; URL=' .$_POST['redirection']);
			echo '<center>' .$message .'</center>';		
			echo "<center>Vous allez être redirigé vers la page d'authentification.</center>";
			echo '<center><img src="wait.gif" alt="patientez s il vous plait"></center>';
		}
		
	}

?>
	
		
		








	
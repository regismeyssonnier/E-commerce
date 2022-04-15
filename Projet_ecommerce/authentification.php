<?php

	session_start();

	include("connect.php");

	$erreur = false;
	$mess_err  = '';

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

?>

				<script type="text/javascript">
					opener.document.getElementById('rech_cat_f').submit();
				
				</script>

<?php
				
				
				header('Refresh:0; URL=' .$_POST['redirection']);
								
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
	
	
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Document sans titre</title>
</head>

<body>


	<form action="authentification.php" method="post">
	
		<table class="tab_authentification">	
			<tr>
				<td colspan="2" class="cell_entete_article" align="center">Authentification</td>
			</tr>
			<tr>
				<td>Login : </td>
				<td><input type="text" name="login" value=""  /></td>
			</tr>
			<tr>
				<td>Mot de passe : </td>
				<td><input type="password" name="mdp" value=""  /></td>
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="connecter" value="Se connecter" /></td>
			</tr>
						
		</table>
		
		<?php
		
			if(isset($_GET['redirection']))
				echo '<input type="hidden" name="redirection" value="' .$_GET['redirection'] .'"/>';
				
			if(isset($_POST['redirection']))
				echo '<input type="hidden" name="redirection" value="' .$_POST['redirection'] .'"/>';
			
		
		?>
	
	</form>
	
	<?php
	
		if($erreur)
			echo $mess_err .'<br/>';
	
	?>
	
	<center><a href="inscription.php?redirection=authentification.php" class="rouge">Vous n'êtes pas encore inscrit !!!!! Inscrivez - vous!!!!</a></center>





</body>
</html>

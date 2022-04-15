<?php


	$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CAT IS NULL;";
				
	$categ = 0;
	
	
	if(isset($_GET['categ']))
	{
		
		$categ = $_GET['categ'];
		
		$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CAT = " .$_GET['categ'];
		if($res_c = mysql_query($sql_categ))
		{
			if(mysql_num_rows($res_c) == 0)
			{
				$sql_categ = $_SESSION['sql_categ'];
				
			}
			else
			{
				$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CATEGORIE = " .$_GET['categ'];
				

			}				
		}
		else
		{
			$sql_categ = $_SESSION['sql_categ'];
			
		
		}
	
	
	}
	else if(isset($_POST['rech_cat']))
	{
		
		if(!isset($_POST['post_ss_cat']))
		{
			$categ = $_POST['cat_princ'];
			
			if($categ != 0)
				$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CAT = " .$categ;
		
		}
		else
		{
			$t_cat = split("-", $_POST['post_ss_cat']);
			$nb = count($t_cat);
			$i = $nb-1;
			$categ = $t_cat[$i];
			
			$trouver = false;
			while($trouver == false)
			{
				$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CAT = " .$t_cat[$i];
				if($res_c = mysql_query($sql_categ))
				{
					if(mysql_num_rows($res_c) == 0)
					{
						$i--;		
						if($i < 0)
						{
							$trouver = true;
							$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CATEGORIE = " .$t_cat[0];
						
						}				
					}
					else
					{
						$sql_categ = "SELECT * FROM CATEGORIE WHERE CODE_CATEGORIE = " .$t_cat[$i];
						$trouver = true;
						
		
					}				
				}
				else
				{
					$sql_categ = $_SESSION['sql_categ'];
					
				
				}
				
			}
		
		}
		
		
	
	}
	else if(isset($_POST['cat_princ']) || isset($_POST['connecter']) || isset($_GET['deconnexion']) || isset($_GET['retour']))
	{
		$sql_categ = $_SESSION['sql_categ'];
		$categ = $_SESSION['categ'];
	}	
	
		
	
	$_SESSION['sql_categ'] = $sql_categ;
	
		
	if($res_cat = mysql_query($sql_categ))
	{
		while($categorie = mysql_fetch_array($res_cat))
		{
			echo '<table class="tab_menu">';
			echo "<tr>";
			echo '<td class="entete_menu">' .$categorie['LIBELLE_CATEGORIE'] ."</td>";
			echo "</tr>";
			
			$sql_ss_categ = "SELECT * FROM CATEGORIE WHERE CODE_CAT = " .$categorie['CODE_CATEGORIE'] .";";
			if($res_ss_c = mysql_query($sql_ss_categ))
			{
				
				while($ss_categ = mysql_fetch_array($res_ss_c))
				{
					echo "<tr>";
					echo '<td><a href="index.php?categ=' .$ss_categ['CODE_CATEGORIE'] .'">' .$ss_categ['LIBELLE_CATEGORIE'] ."</a></td>";
					echo "</tr>";
		
				
				}
			
			
			}
			else
			{
				echo "merde";
			
			}
			
			echo "</table>";


		
		}
	
	
	}
	else
	{
	
	
	}




?>
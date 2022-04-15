// JavaScript Document
function Soumettre_form(id){
	
	document.getElementById('debut').value = 1;
	document.getElementById(id).submit();
	
	
}

function Soumettre_form2(niv){
	
	
	var ss_cat = document.getElementById('post_ss_cat');
	var val = document.getElementById('ss_cat_' + niv).value;
	
	if(ss_cat.value == '')
	{
		ss_cat.value = 	val;
			
	}
	else
	{
		
		var tlc = ss_cat.value.split("-");
		tlc[niv] = val;
		ss_cat.value = '';
		for(var i = 0;(i < tlc.length) && (i <= niv) && (tlc[i] != 0);i++)
		{
			if(ss_cat.value == '')
				ss_cat.value = tlc[i];
			else
				ss_cat.value += "-" + tlc[i];
				
		}
		
				
	}
	
	document.getElementById('rech_cat_f').submit();
	
	
}

function Afficher_panier(num_art){
	//width=500, height=500,
	var panier = window.open('panier.php?ajout_article=' + num_art, 'Panier', 'width=1000, height=350, resizable=1, scrollbars=1, location=0, status=0, menubar=0, directories=0');
	panier.moveTo(0, 0);
	
	
}


function Afficher_panier_only(){
	//width=500, height=500,
	var panier = window.open('panier.php', 'Panier', 'width=1000, height=350, resizable=1, scrollbars=1, location=0, status=0, menubar=0, directories=0');
	panier.moveTo(0, 0);
		
	
}

function Afficher_panier_vide(){
	//width=500, height=500,
	var panier = window.open('panier.php?vider=vider', 'Panier', 'width=1000, height=350, resizable=1, scrollbars=1, location=0, status=0, menubar=0, directories=0');
	panier.moveTo(0, 0);
	
	
}

function Afficher_inscription(){
	//width=500, height=500,
	var inscript = window.open('inscription.php?redirection=inscrit.html', 'Inscription', 'width=1000, height=650, resizable=1, scrollbars=1, location=0, status=0, menubar=0, directories=0');
	inscript.moveTo(0, 0);
	
	
}

function Afficher_commande(){
	//width=500, height=500,
	var commande = window.open('liste_commande.php', 'Commande', 'width=1000, height=650, resizable=1, scrollbars=1, location=0, status=0, menubar=0, directories=0');
	commande.moveTo(0, 0);
	
	
}

function Soumettre_article(id, type_submit){
	
	//alert('id:' + id + " ts:" + type_submit);
	document.getElementById(id).type_submit.value = type_submit;
	document.getElementById(id).submit();	
	
}

function Soumettre_admin(){

	document.getElementById('form_admin').submit();
	
}


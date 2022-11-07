<?
/************************************************/
/*************** Fonctions **********************/
/************************************************/
function affich_annonce($champ) {    //a modifier - affiche un champ texte
	if (!empty($champ)) print("<marquee scrolldelay=\"150\" class=\"annonce\" width=\"95%\" align=\"center\">".stripslashes(nl2br($champ))."</marquee>\r\n");
}
function affich_texte($champ) {    //a modifier - affiche un champ texte
	print(htmlspecialchars_decode(stripslashes($champ)));
}
/***************FIN Fonctions*************/



/**********************************************/
/*************** PARAMETRES *******************/
/**********************************************/
foreach($_GET as $key => $value) $$key = $value;
//foreach($_GET as $key => $value) print ("$key = $value <br>");
if (isset($page)) {
	$fichier_champs="modif2.$page.inc.php";  

}
else {
    $fichier_champs="modif2.inc.php";  

}          //a modifier
//print($PHP_SELF);
$fichier_script=$_SERVER['PHP_SELF'];     
/************** FIN PARAMETRES ****************/

include($fichier_champs);

/*************************************************/
/** Affichage des champs de texte dans la page  **/
/*************************************************/
 if (isset($affich)) { 
 	affich_texte($$affich);
	exit;
}
 if (isset($annonce)) { 
 	affich_annonce($$annonce);
	exit;
}                                                   
?>
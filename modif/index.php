<?
/********************************************************************************/
/********************************* Fonctions ************************************/
/********************************************************************************/
function affich_annonce($champ) {    //a modifier - affiche un champ texte
	if (!empty($champ)) print("<marquee scrolldelay=\"150\" class=\"annonce\" width=\"95%\" align=\"center\">".stripslashes(nl2br($champ))."</marquee>\r\n");
}
function affich_texte($champ) {    //a modifier - affiche un champ texte
	print(htmlspecialchars_decode(stripslashes($champ)));
}
/******************************************* FIN Fonctions *************************************************/



/**********************************************/
/*************** PARAMETRES *******************/
/**********************************************/
foreach($_GET as $key => $value) $$key = $value;
//foreach($_GET as $key => $value) print ("$key = $value <br>");

if (isset($page)) {
	$fichier_champs="../modif2.$page.inc.php";    // print  $fichier_champs."<br>";   //a modifier
	$fichier_formulaire="modif_form2_$page.htm";  // print  $fichier_formulaire."<br>";  
	$redirection="index.php?page=$page"; // print  $redirection."<br>";  
	$action_form="index.php?page=$page"; // print  $action_form."<br>";  
}
else {
    $fichier_champs="../modif2.inc.php";                //a modifier
	$fichier_formulaire="modif_form2.htm"; 
	$redirection="index.php";
	$action_form="index.php";
}          //a modifier
//print($PHP_SELF);
$fichier_script=$_SERVER['PHP_SELF'];                     //ne pas modifier
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

/*****************************************************************************************/
/************************* Ecriture du nouveau fichier $fichier_champs ********************/
/******************************************************************************************/
foreach($_POST as $key => $value) $$key = $value;
//foreach($_POST as $key => $value) { print($key); print(" = ".$value."<br>"); };
if (isset($motdepasse) && $motdepasse!="velleron"){ echo "mot de passe erroné $motdepasse";}
elseif  (isset($button) && $button=="modifier") {
	// sauvegarde des donnees precedentes
	include($fichier_champs);
	//chmod( $fichier_champs, 0777 );
	$fd=fopen($fichier_champs,"w") or die ("Impossible d'ouvrir \"$fichier_champs\"");
	$chaine="<?\n/* Ce fichier contient les parametres de la page a afficher */\n\n";
	$fout=fwrite($fd,$chaine);
	//remplacement des caracteres <,>,& et " par les codes html correspondants*/
	$compteur=1;      //ATTENTION SEULEMENT 10 champs possibles (� modifier ci-dessous)
	$field_new="champ_".$compteur."_new";
	while ($compteur<=20) {
		$$field_new = htmlentities(trim($$field_new));
		$field_new="champ_".++$compteur."_new";
		}
		$chaine="/*************************/\n";
		$chaine.="/* champs pour affichage */\n";
		$chaine.="/*************************/\n\n";
		$fout=fwrite($fd,$chaine);
		$compteur=1;
		$field="champ_".$compteur;
		$field_new="champ_".$compteur."_new";
		while (isset($$field_new)) {
		$chaine="$"."$field=\"".$$field_new."\";\n\n";
		$chaine=str_replace("\r","",$chaine);
		$fout=fwrite($fd,$chaine);
		++$compteur;
		$field="champ_".$compteur;
		$field_new="champ_".$compteur."_new";
		}
		$chaine="?>\n";
		$fout=fwrite($fd,$chaine);
		fclose($fd);
		unset($from);
		unset($button);
		//include($fichier_champs);
		header("Location:$redirection"); 
		exit;
}


/********************************************************************************************/
/************************** Affichage du haut de page et Titre ******************************/
/********************************************************************************************/
	
	include($fichier_formulaire);
?>
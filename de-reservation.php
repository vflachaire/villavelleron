<?
function verifDate($jour,$mois,$annee)
{
    settype($jour, "integer");
    settype($mois, "integer");
    settype($annee, "integer");
	if (!checkdate($mois,$jour,$annee)){
      return (checkdate($mois,$jour,$annee));
    }
    else {
      return(mktime("0","0","0",$mois,$jour,$annee) > time());
    }
}
function affich_annonce($champ) {    //a modifier - affiche un champ texte
	if (!empty($champ)) print("<p align=\"center\" class=\"cadre_annonce\">".stripslashes(nl2br($champ))."</p>\n");
}
function affich_texte($champ) {    //a modifier - affiche un champ texte
	print(stripslashes(nl2br($champ)));
}
function affich_message_mail($champ) {    //a modifier - affiche un champ texte
		 print("<p style=\"text-align:center;color:red;\" >".stripslashes(nl2br($champ))."</p>\r\n");
}

function checkEmail($email)
{
	return preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", $email);
}

//parametres
$email_destinataire="welcome@villavelleron.com";

foreach($_POST as $key => $value) $$key = $value;

	//print("button : $button<br>");
	//print("email : $email<br>");
	//print("message :$message<br>");

if ($button=="envoyer" || $button=="send" || $button=="Abschicken") {
	
	if ($button=="send") $langage="en";
	if ($button=="Abschicken") $langage="de";
	
	//V&eacute;rifications
	if (empty($email))
		if ($langage=="de") $msg.="Ihre E-Mail ist zwingend erforderlich.<br>";
		elseif ($langage=="en") $msg.="Your e-mail is mandatory.<br>";
		else $msg.="Votre e-mail est obligatoire.<br>";
	 if (!(checkEmail($email)))
	   if ($langage=="de") $msg.="Die Schreibweise Ihrer E-Mail ist nicht korrekt, bitte überprüfen und korrigieren.<br>";
	   elseif ($langage=="en") $msg.="The spelling of your e-mail is not correct, please check and correct it.<br>";
	   else $msg.="L'orthographe de votre e-mail est incorrecte, merci de la corriger.<br>";
	if (empty($nom_prenom))
		   if ($langage=="de") $msg.="Bitte geben Sie Ihren Namen.<br>";
		   elseif ($langage=="en") $msg.="Please indicate your Name.<br>";
	     else $msg.="Merci d'indiquer votre nom.<br>";
	if (empty($pays))
		   if ($langage=="de") $msg.="Bitte geben Sie Ihr Land.<br>";
		 elseif ($langage=="en") $msg.="Please indicate your Country.<br>";
	     else $msg.="Merci d'indiquer votre pays.<br>";
	if (empty($nuits))
		   if ($langage=="de") $msg.="Bitte füllen Sie die Anzahl der Nächte.<br>";
		   elseif ($langage=="en") $msg.="Please fill the number of nights.<br>";
	     else $msg.="Merci d'indiquer le nombre de nuits.<br>";
	/*else if (empty($chambres))
		   if ($langage=="de") $msg.="Bitte füllen Sie die Anzahl der Zimmer.<br>";
		   elseif ($langage=="en") $msg.="Please fill the number of rooms.<br>";
	     else $msg.="Merci d'indiquer le nombre de chambres.<br>";*/
	if (empty($date)) 
		   if ($langage=="de") $msg.="Bitte füllen Sie das Datum der Ankunft.<br>";
		   elseif ($langage=="en") $msg.="Please fill the date of arrival.<br>";
	     	else $msg.="Merci d'indiquer le jour d'arrivée.<br>";
	if (!empty($enfant) && empty($age_enfant))
			   if ($langage=="de") $msg.="Bitte geben Sie das Alter des Kindes (der Kinder).<br>";
			   elseif ($langage=="en") $msg.="Please indicate the age of the child (children).<br>";
	     else $msg.="Merci d'indiquer l'âge du (des) enfant(s).<br>";
	
	 if(preg_match("(\r|\n)",$email) || preg_match("(cc:|bcc:|from:)",$message))
		 if ($langage=="de") $msg.="Nachricht nicht senden: Spam Versuch ...?";
		 elseif ($langage=="en") $msg.="Message not send :  Spam attempt ?...";
		 else $msg.="Message non envoyé :  Tentative de Spam ?...";
	if(preg_match("(http:// | https)",$message))
		 if ($langage=="de") $msg.="Nachricht nicht senden: URL nicht in der Nachricht erlaubt";
		 elseif ($langage=="en") $msg.="Message not send :  URL are not allowed in message";
		 else $msg.="Message non envoyé :  les URL ne sont pas autorisées dans les messages.";
	if (empty($msg)) {
		$en_tete_supp.="Reply-To: $email\r\n";
		//$en_tete_supp.="Bcc: contact@horizon-provence.com\r\n";
		$en_tete_supp.="MIME-Version: 1.0\r\n";
		$en_tete_supp.="Content-type: text/plain; charset=\"utf-8\"\r\n";
		$en_tete_supp.="Content-Transfer-Encoding: 8bit\r\n";
		$corps="Email : $email\r\n\r\n";
		if ($langage=="en") $corps.="Langue : anglais\r\n\r\n";
		elseif ($langage=="de") $corps.="Langue : allemand\r\n\r\n";
		else $corps.="Langue : français\r\n\r\n";
		if (!empty($nom_prenom)) $corps.="Nom Prenom : $nom_prenom\r\n";
		if (!empty($adresse)) $corps.="Adresse : $adresse\r\n";
		if (!empty($codePostal)) $corps.="Code Postal : $codePostal\r\n";
		if (!empty($ville)) $corps.="Ville : $ville\r\n";
		if (!empty($pays)) $corps.="Pays : $pays\r\n";
		if (!empty($telephone)) $corps.="Telephone : $telephone\r\n";
		//if (!empty($jour) || !empty($mois) || !empty($annee)) $corps.="Date d'Arrivée : $jour / $mois / $annee\r\n";
		if (!empty($date)) $corps.="Date d'Arrivée : $date\r\n";
		if (!empty($nuits)) $corps.="nombre de nuits : $nuits\r\n";
		if (!empty($chambres)) $corps.="nombre de chambres : $chambres\r\n";
		if (!empty($adulte)) $corps.="nombre d'adultes : $adulte\r\n";
		if (!empty($enfant)) $corps.="nombre d'enfants : $enfant\r\n";
		if (!empty($age_enfant)) $corps.="âge des enfants : $age_enfant\r\n";
		if (!empty($tabledhote)) $corps.="table d'hôtes : $tabledhote\r\n";
		if (!empty($message)) $corps.="\r\nMessage : $message\r\n";
		if (!empty($source)) $corps.="\r\nSource : $source\r\n";
		//if (!empty($message)) $corps.="Message  : $message\r\n";
   		if (@mail($email_destinataire, "formulaire Villa Velleron", $corps,$en_tete_supp)) {
		if ($langage=="de")$msg.="<span style=\"color:green\">Thanks. Danke. Ihre Nachricht wurde gesendet.\r\nWir werden so schnell wie möglich zu antworten.</span>";
			elseif ($langage=="en")$msg.="<span style=\"color:green\">Thanks. Your message has been sent.\r\nWe will reply as soon as possible.</span>";
			else  $msg.="<span style=\"color:green\">Merci. Votre message a &eacute;t&eacute; transmis.\r\nNous r&eacute;pondrons le plus rapidement possible.</span>";

			unset($corps);
			unset($message);
			unset($nom_prenom);
			unset($email);
			unset($ville);
			unset($pays);
			unset($telephone);
			unset($date);
			unset($nuits);
			unset($personnes);
			unset($adresse);
			unset($codePostal);
			unset($chambres);
			unset($adulte);
			unset($enfant);
			unset($age_enfant);
			unset($source);
			unset($tabledhote);
		}
		unset($email);
		unset($sujet);
		unset($message);
	}
	//else $txt=$msg;
}
//include ("");
?>
<!doctype html>
<html>
<head>
<title>Machen Sie ein Reservierung  f&uuml;r Villa Velleron </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="_styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://www.villavelleron.com/fr-reservation.php" rel="alternate" hreflang="fr" />
	<link href="https://www.villavelleron.com/en-reservation.php" rel="alternate" hreflang="en" />

<script language="javascript" type="text/javascript"> 
	if (top != self) { 
		top.location.href = location.href; 
	} 
</script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 <script>
	$(function() {
	$.datepicker.regional['fr'] = {
		/*closeText: 'Fermer',
		prevText: 'Précédent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
		monthNamesShort: ['Janv.','Févr.','Mars','Avril','Mai','Juin','Juil.','Août','Sept.','Oct.','Nov.','Déc.'],
		dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
		dayNamesShort: ['Dim.','Lun.','Mar.','Mer.','Jeu.','Ven.','Sam.'],
		dayNamesMin: ['D','L','M','M','J','V','S'],
		weekHeader: 'Sem.',*/
		dateFormat: 'dd MM yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['fr']);
	$( "#datepicker" ).datepicker({ minDate: 0,maxDate: "+12M" });
	$( "#datepicker" ).datepicker();
	$( "#format" ).change(function() {
		$( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
	});
});
</script>
</head>

<body>
<? include("_header-de.htm") ?>
<? include("_menu-new.php") ?>
<div class="main">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>#reservation" method="post" id="reservation">
	<p>Wir sind bem&uuml;ht, Ihnen die bestm&ouml;gliche Unterbringung f&uuml;r Sie und Ihre Mitreisenden anzubieten &ndash; und verzichten daher bewusst auf ein automatisches Reservierungssystem. Wir machen Ihnen stattdessen gern pers&ouml;nlich ein ma&szlig;geschneidertes Angebot. Bitte geben Sie uns die n&ouml;tigen Details in der Reservierungsanfrage an, insbesondere Personenanzahl, Alter der Kinder &ndash; und eventuell auch Hinweise zu Mobilit&auml;tseinschr&auml;nkungen oder Di&auml;trestriktionen.</p>

    <? if (!empty($msg)) print(affich_message_mail($msg));?>
    <fieldset>  
        <input type="text" name="nom_prenom"  value="<?print($nom_prenom)?>" placeholder="Name(unverzichtbar)" required>
        <input name="adresse" type="text" id="adresse"  value="<?print($adresse)?>" placeholder="Address">
        <input name="ville" type="text" id="ville" value="<?print($ville)?>" placeholder="Stadt">
        <input name="codePostal" type="text" id="codePostal" value="<?print($codePostal)?>" placeholder="PLZ">
        <input name="pays" type="text" id="pays" value="<?print($pays)?>" placeholder="Land (unverzichtbar)" required >
        <input name="email" type="email" id="email" value="<?print($email)?>" placeholder="Email (unverzichtbar)" required>
        <input type="tel" name="telephone" value="<?print($telephone)?>"  placeholder="Telefon (erwünscht)" ">
        <input name="date" type="text" value="<?print($date)?>"  id="datepicker"   placeholder="Ankunft (unverzichtbar)" required>
        <input name="nuits" type="text" value="<?print($nuits)?>"  placeholder="Nächte (unverzichtbar)" required>
        <input name="adulte" type="text" id="adulte" value="<?print($adulte)?>" placeholder="Anzahl Erwachsene">
        <input name="enfant" type="text" value="<?print($enfant)?>" placeholder="Anzahl Kinder">
        <input name="age_enfant" type="text"  value="<?print($age_enfant)?>" placeholder="Alter der Kinder">
        <select name="tabledhotes">
            <option value="" <? if (!isset($tabledhotes) || $source=="") print("selected") ?>  disabled hidden> Abendessen gewünscht ? </option>
            <option value=" oui " <? if ($tabledhotes==" oui ") print("selected") ?>> Abendessen: ja </option>
            <option value=" non" <? if ($tabledhotes==" non ") print("selected") ?>> Abendessen : nein </option>
        </select>
            
        <textarea cols="30" name="message" rows="4" wrap="physical" placeholder="Sonstige Mitteilungen"><?print($message)?></textarea>
        <select name="source">
			<option value="" <? if (!isset($source) || $source=="") print("selected") ?> > Quelle ? </option>
            <option <? if ($source=="Wiederkehrer") print("selected") ?>>Wiederkehrer</option>
            <option <? if ($source=="Empfehlung") print("selected") ?>>Empfehlung</option>
            <option <? if ($source=="Flyer") print("selected") ?>>Flyer</option>
            <option <? if ($source=="Google") print("selected") ?>>Google</option>
            <option <? if ($source=="Esprit Provence") print("selected") ?>>Esprit
            Provence</option>
            <option <? if ($source=="Chambres d&rsquo;h&ocirc;tes de charme") print("selected") ?>>Chambres
            d&rsquo;h&ocirc;tes de charme</option>
            <option <? if ($source=="Provenceweb") print("selected") ?>>Provenceweb</option>
            <option <? if ($source=="Horizon Provence") print("selected") ?>>Horizon
            Provence</option>
            <option <? if ($source=="Chambres d&rsquo;h&ocirc;tes Provence") print("selected") ?>>Chambres
            d&rsquo;h&ocirc;tes Provence</option>
            <option <? if ($source=="Chambres d&rsquo;h&ocirc;tes sud") print("selected") ?>>Chambres
            d&rsquo;h&ocirc;tes sud</option>
            <option <? if ($source=="anders") print("selected") ?>>anders</option>
        </select>
        <input type="submit" name="button" value="Abschicken">
    </fieldset>
</form>
</div>
<? include("_footer_de.php") ?>
</body>
</html>

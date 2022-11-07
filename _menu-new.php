<? //echo "doc :".$_SERVER[REQUEST_URI]; ?>

<!------ MENU  ------>
<script >
    function myFunction() {
    var x = document.getElementById("menu");
    if(x.style.display==""){x.style.display="none"};
    if (x.style.display=="none") {x.style.display="flex" ; }
    else {x.style.display="none" ;}
    }

  function myFunction2() {
  var y = document.getElementById("btn-menu").getAttribute("aria-expanded"); 
   if (y == "true")  { y = "false" } else { y = "true" }
   document.getElementById("btn-menu").setAttribute("aria-expanded", y);
   /*document.getElementById("btn-menu").innerHTML = "aria-expanded =" + y;*/
   }
</script>	

<nav class="navbar" id="navbar">
  <div id="contact-menu">
    <div id="titre-menu"><a href="/">Villa Velleron</a></div>
    
    <div id="contact_accueil">
     ☎ <a href="tel:+33432742496">+33(0)4 32 74 24 96</a>
    &nbsp;
     ✉ <a href="mailto:welcome@villavelleron.com">welcome@villavelleron.com</a>
    </div>

  </div>
    <ul role="menu" aria-labelledby="btn-menu" class="menu" id="menu">

    <?php

     if (stristr($_SERVER[REQUEST_URI],"index_deutsch")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-zimmer")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-ferienwohnung")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-abendessen")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-preise")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-reservation")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-anfahrt")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-provence")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-velleron")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-freizeit")) $langue="de";
     elseif (stristr($_SERVER[REQUEST_URI],"de-gaestebuch")) $langue="de";

     if (stristr($_SERVER[REQUEST_URI],"index_english")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-guestrooms")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-holidayflat")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-dinner")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-rates")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-reservation")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-access")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-provence")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-velleron")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-leisure")) $langue="en";
     elseif (stristr($_SERVER[REQUEST_URI],"en-guestbook")) $langue="en";

    //echo "langue = $langue"; echo $_SERVER[REQUEST_URI];
    ?>
    <?php if ($langue=="en") { // menu anglais ?>

    <?php
        if (stristr($_SERVER[REQUEST_URI],"index_english")) echo("<li><h2>Home</h2></li>"); else  echo("<li><a href=\"/index_english\">Home</a></li>");
        
        if (stristr($_SERVER[REQUEST_URI],"en-guestrooms")) echo ("<li><h2>Guest rooms</h2></li>"); else  echo ("<li><a href=\"/en-guestrooms\">Guest rooms</a></li>");
        
        if (stristr($_SERVER[REQUEST_URI],"en-holidayflat")) echo ("<li><h2>Holiday Flat</h2></li>"); else  echo ("<li><a href=\"en-holidayflat\">Holiday Flat</a></li>");
        
        if (stristr($_SERVER[REQUEST_URI],"en-dinner")) echo ("<li><h2>Dinner</h2></li>"); else  echo ("<li><a href=\"/en-dinner\">Dinner</a></li>");
        
        if (stristr($_SERVER[REQUEST_URI],"en-rates")) echo ("<li><h2>Rates</h2>"); else  echo ("<li><a href=\"/en-rates\">Rates</a></li>");
        
        if (stristr($_SERVER[REQUEST_URI],"en-reservation.php")) echo ("<li><h2>Reservation</h2></li>"); else  echo ("<li><a href=\"/en-reservation.php\">Reservation</a></li>");
        
        if (stristr($_SERVER[REQUEST_URI],"en-access")) echo ("<li><h2>Access</h2></li>"); else  echo ("<li><a href=\"/en-access\">Access</a></li>");
        
        if (stristr($_SERVER[REQUEST_URI],"en-provence")) echo ("<li><h2>Provence</h2></li>"); else  echo ("<li><a href=\"/en-provence\">Provence</a></li>");

        if (stristr($_SERVER[REQUEST_URI],"en-velleron")) echo ("<li><h2>Velleron</h2></li>"); else  echo ("<li><a href=\"/en-velleron\">Velleron</a></li>");

        if ($_SERVER[REQUEST_URI]== "/en-leisure.htm") echo ("<li><h2>Leisure</h2></li>"); else  echo ("<li><a href=\"/en-leisure\">Leisure</a></li>");

        if ($_SERVER[REQUEST_URI]== "/en-guestbook.htm") echo ("<li><h2>Guestbook</h2></li>"); else  echo ("<li><a href=\"/en-guestbook\">Guestbook</a></li>");

        $urlAccueilVelo="https://en.francevelotourisme.com/accommodation/bed-and-breakfast/villa-velleron";
    ?>

    <?php } elseif ($langue=="de") { // menu allemand ?>

<?php
    if (stristr($_SERVER[REQUEST_URI],"index_deutsch")) echo("<li><h2>Villa Velleron</h2></li>"); else  echo("<li><a href=\"/index_deutsch\">Villa Velleron</a></li>");
    
    if (stristr($_SERVER[REQUEST_URI],"de-zimmer")) echo ("<li><h2>Zimmer</h2></li>"); else  echo ("<li><a href=\"/de-zimmer\">Zimmer</a></li>");
    
    if (stristr($_SERVER[REQUEST_URI],"de-ferienwohnung")) echo ("<li><h2>Ferienwohnung</h2></li>"); else  echo ("<li><a href=\"de-ferienwohnung\">Ferienwohnung</a></li>");
    
    if (stristr($_SERVER[REQUEST_URI],"de-abendessen")) echo ("<li><h2>Abendessen</h2></li>"); else  echo ("<li><a href=\"/de-abendessen\">Abendessen</a></li>");
    
    if (stristr($_SERVER[REQUEST_URI],"de-preise")) echo ("<li><h2>Preise</h2>"); else  echo ("<li><a href=\"/de-preise\">Preise</a></li>");
    
    if (stristr($_SERVER[REQUEST_URI],"de-reservation")) echo ("<li><h2>Reservierung</h2></li>"); else  echo ("<li><a href=\"/de-reservation.php\">Reservierung</a></li>");
    
    if (stristr($_SERVER[REQUEST_URI],"de-anfahrt")) echo ("<li><h2>Anfahrt</h2></li>"); else  echo ("<li><a href=\"/de-anfahrt\">Anfahrt</a></li>");
    
    if (stristr($_SERVER[REQUEST_URI],"de-provence")) echo ("<li><h2>Provence</h2></li>"); else  echo ("<li><a href=\"/de-provence\">Provence</a></li>");

    if (stristr($_SERVER[REQUEST_URI],"de-velleron")) echo ("<li><h2>Velleron</h2></li>"); else  echo ("<li><a href=\"/de-velleron\">Velleron</a></li>");

    if ($_SERVER[REQUEST_URI]== "/de-freizeit.htm") echo ("<li><h2>Freizeit</h2></li>"); else  echo ("<li><a href=\"/de-freizeit\">Freizeit</a></li>");

    if ($_SERVER[REQUEST_URI]== "/de-gaestebuch.htm") echo ("<li><h2>Gästebuch</h2></li>"); else  echo ("<li><a href=\"/de-gaestebuch\">Gästebuch</a></li>");

    $urlAccueilVelo="https://de.francevelotourisme.com/accommodation/bed-and-breakfast/villa-velleron";
?>

    <?php } else { // menu français ?>
    
        <? 
            if ($_SERVER[REQUEST_URI]== "/" || $_SERVER[REQUEST_URI]== "/index.html") echo("<li><h2>Accueil</h2></li>"); else  echo("<li><a href=\"/\">Accueil</a></li>");
            
            if ($_SERVER[REQUEST_URI]== "/fr-chambresdhotes.htm") echo ("<li><h2>Chambres</h2></li>"); else  echo ("<li><a href=\"/fr-chambresdhotes\">Chambres</a></li>");
            
           if ($_SERVER[REQUEST_URI]== "/fr-gite.htm") echo ("<li><h2>Gîte</h2></li>"); else  echo ("<li><a href=\"/fr-gite\">Gîte</a></li>");
            
            if ($_SERVER[REQUEST_URI]== "/fr-tabledhotes.htm") echo ("<li><h2>Table d'h&ocirc;tes</h2></li>"); else  echo ("<li><a href=\"/fr-tabledhotes\">Table d'h&ocirc;tes</a></li>");

            if ($_SERVER[REQUEST_URI]== "/fr-tarifs.htm") echo ("<li><h2>Tarifs</h2>"); else  echo ("<li><a href=\"/fr-tarifs\">Tarifs</a></li>");
            
            if ($_SERVER[SCRIPT_NAME]== "/fr-reservation.php") echo ("<li><h2>R&eacute;servation</h2></li>"); else  echo ("<li><a href=\"/fr-reservation.php\">R&eacute;servation</a></li>");
            
            if ($_SERVER[REQUEST_URI]== "/fr-acces.htm") echo ("<li><h2>Acc&egrave;s</h2></li>"); else  echo ("<li><a href=\"/fr-acces\">Acc&egrave;s</a></li>");
            
            if ($_SERVER[REQUEST_URI]== "/fr-provence.htm") echo ("<li><h2>Provence</h2></li>"); else  echo ("<li><a href=\"/fr-provence\">Provence</a></li>");

            if (stristr($_SERVER[REQUEST_URI],"/fr-velleron")) echo ("<li><h2>Velleron</h2></li>"); else  echo ("<li><a href=\"/fr-velleron\">Velleron</a></li>");

            if ($_SERVER[REQUEST_URI]== "/fr-loisirs.htm") echo ("<li><h2>Loisirs</h2></li>"); else  echo ("<li><a href=\"/fr-loisirs\">Loisirs</a></li>");

            if ($_SERVER[REQUEST_URI]== "/fr-livredor.htm") echo ("<li><h2>Livre d'Or</h2></li>"); else  echo ("<li><a href=\"/fr-livredor\">Livre d'or</a></li>");


             $urlAccueilVelo="https://www.francevelotourisme.com/hebergements/chambres-d-hotes/villa-velleron-1";
          
        ?>


    <?php } ?>

    <?php if ($langue=="en") {  ?>
      <div class="menu-langues"><a href="/">FR</a> | <span class="lien_titre">EN</span> | <a href="/index_deutsch">DE</a></div>
   <?php  }  elseif ($langue=="de") { ?>
    <div class="menu-langues"><a href="/">FR</a> | <a href="/index_english">EN</a> | <span>DE</span></div>
    <?php  }  else { ?>
      <div class="menu-langues"><span>FR</span> | <a href="/index_english">EN</a> | <a href="/index_deutsch">DE</a></div>
    <?php  } ?>

        <!-- li class="icones">
          <a href="https://www.facebook.com/VillaVelleron" class="logo" target="_blank"><img src="/images/logo_facebook.png" alt="Villa Velleron sur Facebook"/></a>
        <a href="https://www.instagram.com/villavelleron/" class="logo" target="_blank"><img src="/images/logo_instagram.png" alt="Villa Velleron sur Instagram"/></a>
      </!-->
  </ul> 
  <button type="button" class="btn-menu" id="btn-menu" aria-haspopup="true" aria-controls="menu" onclick="myFunction(); myFunction2()"> <span class="btn-menu-icon"><span></span></span> <span class="btn-menu-label">Menu</span> <span class="btn-menu-label">Fermer</span> </button>
</nav>
<div class="icones-menu">
          <a href="https://www.facebook.com/VillaVelleron" class="logo" target="_blank"><img src="/images/logo_facebook.png" alt="Villa Velleron sur Facebook"/></a>
        <a href="https://www.instagram.com/villavelleron/" class="logo" target="_blank"><img src="/images/logo_instagram.png" alt="Villa Velleron sur Instagram"/></a>
        <a href="https://www.gites-de-france.com/fr/provence-alpes-cote-dazur/vaucluse/villa-velleron-84g1555" target="_blank"><img src="/images/logo_gitesdefrance.png" alt="Villa Velleron Gites de France"/></a>
          <a href="<?php echo $urlAccueilVelo ?>" target="_blank"><img src="/images/logo_accueilvelo.png" alt="Villa Velleron Accueil Velo"/></a>
          <a href="https://www.tripnbike.com/place/villa-velleron" target="_blank"><img src="/images/logo_bikers.png" alt="Villa Velleron Accueil Velo"/></a>
</div>
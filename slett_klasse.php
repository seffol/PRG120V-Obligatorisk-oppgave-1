<?php  /* slett-flere-poststeder */
/*
/*  Programmet lager et skjema for å velge flere poststeder som skal slettes  
/*  Programmet sletter de valgte poststedene
*/
?> 

<script src="funksjoner.js"> </script>

<h3>Slett Klasser</h3>

<form method="post" action="" id="slettKlasse" name="slettKlasse" onSubmit="return bekreft()">
  Poststed <br />
  <?php include("dynamiske-funksjoner.php"); sjekkKlasse(); ?> <br/>
  <input type="submit" value="Slett Klasse" name="slettKlasse" id="slettKlasseKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettKlasseKnapp"]))
    {
      $klasse=$_POST ["Klasse"];
      $antall=count($klasse);

          include("db.php");  	
          for ($r=0;$r<$antall;$r++)
            {
              $sqlSetning="DELETE FROM poststed WHERE postnr='$postnr[$r]';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
            }
          print ("De valgte poststedene er n&aring; slettet <br />");
        }

?> 
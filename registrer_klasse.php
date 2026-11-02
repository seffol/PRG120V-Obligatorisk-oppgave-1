<?php  /* registrer-poststed */
/*
/*  Programmet lager et html-skjema for å registrere et poststed
/*  Programmet registrerer data (postnr og poststed) i databasen
*/
?> 

<h3>Registrer Klasse </h3>

<form method="post" action="" id="registrerKlasse" name="registrerKlasse">
  Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  Klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
  Studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
  <input type="submit" value="Registrer Klassekode" id="registrerKlassekodedKnapp" name="registrerKlassekodeKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST ["registrerKlassekodeKnapp"]))
    {
      $klassekode=$_POST ["klassekode"];
      $klassenavn=$_POST ["klassenavn"];

      include("db.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM poststed WHERE postnr='$klassekode';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader!=0)  /* poststedet er registrert fra før */
            {
            print ("Poststedet er registrert fra f&oslashr");
            }
          else
            {
              $sqlSetning="INSERT INTO poststed VALUES('$klassekode','$klassenavn');";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
                /* SQL-setning sendt til database-serveren */

              print ("F&oslash;rlgende poststed er n&aring; registrert: $klassekode $klassenavn"); 
            }
    }
?> 
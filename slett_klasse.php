<?php
/* slett_klasse */
/*
/*  Programmet lager et skjema for å velge en klasse som skal slettes
/*  Programmet sletter den valgte klassen, men ikke hvis klassen har studenter
*/
include("db.php");  /* tilkobling til database-serveren utført og valg av database foretatt */
?>

<p><a href="index.html">Tilbake til hovedsiden</a></p>

<h3>Slett klasse</h3>

<?php
  if (isset($_POST["slettKlasseKnapp"]))
    {
      $klassekode=$_POST["klassekode"];

      /* sjekker om det finnes studenter i klassen */
      $sqlSetning="SELECT * FROM student WHERE klassekode='$klassekode';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat);

      if ($antallRader!=0)  /* klassen har studenter */
        {
          print ("Klassen $klassekode kan ikke slettes fordi den har studenter <br /><br />");
        }
      else
        {
          $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
          mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
          /* SQL-setning sendt til database-serveren */

          print ("Klassen $klassekode er n&aring; slettet <br /><br />");
        }
    }
?>

<form method="post" action="" id="slettKlasse" name="slettKlasse" onsubmit="return confirm('Er du sikker på at du vil slette klassen?');">
  Klassekode
  <select id="klassekode" name="klassekode" required>
    <option value="">Velg klasse</option>
<?php
  $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

  while ($rad=mysqli_fetch_assoc($sqlResultat))
    {
      $klassekode=$rad["klassekode"];
      $klassenavn=$rad["klassenavn"];

      print ("<option value='$klassekode'>$klassekode - $klassenavn</option>");
    }
?>
  </select> <br/>
  <input type="submit" value="Slett klasse" id="slettKlasseKnapp" name="slettKlasseKnapp" />
</form>
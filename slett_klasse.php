<?php
include("db.php");  
?>

<p><a href="index.html">Tilbake til hovedsiden</a></p>

<h3>Slett klasse</h3>

<?php
  if (isset($_POST["slettKlasseKnapp"]))
    {
      $klassekode=$_POST["klassekode"];

      $sqlSetning="SELECT * FROM student WHERE klassekode='$klassekode';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat);

      if ($antallRader!=0) 
        {
          print ("Klassen $klassekode kan ikke slettes fordi den har studenter <br /><br />");
        }
      else
        {
          $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
          mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");

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
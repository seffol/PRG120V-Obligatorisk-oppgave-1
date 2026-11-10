<?php 

include("db.php");
?>

<p><a href="index.html">Tilbake til hovedsiden</a></p>

<h3>Slett student</h3>

<?php
  if (isset($_POST ["slettStudentKnapp"]))
    {
      $brukernavn=$_POST ["student"];

          $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat);

          if ($antallRader==0) 
            {
              print ("Student finnes ikke <br /><br />");
            }
          else
            {
              $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
              

              print ("F&oslash;lgende student er n&aring; slettet: $brukernavn <br /><br />");
            }
    }
?>

<form method="post" action="" id="slettStudent" name="slettStudent" onsubmit="return confirm('Er du sikker på at du vil slette studenten?');">
  Student
  <select id="student" name="student" required>
    <option value="">Velg student</option>
<?php
  $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

  while ($rad=mysqli_fetch_assoc($sqlResultat))
    {
      $bn=$rad["brukernavn"];
      $fornavn=$rad["fornavn"];
      $etternavn=$rad["etternavn"];

      print ("<option value='$bn'>$bn - $fornavn $etternavn</option>");
    }
?>
  </select> <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>
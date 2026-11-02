<?php
/* registrer_student */
/*
/*  Programmet lager et html-skjema for å registrere en student
/*  Programmet registrerer data (brukernavn, fornavn, etternavn og klassekode) i databasen
*/
include("db.php");  /* tilkobling til database-serveren utført og valg av database foretatt */
?>

<h3>Registrer student</h3>

<form method="post" action="" id="registrerStudent" name="registrerStudent">
  Brukernavn <input type="text" id="brukernavn" name="brukernavn" maxlength="7" required /> <br/>
  Fornavn <input type="text" id="fornavn" name="fornavn" maxlength="50" required /> <br/>
  Etternavn <input type="text" id="etternavn" name="etternavn" maxlength="50" required /> <br/>
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
  <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
  if (isset($_POST["registrerStudentKnapp"]))
    {
      $brukernavn=$_POST["brukernavn"];
      $fornavn=$_POST["fornavn"];
      $etternavn=$_POST["etternavn"];
      $klassekode=$_POST["klassekode"];

      $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat);

      if ($antallRader!=0)  /* studenten er registrert fra før */
        {
          print ("Studenten er registrert fra f&oslash;r");
        }
      else
        {
          $sqlSetning="INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
          mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
          /* SQL-setning sendt til database-serveren */

          print ("F&oslash;lgende student er n&aring; registrert: $brukernavn $fornavn $etternavn $klassekode");
        }
    }
?>
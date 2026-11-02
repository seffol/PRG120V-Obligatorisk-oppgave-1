<?php  /* vis-alle-poststeder */
/*
/*  Programmet skriver ut alle registrerte poststeder
*/
  include("db.php");  /* tilkobling til database-serveren utf�rt og valg av database foretatt */
?>
  <p><a href="index.html">Tilbake til hovedsiden</a></p>

<?php
  $sqlSetning="SELECT * FROM student;";
  
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
    /* SQL-setning sendt til database-serveren */
	
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  print ("<h3>Registrerte Studenter</h3>");
  print ("<table border=1>");  
  print ("<tr><th align=left>postnr</th> <th align=left>poststed</th></tr>"); 

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra sp�rringsresultatet */
      $brukernavn=$rad["Brukernavn"];        /* ELLER $postnr=$rad[0]; */
      $fornavn=$rad["Fornavn"]; 
      $etternavn=$rad["Etternavn"];
      $klassekode=$rad["Klassekode"]; 

      print ("<tr> <td> $fornavn </td> <td> $etternavn </td> </tr>");
    }
  print ("</table>"); 
?>
<?php
  include("db.php"); 

  $sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";

  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

  $antallRader=mysqli_num_rows($sqlResultat);  
?>

<p><a href="index.html">Tilbake til hovedsiden</a></p>

<?php
  print ("<h3>Registrerte klasser</h3>");
  print ("<table border=1>");
  print ("<tr><th align=left>klassekode</th> <th align=left>klassenavn</th> <th align=left>studiumkode</th></tr>");

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  
      $klassekode=$rad["klassekode"];
      $klassenavn=$rad["klassenavn"];
      $studiumkode=$rad["studiumkode"];

      print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> <td> $studiumkode </td> </tr>");
    }
  print ("</table>");
?>
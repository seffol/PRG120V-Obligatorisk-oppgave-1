<?php


function listeboksPostnr()
{
  include("db-tilkobling.php");
      
  $sqlSetning="SELECT * FROM poststed ORDER BY postnr;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 

	
  $antallRader=mysqli_num_rows($sqlResultat); 

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  
      $postnr=$rad["postnr"]; 
      $poststed=$rad["poststed"];

      print("<option value='$postnr'>$postnr $poststed</option>");  
    }
}

function sjekkbokserPostnr()
{
  include("db.php"); 
      
  $sqlSetning="SELECT * FROM poststed ORDER BY postnr;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");  

      
  $antallRader=mysqli_num_rows($sqlResultat); 

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);
      $postnr=$rad["postnr"];       
      $poststed=$rad["poststed"];    

      print("<input type='checkbox' id='postnr' name='postnr[]' value='$postnr' /> $postnr $poststed <br/>");  
    }
}



?>
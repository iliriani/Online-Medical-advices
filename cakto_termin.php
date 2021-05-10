<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cakto Termin</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>

<div id="wrap">

<div id="header">
<h1><a href="#">Laboratori Mjeksore</a></h1>
<h2>Keshilla mjeksore online</h2>
</div>

<div id="right">

<h2><a href="#komenti">Cakto termin</a></h2><hr>
<div class="articles">
<?
include("lablib.inc");
include("libfunc.inc");
include("data.inc");

//$rreshti_i_klubit = kontrollojePerdoruesin();
$data=time();
function shkruajTerminet()
{
	global $rreshti_i_terminit;
        $terminet = merrtermin("terminet");
        if ( ! $terminet )
	{
		print "Nuk keni asnjë termin te caktuar<P>";
		return;
	}
           

	print "<table border=1 bordercolor=#6587E0 bgcolor=#D8D8D8>\n";
	print "<td><b>Data</b></td>\n<td><b>Termini</b></td>\n";
	
	foreach ( $terminet as $rreshti )
	{
		print "<tr>\n";	
              
                  print "<td>".date("j M Y H.i", $rreshti[data])."</td>\n";
                  print "<td><a href=\"$GLOBALS[PHP_SELF]?termin_id=$rreshti[id_termini]";
		  print "&veprimi=fshijeterminin&".SID."\"";
		  print "onClick=\"return window.confirm('A jeni te sigurte se doni ta fshini kete termin')\">";
		  print "fshije</a><br></td>\n";
		  print "</tr>\n";
	}
	print "</table>\n";
}

if ( isset( $veprimi ) && $veprimi=="fresko" )
{
		
	$pacient_id=$sesioni[pacid];
                   
                       foreach ( array( "muajt", "vitet", "ditet", "minutat" )
		       as $njesia_e_dates )
	        {
		       if ( ! isset( $forma[$njesia_e_dates] ) )
		     {
			//$mesazhi .= "PANIK: Nuk mund ta kuptoj atë datë";
			break;
		     }
	        }
	         $data = mktime( $forma[oret], $forma[minutat], 0, $forma[muajt],
		 $forma[ditet], $forma[vitet] );
	          if ( $data < time() )
	{ $mesazhi .= "Keni zgjedhur date ne te kaluaren!"; }
	          else{
		      caktotermin($pacient_id,$data);
                      header("Location: pacientet.php?".SID);
	          }
               
		
		
	

}
else
{
	//$forma = $rreshti_i_klubit;
}


if ( isset( $veprimi ) &&
	$veprimi == "fshijeterminin" && isset( $termin_id ) )
{        
	fshijeTerminin( $termin_id );
	$mesazhi .= "Termini juaj eshte anuluar!<br>";
}
?>
<form action="<?php print $PHP_SELF;?>">
<input type="hidden" name="veprimi" value="fresko">
<input type="hidden" name="<?php print session_name() ?>"
value="<?php print session_id() ?>">
<br>
<p>
<? shkruajTerminet(); ?>
</p>
<br>
<p>
<b>Cakto termin:</b>
</p>
<br>
<hr>
<p>
Data dhe koha: <br>
<select name="forma[ditet]">
<?php shkruajOpcionetEDiteve( $data ) ?>
</select>
<select name="forma[muajt]">
<?php shkruajOpcionetEMuajve( $data ) ?>
</select>
<select name="forma[vitet]">
<?php shkruajOpcionetEViteve( $data ) ?>
</select>
<SELECT NAME="forma[oret]">
<? shkruajOpcionetEOreve( $data ) ?>
</SELECT>
<SELECT NAME="forma[minutat]">
<? shkruajOpcionetEMinutave( $data ) ?>
</SELECT>
</p>
<br><br>
<p><input type=submit value="Dergo"></p>
</form>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">cakto termin</a> eshte ajo pjese e aplikacionit ne te cilen mjeku mund te caktoje ndonje termin per pacientin
i cili termin do te shkoje ne llogarine e pacientit perkates.
</div>
</div>

<div id="left"> 

<h3>Sherbimet :</h3>
<?
include("navpublic1.inc");
?>

<h3>Sherbimet Online</h3>
<ul>
<li><a href="#">Universiteti i Prishtines</a></li> 
<li><a href="#">QKUK</a></li> 
<li><a href="#">Rezonanca</a></li>
<li><a href="#">Laboratori Mjekesor</a></li> 
<li><a href="#">Mjekesia group</a></li>

</ul>

</div>
<div style="clear: both;"> </div>

<div id="footer">
Punuar nga <a href="#">Ilirian Ibrahimi</a>
</div>
</div>


</body>
</html>
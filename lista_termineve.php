<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lista Termineve</title>
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

<h2><a href="#komenti">Lista e termineve</a></h2><hr>
<div class="articles">
<?php
include("lablib.inc");
include("libfunc.inc");
//include("sesioni.inc");
//$rreshti_i_pacienti = kontrollojePerdoruesin();
//kontrolloShenimetEPacientit( $rreshti_i_pacienti );

function shkruajTerminet()
{
	global $rreshti_i_terminit;
        $terminet = merrtermin("terminet");
        if ( ! $terminet )
	{
		print "Nuk keni asnje termin te caktuar<P>";
		return;
	}
           

	print "<table border=1 bordercolor=#6587E0 bgcolor=#D8D8D8>\n";
	print "<td><b>Data</b></td>\n<td><b>Termini</b></td>\n";
	
	foreach ( $terminet as $rreshti )
	{
		print "<tr>\n";	
              
                  print "<td><b>".date("j M Y H.i", $rreshti[data])."</b></td>\n";
                  print "<td><a href=\"$GLOBALS[PHP_SELF]?termin_id=$rreshti[id_termini]";
		  print "&veprimi=fshijeterminin&".SID."\"";
		  print "onClick=\"return window.confirm('A jeni te sigurte se doni ta fshini kete termin')\">";
		  print "fshije</a><br></td>\n";
		  print "</tr>\n";
	}
	print "</table>\n";
}
$mesazhi="";


if ( isset( $veprimi ) &&
	$veprimi == "fshijeterminin" && isset( $termin_id ) )
{        
	fshijeTerminin( $termin_id );
	$mesazhi .= "Termini juaj eshte anuluar!<br>";
}

?>
<?php
if ( $mesazhi != "" )
{
	print "<b>$mesazhi</b>";
}
?>

<?php
shkruajTerminet();
?>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">lista e termineve </a> eshte nje pjese e aplikacionit nga e cila mund te shikohet lista e tremineve qe jane te caktuara nga mjeku se kur mund te paraqiten pacientet .
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
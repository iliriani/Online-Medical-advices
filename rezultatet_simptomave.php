<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Rezultati i Simptomave</title>
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

<h2><a href="#komenti">Simptomat e Derguara</a></h2>
<div class="articles">
<?php
include("lablib.inc");
include("libfunc.inc");
//include("sesioni.inc");
?>

 <p> emri:
<? echo "<b><a>$sesioni[perdoruesi]</a></b>";?>
<br>
  mbiemri:
<? echo "<b><a>$sesioni[mbiemri]</a></b>";?>
<br></p><hr>
<?
$rreshti_i_pacienti = kontrollojePerdoruesin1();
kontrolloShenimetEPacientit( $rreshti_i_pacienti );

function shkruajSimptomat()
{
	global $rreshti_i_pacienti;
        $ngjarjet = merrsimptom($rreshti_i_pacienti[id_pacienti]);
        if ( ! $ngjarjet )
	{
		print "Nuk keni asnj� simptom te derguar<P>";
		return;
	}
           

	print "<table border=1 bordercolor=#6587E0 bgcolor=#D8D8D8>\n";
	print "<td><b>Data</b></td>\n<td><b>Simptoma</b></td>\n
	<td><b>&nbsp;</b></td>\n";
	foreach ( $ngjarjet as $rreshti )
	{
		print "<tr>\n";
		print "<td><b>".$rreshti[data]."</b></td>\n";
                //print "<td><a href='freskosimp.php'>simptoma $rreshti[id_simp]</a>.</td>\n";
		//print "<td><a href=\"freskongjarjen.php?simp_id=$rreshti[id_simp]&".SID."\">".
		//html($rreshti[id_simp])."</a></td>\n";
		
                
                print "<td><a href=\"$GLOBALS[PHP_SELF]?simp_id=$rreshti[id_simp]";
		print "&veprimi1=shikosimp&".SID."\"";
		print "onClick=\"\">";
		print "shiko</a><br></td>\n";
		//print "</tr>\n";

                print "<td><a href=\"$GLOBALS[PHP_SELF]?simp_id=$rreshti[id_simp]";
		print "&veprimi=fshijesimp&".SID."\"";
		print "onClick=\"return window.confirm('A jeni të sigurtë se doni ta fshini këtë simptom')\">";
		print "fshije</a><br></td>\n";
		print "</tr>\n";
	}
	print "</table>\n";
}
$mesazhi="";
if ( isset( $veprimi ) &&
	$veprimi == "fshijesimp" && isset( $simp_id ) )
{
	fshijesimp( $simp_id );
	$mesazhi .= "Ajo simptom tani është histori!<br>";
}

if ( isset( $veprimi1 ) &&
	$veprimi1 == "shikosimp" && isset( $simp_id ) )
{        regsimpid($simp_id);
          // setidsimp(simp_id);
	header( "Location: freskosimp.php?".SID );
}

?>

<?php
if ( $mesazhi != "" )
{
	print "<b>$mesazhi</b>";
}
?>

<?php
shkruajSimptomat();
?>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">rezultati i simptomave</a> eshte pjese e aplikacionit ne te cilen mund te shihni listen e siptomave te derguara sipas 
dates se dergimit.
</div>
</div>

<div id="left"> 

<h3>Sherbimet :</h3>
<?
include("navpublic.inc");
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
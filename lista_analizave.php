<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lista e Analizave</title>
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

<h2><a href="#komenti">Analizat e pranuara</a></h2>
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

function shkruajAnalizat()
{
	global $rreshti_i_pacienti;
        $analizat = merranalize_pac($rreshti_i_pacienti[id_pacienti]);
        if ( ! $analizat )
	{
		print "<p>Nuk keni asnje analize te pranuar</p>";
		return;
	}
           

	print "<table border=1 bordercolor=#6587E0 bgcolor=#D8D8D8>\n";
	print "<td><b>Data</b></td>\n<td><b>Analiza</b></td>\n
	<td><b>&nbsp;</b></td>\n";
	foreach ( $analizat as $rreshti )
	{
		print "<tr>\n";
		print "<td><b>".$rreshti[data]."</b></td>\n";
                           
                print "<td><a href=\"$GLOBALS[PHP_SELF]?analiz_id=$rreshti[id_analiza]";
		print "&veprimi1=shikoanalize&".SID."\"";
		print "onClick=\"\">";
		print "shiko</a><br></td>\n";
		//print "</tr>\n";

                print "<td><a href=\"$GLOBALS[PHP_SELF]?analiz_id=$rreshti[id_analiza]";
		print "&veprimi=fshijeanalize&".SID."\"";
		print "onClick=\"return window.confirm('A jeni te sigurte se doni ta fshini kete analize')\">";
		print "fshije</a><br></td>\n";
		print "</tr>\n";
	}
	print "</table>\n";
}
$mesazhi="";
if ( isset( $veprimi ) &&
	$veprimi == "fshijeanalize" && isset( $analiz_id ) )
{
	fshijeanalize( $analiz_id );
	$mesazhi .= "Ajo analize tani eshte histori!<br>";
}

if ( isset( $veprimi1 ) &&
	$veprimi1 == "shikoanalize" && isset( $analiz_id ) )
{        reganalizeid($analiz_id);
         header( "Location: prano_analize.php?".SID );
}

?>

<?php
if ( $mesazhi != "" )
{
	print "<b>$mesazhi</b>";
}
?>

<?php
shkruajAnalizat();
?>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">lista e analizave</a> eshte nje pjese e aplikacionit ku pacienti mund ti shikoje nje analizat te listuara sipas 
dates se pranimit te tyre.
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
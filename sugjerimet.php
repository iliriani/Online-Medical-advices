<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sugjerimet</title>
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

<h2><a href="#komenti">Sugjerimet e pranuara</a></h2>
<div class="articles">
<?
include("lablib.inc");
include("libfunc.inc");
?>
 <p> emri:
<? echo "<b><a>$sesioni[perdoruesi]</a></b>";?>
<br>
  mbiemri:
<? echo "<b><a>$sesioni[mbiemri]</a></b>";?>
<br></p><hr>
<?

//include("sesioni.inc");
$rreshti_i_pacienti = kontrollojePerdoruesin1();
kontrolloShenimetEPacientit( $rreshti_i_pacienti );

function shkruajSimptome()
{
	global $rreshti_i_pacienti;
        $sugjerimet = merrsugjerim($rreshti_i_pacienti[id_pacienti]);
        if ( ! $sugjerimet )
	{
		print "<p>Nuk keni asnj� sugjerim te pranuar</p>";
		return;
	}
           

	print "<table border=1 bordercolor=#6587E0 bgcolor=#D8D8D8>\n";
	print "<td><b>Data</b></td>\n<td><b>Sugjerimet</b></td>\n
	<td><b>&nbsp;</b></td>\n";
	foreach ( $sugjerimet as $rreshti )
	{
		print "<tr>\n";
		print "<td><b>".$rreshti[data]."</b></td>\n";
                             
                print "<td><a href=\"$GLOBALS[PHP_SELF]?sugj_id=$rreshti[id_sugjerimi]&&id_simp=$rreshti[id_simp]";
		print "&veprimi1=shikosugj&".SID."\"";
		print "onClick=\"\">";
		print "shiko</a><br></td>\n";
		//print "</tr>\n";

                print "<td><a href=\"$GLOBALS[PHP_SELF]?sugj_id=$rreshti[id_sugjerimi]";
		print "&veprimi=fshijesugj&".SID."\"";
		print "onClick=\"return window.confirm('A jeni të sigurtë se doni ta fshini këtë sugjerim')\">";
		print "fshije</a><br></td>\n";
		print "</tr>\n";
	}
	print "</table>\n";
}
$mesazhi="";
if ( isset( $veprimi ) &&
	$veprimi == "fshijesugj" && isset( $sugj_id ) )
{
	fshijesugj( $sugj_id );
	$mesazhi .= "Ai sugjerim tani është histori!<br>";
}

if ( isset( $veprimi1 ) &&
	$veprimi1 == "shikosugj" && isset( $sugj_id ) )
{        regsugjid($sugj_id);
         regsimpid($id_simp);
          
	header( "Location: shiko_sugjerim.php?".SID );
}

?>
<?php
if ( $mesazhi != "" )
{
	print "<b>$mesazhi</b>";
}
?>
<?php
shkruajSimptome();
?>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">sugjerimet</a> eshte nje aplikacion ku mjeku mund ti shikoje sugjerimet te cilat jane derguar nga pacientet ne nje date te caktuar.
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
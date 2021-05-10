<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pacientet</title>
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

<h2><a href="#komenti">Simptomat e pranuara</a></h2><hr>
<div class="articles">
<?php
include("lablib.inc");
include("libfunc.inc");

function shkruajNgjarjet()
{
	global $rreshti_i_pacienti;
        $simptomat = merrSimptomat();
        if ( ! $simptomat )
	{
		print "Nuk keni asnjë simptom te derguar<P>";
		return;
	}
           

	print "<table border=1 bordercolor=#6587E0 bgcolor=#D8D8D8>\n";
	print "<td><b>Data</b></td>\n<td><b>Pacienti</b></td>\n<td><b>Simptoma</b></td>\n";
	
	foreach ( $simptomat as $rreshti )
	{
		print "<tr>\n";
		print "<td><b>".$rreshti[data]."</b></td>\n";
                print "<td><b>".$rreshti[emri]." ".$rreshti[mbiemri]."</b></td>\n";
		
                
                print "<td><a href=\"$GLOBALS[PHP_SELF]?simp_id=$rreshti[id_simp]";
		print "&veprimi1=shikosimp&".SID."\"";
		print "onClick=\"\">";
		print "shiko</a><br></td>\n";
		print "</tr>\n";

             
	}
	print "</table>\n";
}
$mesazhi="";


if ( isset( $veprimi1 ) &&
	$veprimi1 == "shikosimp" && isset( $simp_id ) )
{        regsimpid($simp_id);
          $id=getpac_id($simp_id);
           regpacid($id[id_pacienti]);
	header( "Location: sugjero.php?".SID );
}

?>
<?php
if ( $mesazhi != "" )
{
	print "<b>$mesazhi</b>";
}
?>

<?php
shkruajNgjarjet();
?>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">pacientet</a> eshte nje pjese e aplikacionit ne te cilen mjeku i pranon simptomat te ndryshme te cilat jane derguar nga pacientet ne nje date te caktuar . 
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
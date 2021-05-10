<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Termini</title>
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

<h2><a href="#komenti">Termini juaj</a></h2><hr>
<div class="articles">
<?
include("lablib.inc");
include("libfunc.inc");

$rreshti_i_klubit = kontrollojePerdoruesin();
$mesazhi="";
if ( $rreshti_i_klubit) {
$text=merrtermin_pac($sesioni[id]);
if ( ! $text )
	{
		$mesazhi.="<p>Nuk keni asnje termin te pranuar</p><br>";
		
	}
$d=date("j M Y H.i", $text[data]);
}
?>
<?
if ( $mesazhi != "" )
{
	print "<b>$mesazhi</b>";
        exit;
}
?>

<form action="<?php print $PHP_SELF;?>">
<input type="hidden" name="veprimi" value="fresko">
<input type="hidden" name="<?php print session_name() ?>"
value="<?php print session_id() ?>">
<br>
<p>I/E nderuar:<b><? echo " ".$sesioni[perdoruesi]?></b></p>
<p>
Ju keni nje termin te caktuar ne kete date:
<b><?echo " ".$d;?></b>
</p>
</form>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">terminet e pranuara</a> eshte nje pjese e aplikacion ne te cilen pacientet mund ti shikojne terminet  te cilat jane caktuar ne nje date te caktuar nga mjeku.
</div>
</div>

<div id="left"> 

<h3>Categories :</h3>
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
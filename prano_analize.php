<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Prano Analize</title>
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

<h2><a href="#komenti">Analizat</a></h2>
<div class="articles">
<?
include("lablib.inc");
include("libfunc.inc");

$rreshti_i_klubit = kontrollojePerdoruesin();
$mesazhi="";
if ( $rreshti_i_klubit) {
$text=merrpershkanalize($sesioni[analid]);
if ( ! $text )
	{
		$mesazhi.="Nuk keni asnjë analize te pranuar<br>";
                 exit;
		
	}
$d=$text[pershkrimi];
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
Rezultati i analizave tuaja:<br>
<b><?echo "- ".$d;?></b>
</p>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">pranimi i analizave</a> eshte pjese e aplikacion me crast pacieneti mund ta shikoje rezultatin e analizave te bera
me pare te cilat te cilat i ka zgjedhur sipas dates se pranimit.
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
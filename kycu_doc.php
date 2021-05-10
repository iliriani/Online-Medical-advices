<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Kyqu_doc</title>
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

<h2><a href="#komenti">Kyqu</a></h2><hr>
<div class="articles">
<?php
//error_reporting(0);
include("libfunc.inc");
include("lablib.inc");
$mesazhi = "";
if ( isset( $veprimi ) && $veprimi == "kycu" )
{
	if ( empty( $forma[perdoruesi] ) || empty( $forma[fjalekalimi] ) )
		$mesazhi .= "duhet t'i plotësoni të gjitha fushat<br>\n";
	if ( ! ( $rreshti =
				kontrolloFjalekalimin( $forma[perdoruesi], $forma[fjalekalimi] ) ) )
	$mesazhi .= "FjalÃ«kalim jokorrekt. Provoni pÃ«rsÃ«ri.<br>\n";
	if ( $mesazhi == "" ) // nuk kemi gjetë gabime
	{   
		pastrojeSesioninEDoc( $rreshti[id_doc], $rreshti[emri],
			$rreshti[fjalekalimi] );
		header( "Location: hyrja_doc.php?".SID );
                
	}
}
?>
<?php
if ( $mesazhi != "" )
{
	print "<p><b>$mesazhi</b></p>";
}
?>
<p>
<form action="<?php print $PHP_SELF;?>">
<input type="hidden" name="veprimi" value="kycu">
<input type="hidden" name="<?php print session_name() ?>"
value="<?php print session_id() ?>">
</p><p>
admin: <br>
<input type="text" name="forma[perdoruesi]"
value="<?php print $forma[perdoruesi] ?>">
</p><p>
FjalÃ«kalimi: <br>
<input type="password" name="forma[fjalekalimi]" value="">
</p><p>
<input type="submit" value="konfirmo">
</form>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">kyqu</a> eshte nje pjese e aplikacionit  ku mund te kyqet mjeku dhe te jete ne sherbim te pacienteve te vet .
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
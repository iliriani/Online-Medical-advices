<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Antaresohu</title>
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

<h2><a href="#">Antaresohu</a></h2><hr>
<div class="articles">
<?php
//error_reporting(0);
include("libfunc.inc");
include("lablib.inc");
$mesazhi = "";
if ( isset( $veprimi ) && $veprimi == "regjistrohu" )
{
	if ( empty( $forma[perdoruesi] ) ||
			empty( $forma[fjalekalimi] ) ||
			empty( $forma[fjalekalimi2] ) ||
                        empty( $forma[mbiemri] ) ||
                        empty( $forma[emaili] ) ||
                        empty( $forma[tel] )
)
		$mesazhi .= "<p>duhet t'i mbushni të gjitha fushat</p><BR>\n";
	if ( $forma[fjalekalimi] != $forma[fjalekalimi2] )
		$mesazhi .= "<p>Fjalëkalimet tuaja nuk përputhen</p><BR>\n";
	if ( strlen( $forma[fjalekalimi] ) > 20 )
		$mesazhi .= "<p>Fjalëkalimi juaj duhet të jetë më i shkurtë se 20 karakterë</p><BR>\n";
	if ( strlen( $forma[perdoruesi] ) > 20 )
		$mesazhi .= "<p>Përdoruesi juaj duhet të jetë më i shkurtë se 20 karakterë</p><BR>\n";
	if ( merreRreshtin( "pacientet","emri","mbiemri", $forma[perdoruesi], $forma[mbiemri] ) )
		$mesazhi .=
			"<p>Përdoruesi \"$forma[perdoruesi] $forma[mbiemri]\" tashmë ekziston. Provoni një tjetër</p><BR>\n";
	if ( $mesazhi == "" ) // nuk gjetem gabime
	{
		$id = perdoruesIRi( $forma[perdoruesi],$forma[mbiemri],md5($forma[fjalekalimi]),$forma[emaili],$forma[tel] );
		pastrojeSesioninEAnetarit( $id, $forma[perdoruesi],$forma[mbiemri], $forma[fjalekalimi] );
		header( "Location: hyrja.php?".SID );
		exit;
	}
}

?>
<?php
if ( $mesazhi != "" )
{
	print "<b>$mesazhi</b><p>";
}
?>
<p>

<form action="<?php print $PHP_SELF; ?>">
<input type="hidden" name="veprimi" value="regjistrohu">
<input type="hidden" name="<?php print session_name() ?>"
value="<?php print session_id() ?>">
Emri: <br>
<input type="text" name="forma[perdoruesi]"
value="<?php print $forma[perdoruesi] ?>" maxlength=20>
</p>
<p>
Mbiemri: <br>
<input type="text" name="forma[mbiemri]"
value="<?php print $forma[mbiemri] ?>" maxlength=20>
</p>
<p>
E-maili: <br>
<input type="text" name="forma[emaili]"
value="<?php print $forma[emaili] ?>" maxlength=20>
</p>
<p>
FjalÃ«kalimi: <br>
<input type="password" name="forma[fjalekalimi]" value="" maxlength=20>
</p>
<p>
Konfirmo fjalÃ«kalimin: <br>
<input type="password" name="forma[fjalekalimi2]" value="" maxlength=20>
</p>
<p>
Tel: <br>
<input type="text" name="forma[tel]"
value="<?php print $forma[tel] ?>" maxlength=8>
</p>
<p>
<input type="submit" value="ruaj">
</p>
<br>
<p><a href="Kyqu.php">Klikoni ketu per tu kyqur</a></p>
</form>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
Donec nulla. Aenean eu augue ac nisl tincidunt rutrum. Proin erat justo, pharetra eget, posuere at, malesuada 
et, nulla. Donec pretium nibh sed est faucibus suscipit. Nunc nisi. Nullam vehicula. In ipsum lorem, bibendum sed, 
consectetuer et, gravida id, erat. Ut imperdiet, leo vel condimentum faucibus, risus justo feugiat purus, vitae 
congue nulla diam non urna.
</div>
<h2><a href="#">Title with a link - Example of heading 2</a></h2>
<div class="articles">
Donec nulla. Aenean eu augue ac nisl tincidunt rutrum. Proin erat justo, pharetra eget, posuere at, malesuada 
et, nulla. Donec pretium nibh sed est faucibus suscipit. Nunc nisi. Nullam vehicula. In ipsum lorem, bibendum sed, 
consectetuer et, gravida id, erat. Ut imperdiet, leo vel condimentum faucibus, risus justo feugiat purus, vitae 
congue nulla diam non urna.
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
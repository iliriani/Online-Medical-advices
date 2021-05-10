<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ndrysho</title>
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

<h2><a href="#komenti">Ndrysho</a></h2><hr>
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
		$mesazhi .= "<p>duhet t'i mbushni te gjitha fushat</p><BR>\n";
	if ( $forma[fjalekalimi] != $forma[fjalekalimi2] )
		$mesazhi .= "<p>Fjalekalimet tuaja nuk perputhen</p><BR>\n";
	if ( strlen( $forma[fjalekalimi] ) > 20 )
		$mesazhi .= "<p>Fjalekalimi juaj duhet te jete me i shkurte se 20 karaktere</p><BR>\n";
	if ( merrevleren("fjalekalimi") != md5($forma[konfirmo]))
		$mesazhi .= "<p>Fjalekalimi juaj nuk eshte i sakte</p><BR>\n";
	if ( strlen( $forma[perdoruesi] ) > 20 )
		$mesazhi .= "<p>Perdoruesi juaj duhet te jete me i shkurte se 20 karaktere</p><BR>\n";
	//if ( merreRreshtin( "pacientet","emri","mbiemri", $forma[perdoruesi], $forma[mbiemri] ) )
	//	$mesazhi .=
	//		"<p>Perdoruesi \"$forma[perdoruesi] $forma[mbiemri]\" tashme ekziston. Provoni nje tjeter</p><BR>\n";
	if ( $mesazhi == "" ) // nuk gjetem gabime
	{	
				  $id=ndrysho($forma[perdoruesi],$forma[mbiemri],md5($forma[fjalekalimi]),$forma[emaili],$forma[tel],$sesioni[id] );
		//session_unregister("sesioni");
		pastrojeSesioninEAnetarit( $sesioni[id], $forma[perdoruesi],$forma[mbiemri], $forma[fjalekalimi] );
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
value="<?php print merrevleren("emri") ?>" maxlength=20>
</p>
<p>
Mbiemri: <br>
<input type="text" name="forma[mbiemri]"
value="<?php print merrevleren("mbiemri") ?>" maxlength=20>
</p>
<p>
E-maili: <br>
<input type="text" name="forma[emaili]"
value="<?php print merrevleren("e_mail") ?>" maxlength=20>
</p>
<p>
Fjalekalimi aktual:<br>
<input type="password" name="forma[konfirmo]" value="" maxlength=20>
</p>
<p>
Fjalekalimi: <br>
<input type="password" name="forma[fjalekalimi]" value="" maxlength=20>
</p>
<p>
Konfirmo fjalekalimin: <br>
<input type="password" name="forma[fjalekalimi2]" value="" maxlength=20>
</p>
<p>
Tel: <br>
<input type="text" name="forma[tel]"
value="<?php print merrevleren("tel") ?>" maxlength=8>
</p>
<p>
<input type="submit" value="ruaj">
</p>
<br>
</form>	 
<br /><br />
<img src="images/barnat.jpg" alt="Example pic" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">ndrysho</a> eshte pjese e aplikacionit ne te cilen pacienti mund ti modifikoje te dhenat e personale 
te cilat ai i kishte i futur kur ishte antaresuar.
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
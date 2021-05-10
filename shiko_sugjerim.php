<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shiko sugjerimin</title>
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

<h2><a href="#komenti">Sugjerimi i pranuar</a></h2>
<div class="articles">
<?
include("lablib.inc");
include("libfunc.inc");

$rreshti_i_klubit = kontrollojePerdoruesin();

if ( $rreshti_i_klubit) {
$sugjerimi = merrpershksugjerimi($sesioni[sugjid]);
$simptoma = merrpershksimptomes($sesioni[simpid]);
}
?>
<form action="<?php print $PHP_SELF;?>">
<input type="hidden" name="veprimi" value="fresko">
<input type="hidden" name="<?php print session_name() ?>"
value="<?php print session_id() ?>">
<br>

<p><b>Simptoma e derguar:</b></p>
<?echo "<p><a>".$simptoma[simptoma]."</a></p>";?>
<br>
<br>
<p>
<b>Sugjerimi i pranuar:</b><br>
<?echo "<p><a>".$sugjerimi[sugjerimi]."</a></p>";?>
<br>
</p>

</form>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">shiko sugjerimet </a> eshte nje aplikacion ku mjeku mund ti shikoje sugjerimet e pranuara dhe po ashtu simptomat te cilat jane derguar nga pacientet ne nje date te caktuar .
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
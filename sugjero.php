<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sugjero</title>
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

<h2><a href="#komenti">Jap sugjerim</a></h2>
<div class="articles">
<?
include("lablib.inc");
include("libfunc.inc");
include("data.inc");

//$rreshti_i_klubit = kontrollojePerdoruesin();
$mesazhi = "";
$data=time();
$text=merrpershksimptom($sesioni[simpid]);
if ( isset( $veprimi ) && $veprimi=="fresko" )
{
	if ( empty( $forma[pershkrimi] ) )
		$mesazhi .="Nuk keni dhen ndonje sugjerim te simptomave<br>\n";
	
	if ( $mesazhi == "" )
	{       $pacient_id=$sesioni[pacid];
		shtosugjerim($pacient_id,$forma[pershkrimi],$sesioni[simpid]);

                  if($spam=="1")

              {
				  header("Location: cakto_termin.php?".SID);
              } 
		
		else
		{ header("Location: pacientet.php?".SID); }
	}

}
else
{
	//$forma = $rreshti_i_klubit;
}



?>
<?php
if ( $mesazhi != "" )
{
	print "<b>$mesazhi</b><p>";
}
?>

<form action="<?php print $PHP_SELF;?>">
<input type="hidden" name="veprimi" value="fresko">
<input type="hidden" name="<?php print session_name() ?>"
value="<?php print session_id() ?>">
<br>
<p>
<b>Simptomat e pacientit:</b><br>
<a><?echo $text[simptoma];?></a>
<br>
<br>

<b>Jepi sugjerimet: </b>
<br>
<textarea name="forma[pershkrimi]" rows=5 cols=30 wrap="virtual">
<?php print stripslashes($forma[pershkrimi]) ?>
</textarea>
</p>
<br><br><p>
A deshironi te caktoni ndonje termin pacinetit:
<input name="spam" type=radio value="1">Po
<input name="spam" type=radio value="0" checked>Jo
<br></p>


<br>
<p><input type=submit value="Dergo"></p>
</form>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="komenti">sugjero</a> eshte nje pjese e aplikacionit ku mjeku i sugjeron pacientet e vet se qfare duhet bere lidhur me simptomen qe ka pranuar mjeku nga pacientet .
</div>
</div>

<div id="left"> 

<h3>Categories :</h3>
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
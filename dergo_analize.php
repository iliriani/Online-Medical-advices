<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dergo Analize</title>
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

<h2><a href="#komenti">Dergo Analize</a></h2><hr>
<div class="articles">
<?
include("lablib.inc");
include("libfunc.inc");

//$rreshti_i_klubit = kontrollojePerdoruesin();
$mesazhi = "";
if ( isset( $veprimi ) && $veprimi=="fresko" )
{        
        
	if ( empty( $forma[emri]) || empty($forma[mbiemri])) 
		$mesazhi .="<p>keni lane te zbrazet emrin apo mbiemrin e pacientit</p><br>\n";

         if ( empty( $forma[pershkrimi] ) )
		$mesazhi .="<p>Nuk keni dheni ndonje analize</p><br>\n";
           $id=kontrollo_pac($forma[emri],$forma[mbiemri]);
                 if($id==0)
              $mesazhi.="<p>Ky pacient nuk ekziston</p>";
	
	if ( $mesazhi == "" )
	{       $pacient_id=$sesioni[id];  
               
		shtoanalize($id[id_pacienti],$forma[pershkrimi]);
		header("Location: hyrja_doc.php?".SID);
		exit;
	}
}
else
{
	$forma = $rreshti_i_klubit;
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
Emri: <br>
<input type="text" name="forma[emri]"
value="<?php print $forma[emri] ?>" maxlength=30>
</p>
<p>
Mbiemri: <br>
<input type="text" name="forma[mbiemri]"
value="<?php print $forma[mbiemri] ?>" maxlength=30>
</p>

<p>
Jepi analizat: <br>
<textarea name="forma[pershkrimi]" rows=5 cols=30 wrap="virtual">
<?php print stripslashes($forma[pershkrimi]) ?>
</textarea>
</p>
<br><br>
<p><input type=submit value="Dergo"></p>
</form>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a komenti>dergo analizen</a> eshte nje pjese e aplikacionit ne te cilen mjekut i mundesohet te dergohen rezultate
te analizave te bera me pare nga pacienti.
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
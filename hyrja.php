<?

   include("lablib.inc");
    include("libfunc.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Hyrja</title>
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

<h2><a href="#hyrja">Miresevini ne Laboratorin Mjeksore</a></h2>
<div class="articles">
<h2>Hyrja</h2>
<br>
<h3>Ju tani jeni te kyqur:</h3><br>
 <p> emri:
<? echo "<b><a>$sesioni[perdoruesi]</a></b>";?>
<br>
  mbiemri:
<? echo "<b><a>$sesioni[mbiemri]</a></b>";?>
<br></p>
	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id="hyrja">Hyrja</a> eshte pjesa e aplikacionit ne te cilen juve ju shfaqen linqet private ne listen e Sherbimeve, ne te cilen ju sipas
accountit tuaj do ti keni te ruajtura edhe pritesin tuaj. 
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
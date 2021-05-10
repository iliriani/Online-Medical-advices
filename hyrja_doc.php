<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Hyrja doc</title>
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

<h2><a href="#komenti">Miresevini ne Laboratorin Mjekesor</a></h2>
<div class="articles">
<h2>Hyrja</h2>
<br>
<h3>Ju tani jeni te kyqur</h3>
<?
//error_reporting(0);
   //session_start();
   include("lablib.inc");
    include("libfunc.inc");
?>
 <p> emri:
<? echo "<b><a>$sesioni[perdoruesi]</a></b>";?>	 
<br /><br />
<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<a id-"komenti">Hyrja Doc</a> eshte pjese e aplikacionit ne te cilen mjeku do te njoftohet se eshte kyqyr me sukses ne llogarin e 
tij nga e cila ai mund ti menaxhoje sugjerimet e pacienteve etj.
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
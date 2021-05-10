<?
//include("lablib.inc");
//include("libfunc.inc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Kyqu</title>
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

<h2><a href="#">Kyqja</a></h2><hr>
<div class="articles">
<?php
include("lablib.inc");
include("libfunc.inc");
$mesazhi = "";
if ( isset( $veprimi ) && $veprimi == "kycu" )
{
	if ( empty( $forma[perdoruesi] ) || empty( $forma[fjalekalimi] ) )
		$mesazhi .= "<p>duhet t'i plotësoni të gjitha fushat</p>\n";
	if ( ! ( $rreshti =
				kontrolloFjalekaliminPac( $forma[perdoruesi], $forma[fjalekalimi] ) ) )
	$mesazhi .= "<p>Fjalëkalim jokorrekt. Provoni përsëri.</p><br>\n";
	if ( $mesazhi == "" ) // nuk kemi gjetë gabime
	{
		pastrojeSesioninEAnetarit( $rreshti[id_pacienti], $rreshti[emri],
			$rreshti[mbiemri],$rreshti[fjalekalimi] );
		header( "Location: hyrja.php?".SID );
	}
}
?>	 
<br /><br />

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
Emri: <br>
<input type="text" name="forma[perdoruesi]"
value="<?php print $forma[perdoruesi] ?>">
</p><p>
Fjalekalimi: <br>
<input type="password" name="forma[fjalekalimi]" value="">
</p><p>
<input type="submit" value="fresko">
</form>
<br><br>
<a href="antaresohu.php">Klikoni ketu per tu antaresuar</a><br />

<img src="images/barnat.jpg" alt="punuar nga Ilirian Ibrahimi" style="border: 3px solid #ccc;" />
<br /><br />
<?
echo "<a id='sem'><h2>Semundjet</h2></a><hr>";
$pershkrimi=addslashes($pershkrimi);
//$id=merridgjymtyra($pershkrimi);
//echo $id[id_gjymtyra];
//echo "<br>";
//$rezultati=merrgjymtyret();
//while($row=mysql_fetch_array($rezultati)){
//	echo $row[gjymtyra]."<br>";
//}


//foreach($r as $vlera){
//echo $vlera."<br>";}
kontrollosimp($pershkrimi);



/*
$gjymtyra="kok";
$sem=merrisemundjet($gjymtyra);
while($s=mysql_fetch_array($sem)){
	echo "semundja eshte ".$s[semundja]."<br>";
}
*/


function shkruajvlerat()
{
	global $rreshti_i_pacienti;
        $semundje = merrevlerensem();
        if ( ! $semundje )
	{
		print "Nuk keni asnjë semundje te derguar<P>";
		return;
	}
           

	print "<table border=1 bordercolor=#6587E0 bgcolor=#D8D8D8>\n";
	print "<td><b><a>Semundja</a></b></td>\n<td><b><a>Klikuar</a></b></td>\n";
	foreach ( $semundje as $rreshti )
	{
		print "<tr>\n";
		print "<td><b>".$rreshti[semundja]."</b></td>\n";
                //print "<td><a href='freskosimp.php'>simptoma $rreshti[id_simp]</a>.</td>\n";
		//print "<td><a href=\"freskongjarjen.php?simp_id=$rreshti[id_simp]&".SID."\">".
		//html($rreshti[id_simp])."</a></td>\n";
		print "<td><b>".$rreshti[vlera]."</b></td>\n";
                
	}
	print "</table>\n";
}
echo "<p>Semundjet me te klikuara:</p>";
shkruajvlerat();



?>
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
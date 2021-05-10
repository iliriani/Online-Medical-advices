<?php

$lidhja;
lidhuMeBSH();
function lidhuMeBSH()
{
	global $lidhja;
	$lidhja = mysql_connect( "localhost", "root", "" );
	if ( ! $lidhja )
		die( "S'munda të lidhem me MySQL" );
	mysql_select_db( "lab_mjeksor", $lidhja )
		or die ( "S'munda ta hap laboratorin mjekesore: ".mysql_error() );
}

function kontrolloFjalekaliminPac( $perdoruesi, $fjalekalimi )
{
	global $lidhja;
	$fjalekalimi_enc=md5($fjalekalimi);
	$rezultati = mysql_query( "SELECT id_pacienti,emri,mbiemri,fjalekalimi FROM pacientet
			WHERE emri = '$perdoruesi' AND fjalekalimi = '$fjalekalimi_enc'",
			$lidhja );
	if ( ! $rezultati )
		die ( "Gabim fatal te kontrolloFjalekalimin: ".mysql_error() );
	if ( mysql_num_rows( $rezultati ) )
		return mysql_fetch_array( $rezultati );
	return false;
}

function kontrolloFjalekalimin( $perdoruesi, $fjalekalimi )
{
	global $lidhja;
	$fjalekalimi_enc=md5($fjalekalimi);
	$rezultati = mysql_query( "SELECT id_doc,emri,fjalekalimi FROM doktorri
			WHERE emri = '$perdoruesi' AND fjalekalimi = '$fjalekalimi_enc'",
			$lidhja );
	if ( ! $rezultati )
		die ( "Gabim fatal te kontrolloFjalekalimin: ".mysql_error() );
	if ( mysql_num_rows( $rezultati ) )
		return mysql_fetch_array( $rezultati );
	return false;
}



function merreRreshtin( $tabela, $emri_i_fushes,$mbiemri_i_fushes, $vlera_e_emrit,$vlera_e_mbiemrit )
{
	global $lidhja;
	$rezultati = mysql_query( "SELECT * FROM $tabela WHERE $emri_i_fushes = '$vlera_e_emrit'
                                    AND $mbiemri_i_fushes='$vlera_e_mbiemrit'", $lidhja );
	if ( ! $rezultati )
		die ( "Gabim fatal te merreRreshtin: ".mysql_error() );
	return mysql_fetch_array( $rezultati );
}


function merreRreshtin1( $tabela, $emri_i_fushes, $vlera_e_fushes )
{
	global $lidhja;
        $rezultati = mysql_query( "SELECT * FROM $tabela WHERE $emri_i_fushes = '$vlera_e_fushes'", $lidhja );
	if ( ! $rezultati )
		die ( "Gabim fatal te merreRreshtin: ".mysql_error() );
       /* echo "Po punon";
        while($record=mysql_fetch_assoc($rezultati)) {
          while($list($fieldname,$fieldvalue)=each($record)) {
               echo $fieldname." ".$fieldvalue."<BR>";}
       echo "<br>";}*/
	return mysql_fetch_array( $rezultati );
}


function perdoruesIRi( $emri,$mbiemri,$fjalekalimi,$emaili,$tel )
{
	global $lidhja;
	$rezultati = mysql_query( "INSERT INTO pacientet (emri,mbiemri,fjalekalimi,e_mail,tel)
		VALUES('$emri', '$mbiemri','$fjalekalimi','$emaili','$tel')", $lidhja);
	return mysql_insert_id( $lidhja );
}


function ndrysho( $emri,$mbiemri,$fjalekalimi,$emaili,$tel,$id )
{
	global $lidhja;
	$rezultati = mysql_query( "update pacientet 
				set emri='$emri',mbiemri='$mbiemri',fjalekalimi='$fjalekalimi',e_mail='$emaili',tel='$tel' 
				where id_pacienti='$id'", $lidhja);

	return mysql_insert_id( $lidhja );
}


function shtosimptom($id_pacienti,$simptoma)
{
        global $lidhja;
        $rezultati=mysql_query("INSERT INTO simptomat(id_pacienti,simptoma)
                               VALUES('$id_pacienti','$simptoma')",$lidhja);
         if(!$rezultati)
            die("Simtomat tuaja nuk kan arritur te dergohen!!!");
}

function merrsimptom($id)
{ global $lidhja;
   $rezultati=mysql_query("SELECT data,id_simp from simptomat WHERE id_pacienti=$id order by data desc",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren te dhenat nga baza e shenimeve!".mysql_error());
   $pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;
}



function merrpershksimptom($id)
{ global $lidhja;
   $rezultati=mysql_query("SELECT * from simptomat WHERE id_simp=$id",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren te dhenat nga baza e shenimeve!".mysql_error());
   
 /**$pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;*/

    $row=mysql_fetch_array($rezultati);
     return $row;
    
}


function merrSimptomat()
{
	global $lidhja;
   $rezultati=mysql_query("select pacientet.emri, pacientet.mbiemri, simptomat.data,
                           simptomat.id_simp from pacientet, simptomat
                           where (pacientet.id_pacienti = simptomat.id_pacienti) 
                           order by simptomat.data desc ",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur simptomat te dhenat nga baza e shenimeve!".mysql_error());
   $pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;
}

function merrpershksimptomes($id)
{ global $lidhja;
   $rezultati=mysql_query("SELECT * from simptomat WHERE id_simp='$id'",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren te dhenat nga baza e shenimeve!".mysql_error());
    /*$pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;*/
    $row=mysql_fetch_array($rezultati);
     return $row;
    
}

function fshijesimp( $id )
{
	global $lidhja;
	$kerkesa = "DELETE FROM simptomat WHERE id_simp='$id'";
	$rezultati = mysql_query( $kerkesa, $lidhja );
	if ( ! $rezultati )
		die ( "Gabim fatal te fshijesimp: ".mysql_error() );
	return ( mysql_affected_rows($lidhja) );

}

function shtosugjerim($id_pac,$text,$id_simp)
{ 
        global $lidhja;
        $rezultati=mysql_query("INSERT INTO sugjerimet(id_pacienti,sugjerimi,id_simp)
                               VALUES($id_pac,'$text',$id_simp)",$lidhja);
         if(!$rezultati)
            die("Simtomat tuaja nuk kan arritur te dergohen!!!");

}


function getpac_id($id)
{  global $lidhja;
   $rezultati=mysql_query("SELECT id_pacienti from simptomat WHERE id_simp=$id",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merret id e pacientit nga baza e shenimeve!".mysql_error());
    $row=mysql_fetch_array($rezultati);
     return $row;
}


function caktotermin($id_pac,$data)
{ 
        global $lidhja;
        $rezultati=mysql_query("INSERT INTO terminet(id_pacienti,data)
                               VALUES($id_pac,$data)",$lidhja);
         if(!$rezultati)
            die("Termini juaj nuk eshte arrite te hyje ne bazen e shenimeve!!!");

}

function merrtermin($tabela)
{
	global $lidhja;
   $rezultati=mysql_query("SELECT id_termini,data from terminet order by data desc ",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren terminet nga baza e shenimeve!".mysql_error());
   $pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;
}

function merrtermin_pac($id)
{
	global $lidhja;
   $rezultati=mysql_query("SELECT data from terminet where id_pacienti='$id'",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merret termini nga baza e shenimeve!".mysql_error());
        $record=mysql_fetch_array($rezultati);
	return $record;
}

function fshijeTerminin( $id )
{
	global $lidhja;
	$kerkesa = "DELETE FROM terminet WHERE id_termini='$id'";
	$rezultati = mysql_query( $kerkesa, $lidhja );
	if ( ! $rezultati )
		die ( "Gabim fatal te fshijeterminin: ".mysql_error() );
	return ( mysql_affected_rows($lidhja) );

}

function kontrollo_pac($emri,$mbiemri)
{ 
     global $lidhja;
   $rezultati=mysql_query("SELECT id_pacienti from pacientet 
                           WHERE emri='$emri' AND mbiemri='$mbiemri'",$lidhja);
   if(!$rezultati)
       die("pacienti i dhene me keta emri nuk ekziston!".mysql_error());
   /*$pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );*/
    $a=mysql_fetch_array( $rezultati ); 
	return $a;
}

function shtoanalize($id,$text)
{ 
        global $lidhja;
        $rezultati=mysql_query("INSERT INTO analizat(id_pacienti,pershkrimi)
                               VALUES('$id','$text')",$lidhja);
         if(!$rezultati)
            die("Analizat tuaja nuk kan arritur te dergohen!!!");

}

function merrsugjerim($id)
{ global $lidhja;
   $rezultati=mysql_query("SELECT data,id_sugjerimi,sugjerimi,id_simp from sugjerimet WHERE id_pacienti='$id'
                           order by data desc",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren te dhenat nga baza e shenimeve!".mysql_error());
   $pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;
}




function merrevleren($text)
{ 	global $lidhja;
	$query=mysql_query("select * from pacientet");
	$row=mysql_fetch_array($query);
	return $row[$text];
}



function fshijesugj( $id )
{
      global $lidhja;
	$kerkesa = "DELETE FROM sugjerimet WHERE id_sugjerimi='$id'";
	$rezultati = mysql_query( $kerkesa, $lidhja );
	if ( ! $rezultati )
		die ( "Gabim fatal te fshijesugj: ".mysql_error() );
	return ( mysql_affected_rows($lidhja) );

}

function merrpershksugjerimi($id)
{ global $lidhja;
   $rezultati=mysql_query("SELECT * from sugjerimet WHERE id_sugjerimi=$id",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren te dhenat nga baza e shenimeve!".mysql_error());
    /*$pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;*/
    $row=mysql_fetch_array($rezultati);
     return $row;
    
}

function merranalize_pac($id)
{global $lidhja;
   $rezultati=mysql_query("SELECT data,pershkrimi,id_analiza from analizat WHERE id_pacienti='$id'
                           order by data desc",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren analizat nga baza e shenimeve!".mysql_error());
   $pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;
}


function merrpershkanalize($id)
{ global $lidhja;
   $rezultati=mysql_query("SELECT pershkrimi from analizat WHERE id_analiza='$id'",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren te dhenat nga baza e shenimeve!".mysql_error());
    /*$pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;*/
    $row=mysql_fetch_array($rezultati);
     return $row;
    
}




function fshijeanalize( $id )
{  global $lidhja;
	$kerkesa = "DELETE FROM analizat WHERE id_analiza='$id'";
	$rezultati = mysql_query( $kerkesa, $lidhja );
	if ( ! $rezultati )
		die ( "Gabim fatal te fshije reshtin te analizat: ".mysql_error() );
	return ( mysql_affected_rows($lidhja) );
}


function merridgjymtyra($text){

	global $lidhja;
	$kerkesa="SELECT id_gjymtyra FROM gjymtyret WHERE gjymtyra like '%".$text."%'";
	if(!$kerkesa || $kerkesa =="") die("gabim ne query,merridgjymtyra");
	$rezultati=mysql_query($kerkesa,$lidhja);
	if(!$rezultati) die("gabim ne merridgjymtyra!");
	
	while($record=mysql_fetch_assoc($rezultati)) {
	          while(list($fusha,$vlera)=each($record)) {
	               echo $fusha.": ".$vlera."<BR>";}
	            echo "<br>";}
	
	//$row=mysql_fetch_array($rezultati);
	return $row;

}


function merrgjymtyret(){

	global $lidhja;
	$kerkesa="SELECT gjymtyra FROM gjymtyret";
	if(!$kerkesa || $kerkesa=="") die("gabim ne query,merridgjymtyra");
	$rezultati=mysql_query($kerkesa,$lidhja);
	if(!$rezultati) die("gabim ne merridgjymtyra!");
	

	//while($row=mysql_fetch_array($rezultati)){
		//while(list(,$vlera)=each($row)){
			//echo "".$row[gjymtyra]."<br>";
		//}
	//}
		return $rezultati;
	}




function merrisemundjet($gjymtyra){
	
	global $lidhja;
	//$semundja="select semundja from semundjet where id_gjymtyra=(select id_gjymtyra from gjymtyret where gjymtyra='.$gjymtyra.')";
	$semundja="select semundja from semundjet where id_gjymtyra=(select id_gjymtyra from gjymtyret where gjymtyra like '%".$gjymtyra."%')";
	$query=mysql_query($semundja);
	if(!$query) die("gabim te merrisemundjet");
	/*
	while($sem=mysql_fetch_assoc($query)){
		while(list(,$vlera)=each($sem)){
		echo "semundjet jane ".$vlera."<br>";}}
	*/

	/*
	while($sem=mysql_fetch_array($query)){
		echo $sem[semundja]."<br>";
	}
	*/
		
	return $query;


}




function merrisemundjetSipasSem($semundja){
	
	global $lidhja;
	//$semundja="select semundja from semundjet where id_gjymtyra=(select id_gjymtyra from gjymtyret where gjymtyra='.$gjymtyra.')";
	$semundja="select semundja from semundjet where id_gjymtyra=(select id_gjymtyra from semundjet where semundja='".$semundja."')";
	$query=mysql_query($semundja);
	if(!$query) die("gabim te merrisemundjetSipasSem");
	/*
	while($sem=mysql_fetch_assoc($query)){
		while(list(,$vlera)=each($sem)){
		echo "semundjet jane ".$vlera."<br>";}}
	*/

	/*
	while($sem=mysql_fetch_array($query)){
		echo $sem[semundja]."<br>";
	}
	*/
		
	return $query;


}



function merrisemundjetEPac(){
	
	global $lidhja;
	//$semundja="select semundja from semundjet where id_gjymtyra=(select id_gjymtyra from gjymtyret where gjymtyra='.$gjymtyra.')";
	$semundja="select * from semundjet";
	$query=mysql_query($semundja);
	if(!$query) die("gabim te merrisemundjet");
	/*
	while($sem=mysql_fetch_assoc($query)){
		while(list(,$vlera)=each($sem)){
		echo "semundjet jane ".$vlera."<br>";}}
	*/

	/*
	while($sem=mysql_fetch_array($query)){
		echo $sem[semundja]."<br>";
	}
	*/
		
	return $query;


}

	

function kontrollosimp($text){

	global $lidhja;	

	$text=trim($text); 
	//$kerkesa="select \"$text\" like \"%kok%\"";
	
	$gjym=merrgjymtyret();
	while($row=mysql_fetch_array($gjym)){
		//echo $row[gjymtyra]."<br>";//merrisemundjet($row[gjymtyra]);
		$kerkesa="select '$text' like '%".$row[gjymtyra]."%'";
		$rezultati=mysql_query($kerkesa,$lidhja);
		while($record=mysql_fetch_assoc($rezultati)) {
	          while(list(,$vlera)=each($record)) {
	               //echo "Vlera eshte: ".$vlera."<br>";	
				if($vlera == 1){
					//merrisemundjet($row[gjymtyra]);
					//echo "ketu duhet te dal semundja "."<br>;
					$sem=merrisemundjet($row[gjymtyra]);
					while($s=mysql_fetch_array($sem)){
						//echo "".$s[semundja]."<br>";
					
					//$pathi="<form action='pershkrimi_semundjes.php' method='post' target='_self'>"
					//	."<a href='pershkrimi_semundjes.php' name='".$s[semundja]."' >".$s[semundja]."</a>"."<br>"
					//	."</form>";
					//echo $pathi;
					//if(isset($s[semundja])){ruajsemundjen($s[semundja]);}
					//echo "<form action='pershkrimi_semundjes.php' method='post' target='_self'>"
					echo "<a href='pershkrimi_semundjes.php?sem=$s[semundja]#pershk' >".$s[semundja]."</a>".", ";
					//$sesioni[semundja]=$s[semundja];
					//echo $sesioni[semundja]."<br>";
					//ruajsemundjen($s[semundja]);	
						}
				}			
				
				//else{echo "Nuk ka ndonje sugjerim akoma per simptoman tuaj!;}

				
			}
	                       
	        }
	}




//ketu behet krahisimi sipas semundjeve


	$semundjet=merrisemundjetEPac();
	while($row1=mysql_fetch_array($semundjet)){
		//echo $row1[semundja]."<br>";//merrisemundjet($row[gjymtyra]);
		$kerkesa1="select '$text' like '%".$row1[semundja]."%'";
		$rezultati1=mysql_query($kerkesa1,$lidhja);
		while($record1=mysql_fetch_assoc($rezultati1)) {
	          while(list(,$vlera1)=each($record1)) {
	               //echo "Vlera eshte: ".$vlera."<br>";	
				if($vlera1 == 1){
					//merrisemundjet($row[gjymtyra]);
					//echo "ketu duhet te dal semundja "."<br>;
					//$gjithasem="select semundja from semundjet where id_gjymtyra=(select id_gjymtyra from semundjet where semundja=".$row1[semundja];
					$sem1=merrisemundjetSipasSem($row1[semundja]);
					while($s1=mysql_fetch_array($sem1)){
						//echo "".$s[semundja]."<br>";
					
					//$pathi="<form action='pershkrimi_semundjes.php' method='post' target='_self'>"
					//	."<a href='pershkrimi_semundjes.php' name='".$s[semundja]."' >".$s[semundja]."</a>"."<br>"
					//	."</form>";
					//echo $pathi;
					//if(isset($s[semundja])){ruajsemundjen($s[semundja]);}
					//echo "<form action='pershkrimi_semundjes.php' method='post' target='_self'>"
					echo "<a href='pershkrimi_semundjes.php?sem=$s1[semundja]#pershk' >".$s1[semundja]."</a>".", ";
					//$sesioni[semundja]=$s[semundja];
					//echo $sesioni[semundja]."<br>";
					//ruajsemundjen($s[semundja]);	
					}	
				}			
				

				
			}
	                       
	        }
	}


	
}



function pershkruajsemundjen($text){

global $lidhja;

$semundja="select pershkrimi from semundja where id_semundjet=(select id_semundja from semundjet where semundja='$text')";
//echo $semundja."<br>";
$query=mysql_query($semundja,$lidhja);
if(!$query || $query=="") die("kemi gabim te pershkruajsemundjen!");
while($sem=mysql_fetch_array($query)){
echo $sem[pershkrimi];
	}
}


function rritevleren($text){

global $lidhja;
$indeksi=0;
$semundja="select vlera from semundjet where semundja='$text'";
$query=mysql_query($semundja,$lidhja);
while($v=mysql_fetch_array($query)){
$indeksi=$v[vlera]+1;	
}
$id=ndryshovleren($text,$indeksi);
//echo $indeksi;
}

function ndryshovleren($text,$nr){
global $lidhja;
$semundja=mysql_query("update semundjet set vlera='$nr' where semundja='$text'",$lidhja);
//$rezultati=mysql_query($semundja,$lidhja);
return mysql_insert_id( $lidhja );

}

function merrevlerensem()
{ global $lidhja;
   $rezultati=mysql_query("select semundja,vlera from semundjet order by vlera desc limit 5",$lidhja);
   if(!$rezultati)
       die("nuk eshte arritur te merren te dhenat nga baza e shenimeve!".mysql_error());
   $pergjigjja = array();
	while ( $rreshti = mysql_fetch_array( $rezultati ) )
		array_push( $pergjigjja, $rreshti );
	return $pergjigjja;
}



?>

<?php
//error_reporting(0);
session_start();
session_register( "sesioni" );

function pastrojeSesioninEAnetarit( $id, $perdoruesi,$mbiemri, $fjalekalimi )
{
	global $sesioni;
	$sesioni[id] = $id;
	$sesioni[perdoruesi] = $perdoruesi;
	$sesioni[fjalekalimi] = $fjalekalimi;
        $sesioni[mbiemri]=$mbiemri;
	$sesioni[i_kycur] = true;
        $sesioni[simpid]="";
        $sesioni[pacid]="";
        $sesioni[sugjid]="";
        $sesioni[analid]="";
	//$sesioni[semundja]="";
}

function pastrojeSesioninEDoc( $id, $perdoruesi, $fjalekalimi )
{
	global $sesioni;
	$sesioni[id] = $id;
	$sesioni[perdoruesi] = $perdoruesi;
	$sesioni[fjalekalimi] = $fjalekalimi;
        //$sesioni[mbiemri]="";
	$sesioni[i_kycur] = true;
        $sesioni[simpid]="";
        $sesioni[sugjid]="";
        $sesioni[analid]="";
}

function kontrollojePerdoruesin()
{
	global $sesioni, $i_kycur;
	$sesioni[i_kycur] = false;
	$rreshti_i_pacientit = merreRreshtin( "pacientet", "emri","mbiemri",$sesioni[perdoruesi],$sesioni[mbiemri]);
	if ( ! $rreshti_i_pacientit ||
			$rreshti_i_pacientit[emri] != $sesioni[perdoruesi] ||
			$rreshti_i_pacientit[fjalekalimi] != $sesioni[fjalekalimi] )
	{
		header( "Location: kyqu.php" );
		exit;
	}
	$sesioni[i_kycur] = true;
	return $rreshti_i_pacientit;
}

function kontrollojePerdoruesin1()
{
	global $sesioni, $i_kycur;
	$sesioni[i_kycur] = false;
	$rreshti_i_pacienti = merreRreshtin1( "pacientet", "id_pacienti", $sesioni[id] );
	if ( ! $rreshti_i_pacienti ||
			$rreshti_i_pacienti[emri] != $sesioni[perdoruesi] ||
			$rreshti_i_pacienti[fjalekalimi] != $sesioni[fjalekalimi] )
	{
		header( "Location: kyqu.php" );
		exit;
	}
	$sesioni[i_kycur] = true;
	return $rreshti_i_pacienti;
}

function kontrolloShenimetEPacientit( $vargu_i_pacientit )
{
	if ( ! isset( $vargu_i_pacientit[id_pacienti] ) )
	{
		header( "Location: hyrja.php?".SID );
		exit;
	}
}

function regsimpid($simid)
{ global $sesioni;
  $sesioni[simpid]= $simid;
}

function regpacid($pacid)
{ global $sesioni;
  $sesioni[pacid]= $pacid;
}

function regsugjid($sugjid)
{ global $sesioni;
  $sesioni[sugjid]= $sugjid;
}

function reganalizeid($analid)
{ global $sesioni;
 $sesioni[analid]= $analid;
}

function ruajsemundjen($sem)
{
global $sesioni;
$sesioni[semundja]=$sem;
}

function merrsemundjen()
{
global $sesioni;
return $sesioni[semundja];
}

?>
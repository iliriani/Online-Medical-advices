<?php
function shkruajOpcionetEMuajve( $d )
{
	$vargu_d = getDate( $d );
	$muajt = array( "Jan","Shku","Mar","Pri","Maj","Qer",
	"Korr","Gush","Shta","Tet","Nën","Dhje" );
	foreach ( $muajt as $key=>$value )	// ??? a bon $celesi=>$vlera ?
	{
		print "<OPTION VALUE=\"".($key+1)."\"";
		print ( ( $vargu_d[mon] == ($key+1) )?"SELECTED":"" );
		print ">$value\n";
	}
}

function shkruajOpcionetEDiteve( $d )
{
	$vargu_d = getDate( $d );
	for ( $x = 1; $x<=31; $x++ )
	{
		print "<OPTION VALUE=\"$x\"";
		print ( ( $vargu_d[mday] == $x )?"SELECTED":"" );
		print ">$x\n";
	}
}

function shkruajOpcionetEViteve( $d )
{
	$vargu_d = getDate( $d );
	$vargu_tash = getDate(time());
	for ( $x = $vargu_tash[year]; $x <= ($vargu_tash[year]+5); $x++ )
	{
		print "<OPTION VALUE=\"$x\"";
		print ( ( $vargu_d[year] == $x )?"SELECTED":"" );
		print ">$x\n";
	}
}

function shkruajOpcionetEOreve( $d )
{
	$vargu_d = getDate( $d );
	for ( $x = 0; $x< 24; $x++ )
	{
	print "<OPTION VALUE=\"$x\"";
	print ( ( $vargu_d[hours] == $x )?"SELECTED":"" );
	print ">".sprintf("%'02d",$x)."\n";	// ??? sprintf ?
	}
}

function shkruajOpcionetEMinutave( $d )
{
	$vargu_d = getDate( $d );

	for ( $x = 0; $x<= 59; $x++ )
	{
	print "<OPTION VALUE=\"$x\"";
	print ( ( $vargu_d[minutes] == $x )?"SELECTED":"" );
	print ">".sprintf("%'02d",$x)."\n";
	}
}


function merreRangunEDatave( $muaji, $viti )
{
	$fillimi = mktime( 0, 0, 0, $muaji, 1, $viti );
	$fundi = mktime( 0, 0, 0, $muaji+1, 1, $viti );
	$fundi--;
	return array( $fillimi, $fundi );
}

?>
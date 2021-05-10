<?
include("lablib.inc");
if($sesioni)
session_unregister("sesioni");

header("Location: kyqu.php?".SID);
?>
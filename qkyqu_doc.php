<?
include("lablib.inc");
if($sesioni)
session_unregister("sesioni");

 header("Location: kycu_doc.php?".SID);
?>
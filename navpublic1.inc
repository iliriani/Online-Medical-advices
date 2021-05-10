
<ul>
<li><a href="llojet_analizave.php?<?php print SID ?>">Llojet e analizave</a></li>
<li><a href="semundjet.php?<?php print SID ?>">semundjet</a></li>
<li><a href="kategoria.php?<?php print SID ?>">Kategoria</a></li> 
<!--<li><a href="kategoria.php?<?php print SID ?>">Kategoria</a></li>--> 

</ul>
<?php
if ( $sesioni[i_kycur] )
{
?>
<ul>
<li><a href="pacientet.php?<?php print SID ?>">Pacientet</a></li>
<li><a href="dergo_analize.php?<?php print SID ?>">Analizat</a></li>
<li><a href="lista_termineve.php?<?php print SID ?>">Terminet</a></li>
<li><a href="qkyqu_doc.php?php print SID ?>">Q'kyqu</a></li>
</ul>
<?
}
?>
<hr>
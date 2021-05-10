<ul>
<li><a href="llojet_analizave.php?<?php print SID ?>">Llojet e analizave</a></li>
<li><a href="semundjet.php?<?php print SID ?>">semundjet</a></li>
<li><a href="kategoria.php?<?php print SID ?>">Kategoria</a></li> 
<!--<a href="kategoria.php?<?php print SID ?>">Kategoria</a>--> 

</ul>
<?php
if ( $sesioni[i_kycur] )
{
?>
<ul>
<li><A HREF="simptomat.php?<?php print SID ?>">Simptomat</A></li>
<li><A HREF="sugjerimet.php?<?php print SID ?>">Sugjerimet</A></li>
<li><A HREF="prano_termin.php?<?php print SID ?>">Terminet</A></li>
<li><A HREF="lista_analizave.php?<?php print SID ?>">Analizat</A></li>
<li><A HREF="ndrysho.php?<?php print SID ?>">Ndrysho</A></li>
<li><a href="qkyqu.php?php print SID ?>">Q'kyqu</a></li>
</ul>
<?
}
?>
<hr>
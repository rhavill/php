<?php

require_once('ganon.php');
$html = <<<END
<table>
<tr>
    <td>one</td>
    <td>two</td>
</tr>
<tr>
    <td>three</td>
    <td>
        <table><tr><td>four</td><td>five</td></tr></table>
    </td>
</tr>
</table>
END;
//print $html; exit;
$dom = str_get_dom($html);
foreach($dom('table > tr') as $row) {
   for ($i = 1; $i < $row->childCount(); $i++) {
        if ($row->getChild($i)->tag == 'td') {
            print $row->getChild($i)->html() . "\n";
        }
   }
   print "\n";
}

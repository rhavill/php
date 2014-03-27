<?php


require_once('ganon.php');
$html = file_get_contents('../One question group.html');
$dom = str_get_dom($html);
//$dom = file_get_dom('../temp.html');
// Iterate over childnodes
for ($i = 0; $i < $dom->childCount(); $i++) {
  $child =  $dom->getChild($i);
  //echo "full tag: " . $child->tag . " tag: " . $child->getTag() . "\n";
  echo "full tag: " . $child->tag . "\n";
}


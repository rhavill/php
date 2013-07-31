<?php
//$str = 'What does the word <em>thrashing</em> mean?';
//$str = '<div style="MARGIN-LEFT: 0px"><div align="left">What does the word <em>thrashing</em> mean?</div></div>';

//$str = '<div align="left"><b>“I volunteer!” I gasp. “I volunteer as tribute!”</b></div>';
$str = "soundlessly: �There's a white man at the door!� They ";
print "$str\n";
// “ - 8220,    ” - 8221,   - 160
$results = array();
preg_match_all('/./u', $str, $results);
foreach ($results[0] as $char) {
  print "$char - " . uniord($char) . "\n";
}

function uniord($u) { 
    $k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8'); 
    $k1 = ord(substr($k, 0, 1)); 
    $k2 = ord(substr($k, 1, 1)); 
    return $k2 * 256 + $k1; 
} 

<?php
//$str = 'What does the word <em>thrashing</em> mean?';
//$str = '<div style="MARGIN-LEFT: 0px"><div align="left">What does the word <em>thrashing</em> mean?</div></div>';

//$str = '<div align="left"><b>“I volunteer!” I gasp. “I volunteer as tribute!”</b></div>';
$str = "soundlessly: �There's a white man at the door!� They ";
$str = 'TEXT   ';
$str = '16x – 12sp ace';
print "$str\n";

// “ - 8220,    ” - 8221,   - 160
$results = array();
preg_match_all('/./u', $str, $results);
foreach ($results[0] as $char) {
  print "$char - " . uniord($char) . "\n";
}
print_r($results);
$offset = 0;
print ordutf8($str, $offset);
function uniord($u) { 
    $k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8'); 
    $k1 = ord(substr($k, 0, 1)); 
    $k2 = ord(substr($k, 1, 1)); 
    return $k2 * 256 + $k1; 
} 

/*
 Copied from http://us3.php.net/ord
 */
function ordutf8($string, &$offset) {
    $code = ord(substr($string, $offset,1));
    if ($code >= 128) {        //otherwise 0xxxxxxx
        if ($code < 224) $bytesnumber = 2;                //110xxxxx
        else if ($code < 240) $bytesnumber = 3;        //1110xxxx
        else if ($code < 248) $bytesnumber = 4;    //11110xxx
        $codetemp = $code - 192 - ($bytesnumber > 2 ? 32 : 0) - ($bytesnumber > 3 ? 16 : 0);
        for ($i = 2; $i <= $bytesnumber; $i++) {
            $offset ++;
            $code2 = ord(substr($string, $offset, 1)) - 128;        //10xxxxxx
            $codetemp = $codetemp*64 + $code2;
        }
        $code = $codetemp;
    }
    $offset += 1;
    if ($offset >= strlen($string)) $offset = -1;
    return $code;
}
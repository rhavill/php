<?php

/*if (!isset($argv[1])) die ("please specify a file.\n");
$file = $argv[1];
if (!$file || !file_exists($file))
  die("file $file does not exist.\n");
$string = file_get_contents($file);
*/
$string = 'Hello there! These are �dumb� quotes.';
$string = "soundlessly: �There's a white man at the door!� They ";
if (mb_check_encoding($string,'UTF-8')) 
  print "file is valid utf8\n";
else print "file is NOT valid utf8\n";

//var_dump(check_utf8($str));
function check_utf8($string) {
    $len = strlen($str);
    for($i = 0; $i < $len; $i++){
        $c = ord($str[$i]);
        if ($c > 128) {
            if (($c > 247)) return false;
            elseif ($c > 239) $bytes = 4;
            elseif ($c > 223) $bytes = 3;
            elseif ($c > 191) $bytes = 2;
            else return false;
            if (($i + $bytes) > $len) return false;
            while ($bytes > 1) {
                $i++;
                $b = ord($str[$i]);
                if ($b < 128 || $b > 191) return false;
                $bytes--;
            }
        }
    }
    return true;
} // end of check_utf8 

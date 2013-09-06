<?php

/*if (!isset($argv[1])) die ("please specify a file.\n");
$file = $argv[1];
if (!$file || !file_exists($file))
  die("file $file does not exist.\n");
*/
$invalidFile = 'non-utf8.txt';
$validFile = 'utf8.txt';
$invalidFile = '/tmp/july-1-batch-2013-09-06.xml';
$invalidString = file_get_contents($invalidFile);
$validString = file_get_contents($validFile);

if (mb_check_encoding($invalidString,'UTF-8')) 
  print "mb_check_encoding: $invalidFile is valid utf8\n";
else print "mb_check_encoding: $invalidFile is NOT valid utf8\n";
if (mb_check_encoding($validString,'UTF-8')) 
  print "mb_check_encoding: $validFile is valid utf8\n";
else print "mb_check_encoding: $validFile is NOT valid utf8\n";

if (check_utf8($invalidString,'UTF-8')) 
  print "check_utf8: $invalidFile is valid utf8\n";
else print "check_utf8: $invalidFile is NOT valid utf8\n";
if (check_utf8($validString,'UTF-8')) 
  print "check_utf8: $validFile is valid utf8\n";
else print "check_utf8: $validFile is NOT valid utf8\n";

// This function was copied from http://us2.php.net/mb_check_encoding#95289
function check_utf8($str) {
    $len = strlen($str);
    for($i = 0; $i < $len; $i++){
        $c = ord($str[$i]);
        if ($c > 128) {
            if (($c > 247)) {
              for ($j = 200; $j > 0; $j--)
                  print $str[$i - $j];
              return false;
            }
            elseif ($c > 239) $bytes = 4;
            elseif ($c > 223) $bytes = 3;
            elseif ($c > 191) $bytes = 2;
            else {
              for ($j = 200; $j > 0; $j--)
                  print $str[$i - $j];
              return false;
            }
            if (($i + $bytes) > $len) {
              for ($j = 200; $j > 0; $j--)
                  print $str[$i - $j];
              return false;
            }
            while ($bytes > 1) {
                $i++;
                $b = ord($str[$i]);
                if ($b < 128 || $b > 191) {
              for ($j = 200; $j > 0; $j--)
                  print $str[$i - $j];
                  return false;
                }
                $bytes--;
            }
        }
    }
    return true;
} // end of check_utf8 

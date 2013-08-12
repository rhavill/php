<?php 
require_once('Encoding.php');

$some_string = "FÃÂ©dÃÂ©ration Camerounaise de Football";
$some_string = 'FÃÂÃÂ©dÃÂÃÂ©ration Camerounaise de Football';
//$some_string = "Non-ascii characters: äó";
$some_string = file_get_contents('non-utf8.txt');

print "Original: $some_string\n";


// From http://magp.ie/2011/01/06/remove-non-utf8-characters-from-string-with-php/
//reject overly long 2 byte sequences, as well as characters above U+10000 and replace with ?
$regex_string = $some_string;
$regex_string = preg_replace('/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]'.
 '|[\x00-\x7F][\x80-\xBF]+'.
 '|([\xC0\xC1]|[\xF0-\xFF])[\x80-\xBF]*'.
 '|[\xC2-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})'.
 '|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})/S',
 '?', $regex_string );
//reject overly long 3 byte sequences and UTF-16 surrogates and replace with ?
$regex_string = preg_replace('/\xE0[\x80-\x9F][\x80-\xBF]'.
 '|\xED[\xA0-\xBF][\x80-\xBF]/S','?', $regex_string );
print "regex:    $regex_string\n";


// From http://stackoverflow.com/questions/1401317/remove-non-utf8-characters-from-string/8215387#answer-4266468
$ascii_string = $some_string;
//$ascii_string = preg_replace('/[^(\x20-\x7F)]*/','?', $ascii_string);
$ascii_string = preg_replace('/[^(\x20-\x7F)]+/','?', $ascii_string);
print "ascii:    $ascii_string\n\n";


// From https://github.com/neitanod/forceutf8
$fix_utf8_string = \ForceUTF8\Encoding::fixUTF8($some_string);
print "fixutf:   $fix_utf8_string\n";

$to_utf8_string = \ForceUTF8\Encoding::toUTF8($some_string);
print "toutf:    $to_utf8_string\n";

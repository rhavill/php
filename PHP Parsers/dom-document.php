<?php
//require_once('/var/www/html5lib-php/library/HTML5/Parser.php');
//$doc = new DOMDocument('1.0','utf-8');

$doc = new DOMDocument();
//$doc->resolveExternals = false;
//$doc->substituteEntities = false;
//$doc = HTML5_Parser::parse(file_get_contents('/var/www/php/html5.html'));
$doc->loadHtml(file_get_contents('/home/rhavill/Desktop/52047.htm'));
//$text = $doc->saveHTMLFile('/tmp/out.html');
$text = $doc->saveHTML($doc);
//print $text;
$p = $doc->getElementsByTagName('table')->item(0);
print $p->nodeValue;
//print htmlentities(iconv('UTF-8', 'ISO-8859-1', $p->nodeValue));

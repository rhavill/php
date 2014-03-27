<?php

function getHtml($xml, $depth = 0) {
	$text = '';
	$text .= str_repeat('-', $depth*2). $xml->getName();
	$text .= "\n";
	if ($xml->count()) {
		foreach ($xml->children() as $child) {
			$text .= getHtml($child, $depth+1);
		}
	}
	return $text;
}
$text = file_get_contents('html5.html');
$text = file_get_contents('item-banks-2013-07-16/Algebra Formative C DMP 6-5-13/Import Final.html');
$xml = new SimpleXMLElement($text);

print getHtml($xml);
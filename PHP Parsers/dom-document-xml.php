<?php
$doc = new DOMDocument('1.0','utf-8');
$doc->load('sample.xml');
$tag = $doc->getElementsByTagName('person')->item(0);
//print $tag->nodeValue."\n";

if ($tag->hasAttribute('gender')) {
	$value = $tag->getAttribute('gender');
	print "value $value\n";
	$tag->removeAttribute('gender');
	$tag->setAttribute('sex', $value);
}
$length = $tag->attributes->length;
for ($i = 0; $i < $length; $i++) {
	if ($tag->attributes->item($i)->name == 'gender') {

	}
	print $tag->attributes->item($i)->name . " = " .
		$tag->attributes->item($i)->value . "\n";
}
print $doc->saveXML();

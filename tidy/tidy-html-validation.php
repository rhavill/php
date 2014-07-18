<?php
$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">'.
	'<html><head><title>Title</title><meta http-equiv="Content-type" content="text/html;charset=UTF-8"></head><body>';
$html .= '<b><p>simple paragraph.';
$html .= '</body></html>';

$html = '<phony-tag><p>simple paragraph.';
// Specify configuration
$config = array(
	'char-encoding' => 'utf8',
	'input-encoding' => 'utf8',
);

// Tidy
$tidy = new tidy;
$tidy->parseString($html, $config, 'utf8');
print "Status: " . $tidy->getStatus() . "\n";
print $tidy->errorBuffer ."\n";
exit;
$tidy = tidy_parse_string($html);
print $html."\n";
echo tidy_error_count($tidy) . "\n"; //1

echo $tidy->errorBuffer;
?>

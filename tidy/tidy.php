<?php

$html = '<table class="content"><tr valign="top"><td>7</td><td>Which of the following bibliographic citations is properly formatted?</td></tr><tr valign="top"><td class="distractor">A</td><td>April 22. "Inca Empire." Microsoft Encarta Online Encyclopedia 2005.</td></tr><tr valign="top"><td class="distractor">B</td><td>"Inca Empire." Microsoft Encarta Online Encyclopedia 2005. April 22.</td></tr><tr valign="top"><td class="distractor">C</td><td><em>Microsoft Encarta Online Encyclopedia 2005.</em> "Inca Empire." http://encarta.msn.com/encyclopedia_761560004/Inca_Empire.html>.</td></tr><tr valign="top"><td class="correct">D</td><td>"Inca Empire." <em>Microsoft Encarta Online Encyclopedia 2005.</em> 22 April 2005. &lt;http://encarta.msn.com/encyclopedia _761560004/Inca_Empire.html&gt;</td></tr></table>';

print "$html\n";

$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">'.
                '<html><head><title>Title</title><meta http-equiv="Content-type" content="text/html;charset=UTF-8"></head><body>' . 
$html . '</body></html>';
$html = file_get_contents('/home/wec/Desktop/test.html');
$config = array(
  'char-encoding' => 'utf8',
  'input-encoding' => 'utf8',
  'output-xhtml' => true,
);
$tidy = new \tidy;
$clean = $tidy->repairString($html, $config, 'UTF8');
print $clean;
exit;
$tidy->parseString($html, $config, 'utf8');
$status = $tidy->getStatus();
print "Status: $status\n";
if ($tidy->errorBuffer) {
  print "Error: {$tidy->errorBuffer}\n";
}

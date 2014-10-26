<?php

require_once 'htmlpurifier-4.6.0/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$dirty_html = file_get_contents('html5.html');
$clean_html = $purifier->purify($dirty_html);
print $clean_html;

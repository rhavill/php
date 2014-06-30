 <?php

$xmlFile="/tmp/test.xml";

$doc = new DOMDocument(); 
$doc->preserveWhiteSpace=false; 
$doc->formatOutput = true; 
$doc->load($xmlFile); 


$Valid=$doc->schemaValidate("/tmp/test.xsd");  // $doc is your xml loaded file,  and  "client_test.xsd" your xml schema definition file

echo $Valid;   // Returns  1 (if valid)

?> 

<?php


function xml2assoc($xml) {
      $assoc = null;
      while($xml->read()){
        switch ($xml->nodeType) {
          case XMLReader::END_ELEMENT: return $assoc;
          case XMLReader::ELEMENT:
            $assoc[$xml->name][] = array('value' => $xml->isEmptyElement ? '' : xml2assoc($xml));
            if($xml->hasAttributes){
              $el =& $assoc[$xml->name][count($assoc[$xml->name]) - 1];
              while($xml->moveToNextAttribute()) $el['attributes'][$xml->name] = $xml->value;
            }
            break;
          case XMLReader::TEXT:
          case XMLReader::CDATA: $assoc .= $xml->value;
        }
      }
      return $assoc;
    }

function getHtml($xml, $depth = 0) {
$nodeTypes = array(
  'NONE',
  'ELEMENT',
  'ATTRIBUTE',
  'TEXT',
  'CDATA',
  'ENTITY_REF',
  'ENTITY',
  'PI',
  'COMMENT',
  'DOC',
  'DOC_TYPE ',
  'DOC_FRAGMENT ',
  'NOTATION ',
  'WHITESPACE ',
  'SIGNIFICANT_WHITESPACE ',
  'END_ELEMENT ',
  'END_ENTITY ',
  'XML_DECLARATION ',
);
  $html = '';
  while($xml->read()){
    $html .= str_repeat('-', 4*$depth) . $nodeTypes[$xml->nodeType] . ':' . $xml->name . ':' 
      . str_replace(" ",'\s',str_replace("\n",'\n',$xml->value));
    $html .= "\n";
  }
  return $html;
}
$xml = new XMLReader();
$xml->open('../html5.html');
//$xml->open('item-banks-2013-07-16/Algebra Formative C DMP 6-5-13/Import Final.html');
//$assoc = xml2assoc($xml, "root");
$html = getHtml($xml);
$xml->close();

//print_r($assoc);
print $html;


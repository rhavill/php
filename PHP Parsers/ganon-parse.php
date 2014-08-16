<?php
class HtmlEntityConverter {
private $entities = array(
        '&aacute;' => '[aacute]',
        '&acirc;' =>'[acirc]',
	'&Acirc;' => '[Acirc]',
        '&agrave;' =>'[agrave]',
        '&amp;' =>'[amp]',
        '&apos;' => '[apos]',
        '&bull;' =>'[bull]',
        '&cap;' =>'[cap]',
        '&cent;' => '[cent]',
        '&copy;' => '[copy]',
        '&cup;' =>'[cup]',
        '&deg;' =>'[deg]',
        '&eacute;' =>'[eacute]',
        '&ecirc;' =>'[ecirc]',
        '&egrave;' =>'[egrave]',
        '&euml;' =>'[euml]',
        '&frac12;' =>'[frac12]',
        '&frac13;' =>'[frac13]',
        '&frac14;' =>'[frac14]',
        '&frac16;' =>'[frac16]',
        '&frac18;' =>'[frac18]',
        '&frac23;' =>'[frac23]',
        '&frac34;' =>'[frac34]',
        '&frac38;' =>'[frac38]',
        '&frasl;' =>'[frasl]',
        '&gt;' =>'[gt]',
        '&hellip;' =>'[hellip]',
        '&iacute;' =>'[iacute]',
        '&icirc;' =>'[icirc]',
        '&iquest;' => '[iquest]',
        '&lt;' =>'[lt]',
        '&mdash;' =>'[mdash]',
        '&nbsp;' =>'[nbsp]',
        '&ndash;' =>'[ndash]',
	'&ntilde;' => '[ntilde]',
        '&oacute;' =>'[oacute]',
        '&ocirc;' => '[ocirc]',
	'&oslash;' => '[oslash]',
	'&ouml;' => '[ouml]',
        '&quot;' => '[quot]',
        '&reg;' => '[reg]',
        '&trade;' => '[trade]',
        '&ucirc;' =>'[ucirc]',
        '&Uuml;' =>   '[Uuml]',
	'&uuml;' => '[uuml]',
    );
    
    public function entitiesToCode($string) {
        // This method will convert htmlentities such as &copy; into the pseudo string version [copy]; etc
        $from = array_keys($this->entities);
        $to = array_values($this->entities);
        return str_replace($from, $to, $string);
     }

     public function codeToEntities ($string) {
        // This method will convert pseudo string such as [copy] to the original html entity &copy; etc
        $from = array_values($this->entities);
        $to = array_keys($this->entities);
        return str_replace($from, $to, $string);
     }
     
     public function getUnknownEntites($string) {
         $unknown = array();
         $entities = $this->getEntities($string);
         foreach ($entities as $entity) {
             if (!in_array($entity, array_keys($this->entities))) {
                 $unknown[] = $entity;
             }
         }
         return $unknown;
     }
     
     public function getEntities($string) {
	preg_match_all('/&#?\w+;/', $string, $matches);
	return array_unique($matches[0]);         
     }
    
}

function getHtml($dom, $depth=0) {
    $html = '';
    if ($dom->tag == '~text~') {
        $html .= $dom->getInnerText();
    }
    else {
        $html .= "<{$dom->tag}";
        foreach($dom->attributes as $attribute => $value) {
          $html .= " $attribute=\"$value\"";
        }
        //if ($dom->self_close)
            //$html .= $dom->self_close_str;
        $html .= ">";
        for ($i = 0; $i < $dom->childCount(); $i++) {
            $html .= getHtml($dom->getChild($i), $depth+1);
        }
        if (!$dom->self_close)
            $html .= "</{$dom->tag}>";
    }
    return $html;
}

require_once('ganon.php');
$html = file_get_contents('/tmp/temp.html');
// $converter = new HtmlEntityConverter();
// $html = $converter->entitiesToCode($html);
$dom = str_get_dom($html);
//$dom = file_get_dom('../temp.html');
//print getHtml($dom('body', 0));
//print "<!DOCTYPE HTML>";
//$html =  getHtml($dom('html', 0));
foreach($dom('p') as $element) {
   $element->setTag('div'); 
    //print_r($element);
 }

//$html = $converter->codeToEntities($html);
print $dom->html();

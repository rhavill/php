<?php
$initialReplacements = array(
    '&nbsp;' => '[[nbsp]]',
    '&mdash;' => '[[mdash]]',
    '—' => '[[mdash]]',
    '<strong>' => '<b>',
    '</strong>' => '</b>', 
    '<em>' => '<i>',
    '</em>' => '</i>',
);
$finalReplacements = array(
    '[[' => '<',
    ']]' => '>',
);
$blockTags = array(
    'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'ol', 'ul', 'pre', 'address', ' blockquote', 'dl', 'div', 'fieldset', 'form', 'hr', 'noscript', 'table', 'li', 'dt', 'dd', 'frameset', 'tbody', 'td', 'tfoot', 'th', 'thead', 'tr'
);
$inlineTags = array(
    'b', 'big', 'i', 'small', 'tt', 'abbr', 'acronym', 'cite', 'code', 'dfn', 'em', 'kbd', 'strong', 'samp', 'var', 'a', 'bdo', 'br', 'img', 'map', 'object', 'q', 'script', 'span', 'sub', 'sup', 'button', 'input', 'label', 'select', 'textarea'
);
$allowedTags = array('b', 'i', 'sup', 'sub', 'u');
$placeholderTags = array(
    'table',
);

function html2tpl($dom, &$content = array(), &$text = '', $depth=0) {
    global $blockTags;
    global $allowedTags;
    global $inlineTags;
    global $placeholderTags;
    $ignoreChildren = false;
    if ($dom->tag != '~root~') {
        if ($dom->tag == '~text~') {
            if (!preg_match('/^\s+$/', $dom->getInnerText())) {
                $text .= trim($dom->getInnerText(), "\n");
            }
        }
        else if (in_array(strtolower($dom->tag), $placeholderTags)) {
            if ($text && !preg_match('/^\s+$/', $text)) {
                $content[] = array('TEXT' => trim($text, "\n"));
                $content[] = array('VERT_SPACE' => 16);
            }
            $text = '';
            $content[] = array('TEXT' => "[placeholder " . strtolower($dom->tag) . "]");
            $content[] = array('VERT_SPACE' => 16);
            $ignoreChildren = true;
        }
        else if (in_array(strtolower($dom->tag), $blockTags)) {
            if ($text && !preg_match('/^\s+$/', $text)) {
                $content[] = array('TEXT' => trim($text, "\n"));
                $content[] = array('VERT_SPACE' => 16);
            }
            $text = '';
        }
        else if (in_array(strtolower($dom->tag), $allowedTags)) {
            $text .= '<' . strtolower($dom->tag) . '>';
        }
        else if (strtolower($dom->tag) == 'img') {
            if ($text && !preg_match('/^\s+$/', $text)) {
                $content[] = array('TEXT' => trim($text, "\n"));
                $content[] = array('VERT_SPACE' => 16);
            }
            $text = '';
            if (preg_match('/([^\/]*\/)*(.+)$/', $dom->src, $matches)) {
                $src = $matches[2];
            }
            else {
                $src = 'Error parsing image URL.';
            }
            $content[] = array('GRAPHIC' => "just_center $src");
            $content[] = array('VERT_SPACE' => 16);
        }
        else if (in_array(strtolower($dom->tag), $inlineTags)) {
            $text .= ' ';
        }
    }
    if (!$ignoreChildren) {
        for ($i = 0; $i < $dom->childCount(); $i++) {
            html2tpl($dom->getChild($i), $content, $text, $depth+1);
        }
    }
    if (in_array(strtolower($dom->tag), $allowedTags)) {
        $text .= '</' . strtolower($dom->tag) . '>';
    }
    if ($dom->tag == '~root~') {
        if (!preg_match('/^\s+$/', $text)) {
            $content[] = array('TEXT' => trim($text, "\n"));
            $text = '';
        }
        $keys = array_keys($content);
        if (isset($content[count($content) - 1]['VERT_SPACE'])) {
            array_pop($content);
        }
    }
    return $content;
}

require_once('ganon.php');
$html = file_get_contents('/tmp/temp.html');
foreach ($initialReplacements as $key => $value) {
    $html = str_replace($key, $value, $html);
}
//print $html; exit;
$dom = str_get_dom($html);
//$dom = file_get_dom('../temp.html');
//$tpl =  null;
$tpl = html2tpl($dom);
var_dump($tpl);

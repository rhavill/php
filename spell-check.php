<?php

class SpellChecker {
    private $dictionary;
    private $extraAllowedChars = 'ÀÁÂÃÄÅÆàáâãäåæÇçÐÈÉÊËèéêëÌÍÎÏìíîïÑñÒÓÔÕÖØŒòóôõöøœðÞþßÙÚÛÜùúûüŴŵÝŶŷýÿ';
    public function __construct() {
        $this->dictionary = pspell_new('en','','','',PSPELL_FAST);
    }
    
    public function getWords($text) {
        //$words = str_word_count($text, 1, 'àáé');
        $words = str_word_count($text, 1, $this->extraAllowedChars);
        return $words;
    }
    
    public function getMisspelledWords($text) {
        $misspelled = array();
        $words = $this->getWords($text);
        foreach ($words as $word) {
            if (!pspell_check($this->dictionary, $word)) {
                $misspelled[] = $word;
            }
        }
        return $misspelled;
    }
}

function removeTags($text) {
    return preg_replace('/<[^>]+>/', ' ', $text);
}

$speller = new SpellChecker();
$html = 'I can\'t spell good. I am a great speler. How do you spell ag&agrave;ve? How to spell càt?  How to spell r&eacute;sum&eacute;? Is this mispelled? You like piña coladas?';
$html .= '<p>first paragraph contains a misspelled wurd</p><p>second paragraph lso has mispeled word.</p><p>The word r&eacute;sum&eacute; has html entities.</p><img src="blah.jpg"/>';
$text = html_entity_decode($html);
//$text = $html;
print "Text: $text\n";
$text = removeTags($text);
print "Clean Text: $text\n";
print "Words:\n";
print_r($speller->getWords($text));
print "Misspelled:\n";
print_r($speller->getMisspelledWords($text));

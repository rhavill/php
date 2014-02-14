<?php

class SpellChecker {
    private $dictionary;
    
    public function __construct() {
        $this->dictionary = pspell_new('en','','','',PSPELL_FAST);
    }
    
    private function getWords($text) {
        //$words = str_word_count($text, 1, 'àáé');
        $words = str_word_count($text, 1);
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
$speller = new SpellChecker();
$html = 'I am a great speler. How do you spell ag&agrave;ve? How to spell càt?  How to spell r&eacute;sum&eacute;? Is this mispelled? You like piña coladas?';
$text = html_entity_decode($html);
print "$text\n";
print_r($speller->getMisspelledWords($text));

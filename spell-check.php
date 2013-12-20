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
//$speller = new SpellChecker();
//$text = 'Here are some words. This word is missspelled.';
//print_r($speller->getMisspelledWords($text));
$pspell_link = pspell_new('en');
//var_dump(pspell_check($pspell_link, 'càt'));
var_dump(pspell_check($pspell_link, 'c'));

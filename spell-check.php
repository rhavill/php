<?php

class SpellChecker {
    private $dictionary;
    private $text;
    private $cleanedText;
    private $extraAllowedChars = 'ÀÁÂÃÄÅÆàáâãäåæÇçÐÈÉÊËèéêëÌÍÎÏìíîïÑñÒÓÔÕÖØŒòóôõöøœðÞþßÙÚÛÜùúûüŴŵÝŶŷýÿ';
    
    private function removeTags($text) {
        return preg_replace('/<[^>]+>/', ' ', $text);
    }
    
    // This function was copied from http://php.net/manual/en/function.str-word-count.php
//    private function str_word_count_utf8($str) {
//        preg_match_all("/\\p{L}[\\p{L}\\p{Mn}\\p{Pd}'\\x{2019}]*/u", $str, $matches);
//        return $matches[0];
//    } 
    
    public function __construct($text = '') {
        $this->dictionary = pspell_new('en','','','',PSPELL_FAST);
        if ($text) {
            $this->setText($text);
        }
    }
    
    public function setText($text) {
        $this->text = $text;
        $this->cleanedText = html_entity_decode($this->removeTags($text));
        // Remove MathML
        $this->cleanedText = preg_replace('/`[^`]+`/', '', $this->cleanedText);        
    }
    
    public function getWords($text) {
        $words = array();
        $possibleWords = str_word_count($text, 1, $this->extraAllowedChars);
        //$possibleWords = $this->str_word_count_utf8($this->cleanedText, 1, $this->extraAllowedChars);
        for ($i = 0; $i < count($possibleWords); $i++) {
            // Treat hyphenated words as 2 words
            if (strpos($possibleWords[$i], '-') !== FALSE) {
                $splitWords = split("-", $possibleWords[$i]);
                foreach ($splitWords as $splitWord) {
                    $words[] = $splitWord;
                }
            }
            else {
                $words[] = $possibleWords[$i];
            }
        }
        return $words;
    }
    
    public function getMisspelledWords() {
        $misspelled = array();
        $words = $this->getWords($this->cleanedText);
        foreach ($words as $word) {
            // Ignore acronyms or words with all capital letters
            if ($word == strtoupper($word)) {
                continue;
            }
            if (!pspell_check($this->dictionary, $word) && !in_array($word, $misspelled)) {
                $misspelled[] = $word;
            }
        }
        return $misspelled;
    }
    
    public function highlightMisspelledWords($misspelledWords = array()) {
        if (empty($misspelledWords)) {
            $misspelledWords = $this->getMisspelledWords($this->cleanedText);
        }
        $text = $this->text;
        foreach ($misspelledWords as $word) {
            $text = str_replace($word, "<span class=\"misspelled\">$word</span>", $text);
            if ($word != htmlentities($word)) {
                $text = str_replace(htmlentities($word), "<span class=\"misspelled\">$word</span>", $text);
            }
        }
        return $text;
    }
}

function removeTags($text) {
    return preg_replace('/<[^>]+>/', ' ', $text);
}

$speller = new SpellChecker();
$html = 'I can\'t spell good. I am a great speler. How do u2 spell ag&agrave;ve? How to spell càt?  How to spell r&eacute;sum&eacute;? Is this mispelled? You like piña coladas?';
$html .= '<p>first paragraph contains a misspelled wurd</p><p>second paragraph lso has mispeled word.</p><p>The word r&eacute;sum&eacute; has html entities.</p><img src="blah.jpg"/>. More entities: Tom&amp;Jerry. 3 &lt; 4';
$text = html_entity_decode($html);
//$text = $html;
print "Text: $text\n";
$text = removeTags($text);
print "Clean Text: $text\n";
print "Words:\n";
print_r($speller->getWords($text));
print "Misspelled:\n";
print_r($speller->getMisspelledWords($text));

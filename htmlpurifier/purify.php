<?php

require_once 'htmlpurifier-4.6.0/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$config->set('HTML.Doctype', 'HTML 4.01 Transitional');
$config->set('HTML.Allowed', 'select[class]');
$def = $config->getHTMLDefinition(true);
/*
$form = $def->addElement(
  'form',   // name
  'Block',  // content set
  'Flow', // allowed children
  'Common', // attribute collection
  array( // attributes
    'action*' => 'URI',
    'method' => 'Enum#get|post',
    'name' => 'ID'
  )
);
$form->excludes = array('form' => true);
*/

/*
$select = $def->addElement(
  'select',   // name
  'Inline',  // content set
  'Flow', // allowed children
  'Common', // attribute collection
  array( // attributes
    //'action*' => 'URI',
    //'method' => 'Enum#get|post',
    //'name' => 'ID'
  )
);
$select->excludes = array('select' => true);

$option = $def->addElement(
  'option',   // name
  'Inline',  // content set
  'Flow', // allowed children
  'Common', // attribute collection
  array( // attributes
    //'action*' => 'URI',
    //'method' => 'Enum#get|post',
    //'name' => 'ID'
  )
);
$option->excludes = array('option' => true);
*/
$purifier = new HTMLPurifier($config);
$dirty_html = file_get_contents('html5.html');
$clean_html = $purifier->purify($dirty_html);
print $clean_html;

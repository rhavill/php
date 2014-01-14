<?php

$fragment = '<table class="content"><tr valign="top"><td>21</td><td><div><div style="MARGIN-LEFT: 0px"><div align="left">An incomplete number sentence is shown below.<br><br><img alt="WebEQ Image" align="bottom" src="/vam-uploaded-images/item-bank-108/305.jpg"/><br><br>What sign belongs in the square to correctly complete this number sentence?</td></tr><tr valign="top"><td class="distractor">A</td><td><</td></tr><tr valign="top"><td class="distractor">B</td><td>=</td></tr><tr valign="top"><td class="correct">C</td><td>></td></tr><tr valign="top"><td class="distractor">D</td><td>`xx`</td></tr></table>';
print "$fragment\n\n";
$tidy_config = array(
  'show-body-only' => true,
  'vertical-space' => false,
  'wrap' => 0,
);
$tidy = new tidy();

$clean = $tidy->repairString($fragment, $tidy_config, 'UTF8');
print "$clean\n";

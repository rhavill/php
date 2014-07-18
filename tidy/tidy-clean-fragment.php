<?php

$fragment = <<<END
<div style="margin-left: 20px;">
  <p style="margin-left: 20px;">
    my content
  </p>
</div>
<div style="margin-left: 25px;">
  more content
</div>
END;
print "$fragment\n\n";
$tidy_config = array(
  'show-body-only' => true,
  //'vertical-space' => false,
  'wrap' => 0,
  'clean' => true,
  'doctype' => 'strict',
  'fix-uri' => true,
  'output-xhtml' => true,
  'char-encoding' => 'utf8',
  'css-prefix' => 'pt',
);
$tidy = new tidy();

$clean = $tidy->repairString($fragment, $tidy_config, 'UTF8');
print "$clean\n";

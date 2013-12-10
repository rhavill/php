<?php

$pspell_link = pspell_new('en');
var_dump(pspell_check($pspell_link, 'this is a test'));

<?php

$p = pspell_new("en","","","",PSPELL_FAST);

$pspell_config = pspell_config_create("en");
$pspell_link = pspell_new_config($pspell_config);
var_dump(pspell_check($pspell_link,"swagg"));

pspell_config_personal($pspell_config, "/tmp/custom.pws");

pspell_add_to_personal($pspell_link, "swagg");
pspell_save_wordlist($pspell_link);
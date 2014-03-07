<?php
$word = html_entity_decode("r&eacute;s&eacute;");
print "$word\n";
$pspell_config = pspell_config_create("en",'american', '', 'utf-8');
pspell_config_personal($pspell_config, "/tmp/custom.pws");
$pspell_link = pspell_new_config($pspell_config);
//var_dump(pspell_check($pspell_link,$word));


pspell_add_to_personal($pspell_link, $word);
pspell_save_wordlist($pspell_link);

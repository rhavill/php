<?php

$broker = enchant_broker_init();
$dicts = enchant_broker_list_dicts($broker);
$hasSpanish = FALSE;
foreach ($dicts as $dict) {
	if ($dict['lang_tag'] == 'es') {
		$hasSpanish = TRUE;
	}
}
if ($hasSpanish) {
	$dictionary = enchant_broker_request_dict($broker, 'es');
	$words = array('incorrect', 'rápido', 'color', 'español', 'piña');
	foreach ($words as $word) {
		$isCorrect = FALSE;
		if (enchant_dict_check($dictionary, $word)) {
	       $isCorrect = TRUE;
	    }
		print "$word is" . ($isCorrect ? '' : ' NOT') . " spelled correctly.\n";
	}
}
else {
	print "did not find spanish dictionary.\n";
}

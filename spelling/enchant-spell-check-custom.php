<?php

$words = array('correct', 'right', 'aight', 'incorect', 'résumé');
$broker = enchant_broker_init();
$dictionary = enchant_broker_request_dict($broker, 'en_US');
$customDictionary = enchant_broker_request_pwl_dict ($broker, '/tmp/enchant.pwl');
enchant_dict_add_to_personal($customDictionary, 'résumé');
foreach ($words as $word) {
	$isCorrect = FALSE;
	if (enchant_dict_check($dictionary, $word)) {
       $isCorrect = TRUE;
    }
    else if ($customDictionary && enchant_dict_check($customDictionary, $word)) {
        $isCorrect = TRUE;
    }
	print "$word is" . ($isCorrect ? '' : ' NOT') . " spelled correctly.\n";
}
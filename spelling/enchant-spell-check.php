<?php

$words = array('correct','incorect', 'résumé');
$broker = enchant_broker_init();
$dictionary = enchant_broker_request_dict($broker, 'en_US');
foreach ($words as $word) {
	$isCorrect = enchant_dict_check($dictionary, $word);
	print "$word is" . ($isCorrect ? '' : ' NOT') . " spelled correctly.\n";
}
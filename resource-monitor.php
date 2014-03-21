<?php

$fields = array('user' => 1, 'virtual' => 4, 'physical' => 5, 'shared' => 6, '%cpu' =>8, '%mem' => 9, 'time' => 10, 'command' => 11);
$procFile = fopen('/tmp/usage-log.txt', 'w');
$output = `top -b -n 1`;
$lines = explode("\n", $output);
$count = 0;
$procs = array();
fwrite($procFile, str_repeat('#', 80));

foreach ($lines as $line) {
	if ($count < 5) {
		fwrite($procFile, "$line\n");
	}
	else if ($count == 5) {
		fwrite($procFile, "\n".implode("\t", array_keys($fields))."\n");
	}
	else if ($count > 5) {
		$data = preg_split('/\s+/', trim($line));
		if (isset($data[11]) && $data[1] != 'USER') {
			if (($data[8] != '0.0') || ($data[9]  != '0.0')) {
				$procs[] =  array('user' => $data[1], 'virtual' => $data[4], 'physical' => $data[5], 'shared' => $data[6], '%cpu' => $data[8], '%mem' => $data[9],  'time' => $data[10], 'command' => $data[11]);
	 			 // fwrite($procFile, $data[1]."\t".$data[4]."\t".$data[5]."\t".$data[6]."\t".$data[8]."\t".$data[9]."\t".$data[10]."\t".$data[11]."\t"."\n");
			}
		}
	}
	$count++;
}
// $procs = array(
// 	array('blah' => 'second', '%mem' => '1.1'),
// 	array('blah' => 'fourth', '%mem' => '10.9'),
// 	array('blah' => 'third', '%mem' => '1.2'),
// 	array('blah' => 'first', '%mem' => '0.1'),

// );
usort($procs, 'cmp');
var_dump($procs);
fclose($procFile);

// Comparison function
function cmp($a, $b) {
    if ($a['%mem'] == $b['%mem']) {
        return 0;
    }
    return ($a['%mem'] > $b['%mem']) ? -1 : 1;
}

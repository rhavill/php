<?php

$fields = array('user' => 1, 'virtual' => 4, 'physical' => 5, 'shared' => 6, '%cpu' =>8, '%mem' => 9, 'time' => 10, 'command' => 11);
$procFile = fopen('/tmp/usage-procs.txt', 'w');
$totalsFile = fopen('/tmp/usage-totals.txt', 'w');
$output = `top -b -n 1`;
$lines = explode("\n", $output);
$count = 0;
$procs = array();
$now = date("Y-m-d G:i:s");
fwrite($totalsFile, str_repeat('#', 80));

foreach ($lines as $line) {
	if ($count < 5) {
		fwrite($totalsFile, "$line\n");
	}
	else if ($count == 5) {
		fwrite($procFile, "\ntimestamp\t".implode("\t", array_keys($fields))."\n");
	}
	else if ($count > 5) {
		$data = preg_split('/\s+/', trim($line));
		if (isset($data[11]) && $data[1] != 'USER') {
			if (($data[8] != '0.0') || ($data[9]  != '0.0')) {
				$procs[] =  array('user' => $data[1], 'virtual' => $data[4], 'physical' => $data[5], 'shared' => $data[6], '%cpu' => $data[8], '%mem' => $data[9],  'time' => $data[10], 'command' => $data[11]);
			}
		}
	}
	$count++;
}
usort($procs, 'cmp');
foreach ($procs as $proc) {
	fwrite($procFile, "$now\t".implode("\t", array_values($proc))."\n");
}
fclose($procFile);
fclose($totalsFile);

// Comparison function
function cmp($a, $b) {
    if ($a['%mem'] == $b['%mem']) {
        return 0;
    }
    return ($a['%mem'] > $b['%mem']) ? -1 : 1;
}

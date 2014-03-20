<?php

$fields = array('user', 'virtual', 'physical', 'shared', 'cpu', 'mem', 'time', 'command');
$fh = fopen('/tmp/usage-log.txt', 'w');
$output = `top -b -n 1`;
$lines = explode("\n", $output);
$count = 0;
$procs = array();
fwrite($fh, str_repeat('#', 80));

foreach ($lines as $line) {
	if ($count < 5) {
		fwrite($fh, "$line\n");
	}
	else if ($count == 5) {
		fwrite($fh, "\n".implode("\t", $fields));
	}
	else if ($count > 5) {
		$data = preg_split('/\s+/', trim($line));
		var_dump($data);
		// if (isset($data[11]) && $data[9] > 0 || $data[10] > 0) {
		if (isset($data[11])) {
			if ($data[9] > 0 || $data[10] > 0) {
				fwrite($fh, $data[1]."\t"."\n");
			}
		}
	}
	$count++;
}
fclose($fh);
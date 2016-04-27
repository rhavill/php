<?php

$sourceDir = rtrim($argv[1], '/');
$destDir = rtrim($argv[2], '/');
$percent = 0.5;

if ($handle = opendir($sourceDir)) {
    while (false !== ($entry = readdir($handle))) {
	    $sourcePath = $sourceDir . '/' . $entry;
	    $pathParts = pathinfo($sourcePath);
	    $basename = $pathParts['basename'];
	    $extension = $pathParts['extension'];
	    $newPath = $destDir . '/' . $entry;
    	if (is_file($sourcePath) && $extension == 'jpg') {
        	echo "$sourcePath -> $newPath\n";
        	list($width, $height) = getimagesize($sourcePath);
			$newWidth = $width * $percent;
			$newHeight = $height * $percent;
			if ($newWidth && $newHeight) {
				echo "$newWidth x $newHeight\n";
				$newImage = imagecreatetruecolor($newWidth, $newHeight);
				$sourceImage = imagecreatefromjpeg($sourcePath);
				imagecopyresized($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
				imagejpeg($newImage, $newPath);
			}
		}
    }
    closedir($handle);
}



<?php

$sourceDir = rtrim($argv[1], '/');
$destDir = rtrim($argv[2], '/');
if (!$destDir) {
    print "This script must be provided with a source dir and a destination ".
        "dir. Example: php resize.php source-dir dest-dir\n";
    exit;
}

// chdir($sourceDir);
$files = scandir($sourceDir);

foreach ($files as $file) {
    if ($file == 'resize.php') {
        continue;
    }
    
    list($fileName, $extension) = explode('.', $file);
    if ($extension == 'jpg') {
        $src = "$sourceDir/$file";
        $dest = "$destDir/$file";
        
        list($width, $height) = getimagesize($src);
        $newWidth = $width / 4;
        $newHeight = $height / 4;

        $source = imagecreatefromjpeg($src);
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagejpeg($newImage, $dest, 100);
        imagedestroy($source);
        imagedestroy($newImage);
        print "$src ($width x $height) -> $dest ($newWidth x $newHeight)\n\n";
    }
}

<?php

$files = scandir(".");

foreach ($files as $file) {
    if ($file == 'resize.php') {
        continue;
    }
    
    list($fileName, $extension) = explode('.', $file);
    if ($extension == 'jpg') {
        $dest = "small/$file";
        
        list($width, $height) = getimagesize($file);
        $newWidth = $width / 4;
        $newHeight = $height / 4;

        $source = imagecreatefromjpeg($file);
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagejpeg($newImage, $dest, 100);
        imagedestroy($source);
        imagedestroy($newImage);
        print "$file ($width x $height) -> $dest ($newWidth x $newHeight)\n\n";
    }
}

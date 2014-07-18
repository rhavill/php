<?php
$im = new \Imagick();
$im->readImage("/tmp/magick.png");
$im->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
$im->setImageResolution(300,300);
$im->setImageFormat("png");
$im->writeImage('/tmp/magick.png');
?>
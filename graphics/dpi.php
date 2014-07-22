<?php
$im = new \Imagick();
$im->readImage("/tmp/test.bmp");
$im->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
$im->setImageResolution(300,300);
$im->setImageFormat("png");
$im->writeImage('/tmp/test2.bmp');
?>
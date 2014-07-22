<?php

$im = new \Imagick();
$im->readImage('/tmp/png.png');
//$im->setImageUnits(\imagick::RESOLUTION_PIXELSPERINCH);
//$im->setImageResolution(300,300);
$im->setImageFormat("wbmp");
$im->writeImage('/tmp/bmp.png');

<?php

include_once('Desktop.php');
$desktop = new Desktop();
$desktop->formatCSS();
$desktop->formatGraphics();
$desktop->horizontalLayout();
$desktop->closeHTML();

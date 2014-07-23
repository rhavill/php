#!/usr/bin/perl

$file="/tmp/vam-table.png";
$file1="/tmp/vam-table.bmp";
use Image::Magick;
$p = new Image::Magick;
$p->Read($file);
#$p->Set(attribute => value, ...)
#($a, ...) = $p->Get("attribute", ...)
#$p->routine(parameter => value, ...)
#$p->Mogrify("Routine", parameter => value, ...)
$p->Write($file1);
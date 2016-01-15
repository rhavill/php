<?php

require_once './WidgetFactory.php';
require_once './MacWindow.php';
require_once './MacScrollBar.php';

class MacFactory extends WidgetFactory
{
    public function createWindow()
    {
        return new MacWindow();
    }

    public function createScrollBar()
    {
        return new MacScrollBar();
    }
}
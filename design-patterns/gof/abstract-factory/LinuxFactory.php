<?php

require_once './WidgetFactory.php';
require_once './LinuxWindow.php';
require_once './LinuxScrollBar.php';

class LinuxFactory extends WidgetFactory
{
    public function createWindow()
    {
        return new LinuxWindow();
    }

    public function createScrollBar()
    {
        return new LinuxScrollBar();
    }
}
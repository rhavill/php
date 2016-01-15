<?php

require_once './ScrollBar.php';

class LinuxScrollBar extends ScrollBar
{
    public function scrollBarOperation()
    {
        return 'scrollBarOperation from LinuxScrollBar';
    }
}
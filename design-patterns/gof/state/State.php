<?php

require_once './Context.php';

abstract class State
{
    abstract public function handle(Context $context);
}
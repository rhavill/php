<?php

require_once './Component.php';

abstract class Decorator extends Component
{
    private $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation() {
        return $this->component->operation();
    }
}
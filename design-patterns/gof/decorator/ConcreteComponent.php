<?php

require_once './Component.php';

class ConcreteComponent extends Component
{
    public function operation()
    {
        return 'operation from Concrete component.';
    }
}
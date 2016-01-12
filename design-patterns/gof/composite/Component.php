<?php

abstract class Component {

    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public abstract function operation();

    public abstract function add(Component $child);

    public abstract function remove(Component $child);

    public abstract function getChild($i);

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}
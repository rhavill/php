<?php

require_once './Leaf.php';
require_once './Composite.php';

class Client {
    private $components;
    private $data = [
        array('type' => 'Leaf', 'name' => 'Leaf 1'),
        array('type' => 'Leaf', 'name' => 'Leaf 2'),
        array('type' => 'Leaf', 'name' => 'Leaf 3'),
        array('type' => 'Leaf', 'name' => 'Leaf 4'),
        array('type' => 'Leaf', 'name' => 'Leaf 5'),
        array('type' => 'Composite', 'name' => 'Composite 1'),
        array('type' => 'Composite', 'name' => 'Composite 2'),
        array('type' => 'Composite', 'name' => 'Composite 3'),
        array('type' => 'Composite', 'name' => 'Composite 4'),
    ];

    public function __construct()
    {
        foreach ($this->data as $item) {
            $this->components[$item['name']] = new $item['type']($item['name']);
        }
        $this->components['Composite 1']->add($this->components['Leaf 1']);
        $this->components['Composite 2']->add($this->components['Composite 3']);
        $this->components['Composite 2']->add($this->components['Composite 4']);
        $this->components['Composite 2']->add($this->components['Leaf 2']);
        $this->components['Composite 3']->add($this->components['Leaf 3']);
        $this->components['Composite 4']->add($this->components['Leaf 4']);
        $this->components['Composite 4']->add($this->components['Leaf 5']);

    }

    public function output() {
        print $this->components['Leaf 1']->operation() . "\n";
        print $this->components['Composite 1']->operation() . "\n";
        print $this->components['Composite 2']->operation() . "\n";
        print $this->components['Composite 2']->getChild(0)->operation() . "\n";
    }
}

$client = new Client();
$client->output();
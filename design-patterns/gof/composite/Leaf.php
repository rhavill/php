<?php

require_once ('./Component.php');

class Leaf extends Component {

    public function operation() {
        return $this->getName();
    }

    public function add(Component $child) {
        throw new Exception('Leaf does not implement add method.');
    }

    public function remove(Component $child)
    {
        throw new Exception('Leaf does not implement remove method.');
    }

    public function getChild($i)
    {
        throw new Exception('Leaf does not implement getChild method.');
    }

}
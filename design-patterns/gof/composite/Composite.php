<?php

require_once './Component.php';

class Composite extends Component {

    private $children = [];

    public function operation() {
        $names = array();
        foreach($this->children as $child) {
            $names[] = $child->operation();
        }
        return implode(' ', $names) . ' ' . $this->getName();
    }

    public function add(Component $child) {
        $this->children[] = $child;
    }

    public function remove(Component $child)
    {
        for ($i=0; $i < count($this->children); $i++) {
            if ($this->children[$i] === $child) {
                array_splice($this->children, $i, 1);
            }
        }
        throw new Exception('Attempt to remove non-existent child.');
    }

    public function getChild($i)
    {
        if(isset($this->children[$i])) {
            return $this->children[$i];
        }
        else {
            throw new Exception("Child at index $i does not exist.");
        }
    }

}
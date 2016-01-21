<?php

require_once './ConcreteFlyweight.php';
require_once './UnsharedConcreteFlyweight.php';

class FlyweightFactory
{
    private $flyweights = array();
    private $sharedFlyweights = array();

    public function getFlyweight($key) {
        if (!isset($this->flyweights[$key])) {
            if (!isset($this->sharedFlyweights[$key])) {
                $this->sharedFlyweights[$key] = new ConcreteFlyweight($key);
            }
            $this->flyweights[$key] = $this->sharedFlyweights[$key];
        }
        return $this->flyweights[$key];
    }

    public function setAllState($key, $state) {
        $flyweight = $this->getFlyweight($key);
        if ($flyweight instanceof ConcreteFlyweight) {
            $flyweight = new UnsharedConcreteFlyweight($flyweight->getIntrinsicState());
            $this->flyweights[$key] = $flyweight;
        }
        $flyweight->setAllState($state);
    }
}
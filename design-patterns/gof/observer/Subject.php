<?php

require_once './Observer.php';

abstract class Subject
{
    private $observers = array();

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        if (!empty($this->observers)) {
            for ($i=0; $i < count($this->observers); $i++) {
                if ($this->observers[$i] === $observer) {
                    array_splice($this->observers, $i, 1);
                }
            }
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }

    abstract public function getState();

    abstract public function setState($state);
}
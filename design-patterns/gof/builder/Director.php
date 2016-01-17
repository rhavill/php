<?php

require_once './Builder.php';

class Director
{
    private $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        $this->builder->buildPart();
    }
}
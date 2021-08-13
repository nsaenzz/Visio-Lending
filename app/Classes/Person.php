<?php

namespace App\Classes;

class Person{
    protected $name;
    protected $credit_score;
    protected $state;
    public function __construct($name, $credit_score, $state)
    {
        $this->name = $name;
        $this->credit_score = $credit_score;
        $this->state = $state;
    }
    public function setName(String $name): void
    {
        $this->name= $name;
    }
    public function getName(): String
    {
        return $this->name;
    }
    public function setCreditScore(int $credit_score): void
    {
        $this->credit_score = $credit_score;
    }
    public function getCreditScore(): int
    {
        return $this->credit_score;
    }
    public function setState(String $state): void
    {
        $this->state = $state;
    }
    public function getState(): String
    {
        return $this->state;
    }
}

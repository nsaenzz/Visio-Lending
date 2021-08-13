<?php

namespace App\Classes;

class Product{
    protected $name;
    protected $interest_rate = 5.0;
    protected $disqualified;
    public function __construct($name, $interest_rate){
        $this->name = $name;
        $this->interest_rate = $interest_rate;
        $this->disqualified = false;
    }
    public function setName(String $name): void
    {
        $this->name = $name;
    }
    public function getName(): String
    {
        return $this->name;
    }
    public function setInterestRate($interest_rate): void
    {
        $this->interest_rate = $interest_rate;
    }
    public function incrementInterestRate(float $interest_rate_increment): void
    {
        $this->interest_rate += $interest_rate_increment;
    }
    public function reduceInterestRate(float $interest_rate_reduce): void
    {
        $this->interest_rate -= $interest_rate_reduce;
    }
    public function getInterestRate(): float
    {
        return $this->interest_rate;
    }
    public function setDisqualified(bool $disqualified): void{
        $this->disqualified = $disqualified;
    }
    public function getDisqualified(): bool
    {
        return $this->disqualified;
    }
}

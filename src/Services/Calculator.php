<?php

namespace App\Services;

class Calculator
{
    public function __construct(private int|float $first, private int|float $second, private string $operation) {}
    public function getResult(): int|float
    {
        switch($this->operation) {
            case '+':
                 return $this->first + $this->second;
            case '-':
                 return $this->first - $this->second;
            case '*':
                 return $this->first * $this->second;
            case '/':
                 return $this->first / $this->second;
        }
    }
}
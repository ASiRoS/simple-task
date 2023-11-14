<?php

namespace App\Modules\Travel;

class TeenagerDiscounter implements DiscounterInterface
{
    public function calculate(int $count): int
    {
        $percent = $count / 100;
        $deduction = $percent * 10;

        return $count - $deduction;
    }
}
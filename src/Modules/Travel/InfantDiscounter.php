<?php

namespace App\Modules\Travel;

class InfantDiscounter implements DiscounterInterface
{
    public function calculate(int $count): int
    {
        $percent = $count / 100;
        $deduction = $percent * 80;

        return $count - $deduction;
    }
}
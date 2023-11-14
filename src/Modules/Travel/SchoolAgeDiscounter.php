<?php

namespace App\Modules\Travel;

class SchoolAgeDiscounter implements DiscounterInterface
{
    public function calculate(int $count): int
    {
        $percent = $count / 100;
        $deduction = $percent * 30;

        $sum = $count - $deduction;

        if ($sum > 4500) {
            return 4500;
        }

        return $sum;
    }
}
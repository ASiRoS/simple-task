<?php

namespace App\Modules\Travel;


interface DiscounterInterface
{
    public function calculate(int $count): int;
}
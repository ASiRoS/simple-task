<?php

namespace App\Modules\Travel;

class Discounter
{
    public function __construct(private int $age) {}

    /**
     * Вообще идей как это реализовать было много,
     * до того, чтобы просто сделать дискаунтер,
     * который просто сабтрактит процентно какое-то значение
     * с возможностью добавлять какие-то условия
     * до текущей реализации.
     * Но решил просто обойтись чем-то вроде обычной и простой стратегии.
     * Хотя, первая идея была просто бахнуть всё в одном классе, т.к. задача достаточно простая,
     * но решил показать понимание SOLID.
     *
     * Так как у нас нет возможности дискаунта для детей от от 3 до 6,
     * для них дискаунта никакого не будет.
     *
     * Так же у нас не было обозначении, кто такие люди после 12,
     * мы считаем их всех детьми, наверное имеет смысл привнести
     * какие-то ограничения для людей старше условно 20, чтобы для
     * них никакого дискаунта не применялось.
     */
    public function calculate(int $sum): int
    {
        $conditions = [
            InfantDiscounter::class => function () {
                return $this->age < 4;
            },
            SchoolAgeDiscounter::class => function () {
                return $this->age > 5 && $this->age < 12;
            },
            TeenagerDiscounter::class => function () {
                return $this->age >= 12;
            }
        ];

        /** @var DiscounterInterface|null $discounter */
        $discounter = null;

        foreach ($conditions as $discounterClass => $condition) {
            if ($condition()) {
                $discounter = new $discounterClass;
            }
        }

        return $discounter ? $discounter->calculate($sum) : $sum;
    }
}
<?php

declare(strict_types=1);

namespace service;

class BonusService
{
    function getBonusPaymentDate(\DateTime $date, int $month, int $year): string
    {
        $date->setDate($year, $month, 15);
        $isWeekday = (int) $date->format('w');

        return ($isWeekday === 0 || $isWeekday === 6)
            ? $date->modify('next wednesday')->format('Y-m-d')
            : $date->format('Y-m-d');
    }
}

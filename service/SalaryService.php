<?php

declare(strict_types=1);

namespace service;

class SalaryService
{
    function getSalaryPaymentDate(\DateTime $date, int $month, int $year): string
    {
        $date->setDate($year, $month, 1);
        $date->modify('last day of this month');
        $isWeekday = (int) $date->format('w');

        return ($isWeekday === 0 || $isWeekday === 6)
            ? $date->modify('last weekday')->format('Y-m-d')
            : $date->format('Y-m-d');
    }
}

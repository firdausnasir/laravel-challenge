<?php

namespace App\Services\InternetServiceProvider;

use App\Abstract\InternetServiceProviderAbstract;
use App\Interfaces\InternetServiceProviderInterface;

class Mpt extends InternetServiceProviderAbstract implements InternetServiceProviderInterface
{
    protected string $operator = 'mpt';

    protected int $month = 0;

    protected int $monthlyFees = 200;

    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    public function calculateTotalAmount(): float|int
    {
        return $this->month * $this->monthlyFees;
    }
}
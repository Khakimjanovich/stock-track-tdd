<?php


namespace App\Traits;


trait DollarsToCents
{

    /**
     * @param $price
     * @return int
     */

    public function dollarsToCents($price): int
    {
        return (int)($price * 100);
    }
}

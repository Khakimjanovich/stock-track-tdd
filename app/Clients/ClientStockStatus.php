<?php
/*
 * Created by AYKh
 * Please contact before making any changes
 *
 * Tashkent, Uzbekistan
 */


namespace App\Clients;


class ClientStockStatus
{

    public $available;
    public $price;

    public function __construct(bool $available, int $price)
    {
        $this->available = $available;
        $this->price = $price;
    }
}

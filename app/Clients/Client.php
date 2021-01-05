<?php
/*
 * Created by AYKh
 * Please contact before making any changes
 *
 * Tashkent, Uzbekistan
 */


namespace App\Clients;


use App\Models\Stock;

interface Client
{
    public function checkAvailability(Stock $stock): ClientStockStatus;
}

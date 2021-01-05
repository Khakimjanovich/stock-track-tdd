<?php
/*
 * Created by AYKh
 * Please contact before making any changes
 *
 * Tashkent, Uzbekistan
 */


namespace App\Clients;


use App\Models\Stock;
use Illuminate\Support\Facades\Http;

class BestBuy implements Client
{
    public function checkAvailability(Stock $stock): ClientStockStatus
    {
        $res = Http::get('foo.test')->json();
        return new ClientStockStatus(
            (boolean)$res['available'],
            (int)($res['price'] * 100)
        );
    }
}

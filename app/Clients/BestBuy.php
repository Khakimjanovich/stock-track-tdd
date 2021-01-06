<?php
/*
 * Created by AYKh
 * Please contact before making any changes
 *
 * Tashkent, Uzbekistan
 */


namespace App\Clients;


use App\Models\Stock;
use App\Traits\DollarsToCents;
use Illuminate\Support\Facades\Http;

class BestBuy implements Client
{
    use DollarsToCents;

    public function checkAvailability(Stock $stock): ClientStockStatus
    {
        $res = Http::get('foo.test')->json();
        return new ClientStockStatus(
            (boolean)$res['available'],
            $this->dollarsToCents($res['price'])
        );
    }
}

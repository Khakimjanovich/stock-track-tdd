<?php
/*
 * Created by AYKh
 * Please contact before making any changes
 *
 * Tashkent, Uzbekistan
 */


namespace App\Clients;


use App\Exceptions\ClientNotFoundException;
use App\Models\Retailer;
use Illuminate\Support\Str;

class ClientFactory
{
    public function make(Retailer $retailer): Client
    {
        $class = "App\\Clients\\" . Str::studly($retailer->name);

        if (!class_exists($class)) {
            throw new ClientNotFoundException(
                'Client for this ' . $retailer->name . ' not found!'
            );
        }
        return new $class;
    }
}

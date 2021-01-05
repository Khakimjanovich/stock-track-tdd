<?php

namespace Tests\Unit;

use App\Clients\ClientStockStatus;
use App\Exceptions\ClientNotFoundException;
use App\Models\Retailer;
use App\Models\Stock;
use Database\Seeders\RetailerWithProductSeeder;
use Facades\App\Clients\ClientFactory;
use Tests\TestCase;

class StockTest extends TestCase
{
    public function test_it_throws_an_exception_if_a_non_existed_client_given()
    {
        $this->seed(RetailerWithProductSeeder::class);
        Retailer::first()->update([
            'name' => 'Foo'
        ]);
        $this->expectException(ClientNotFoundException::class);
        Stock::first()->track();
    }

    public function test_it_refreshes_the_stock_status_after_being_tracked()
    {
        $this->seed(RetailerWithProductSeeder::class);

        ClientFactory::shouldReceive('make->checkAvailability')->andReturn(
            new ClientStockStatus($available = true, $price = 996600)
        );

        $stock = tap(Stock::first())->track();
        $this->assertTrue($stock->in_stock);
        $this->assertEquals($stock->price, 996600);
    }
}

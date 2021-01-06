<?php

namespace Tests\Unit;

use App\Models\History;
use App\Models\Stock;
use Database\Seeders\RetailerWithProductSeeder;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ProductHistoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_records_history_each_time_stock_is_tracked()
    {
        //given
        // i have a stock to track
        $this->seed(RetailerWithProductSeeder::class);
        //when
        $this->assertEquals(0, History::count());
        // track that stock
        Http::fake(fn() => ['available' => true, 'price' => 9900]);
        $stock = tap(Stock::first())->track();
        //then
        // a new history entry should be recorded
        $this->assertEquals(1, History::count());
        $history = History::first();

        $this->assertEquals($stock->price, $history->price);
        $this->assertEquals($stock->in_stock, $history->in_stock);
        $this->assertEquals($stock->id, $history->stock_id);
    }
}

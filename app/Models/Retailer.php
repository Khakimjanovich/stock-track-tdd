<?php

namespace App\Models;

use App\Clients\Client;
use Facades\App\Clients\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Retailer
 * @package App\Models
 *
 * @property integer id
 * @property string name
 */
class Retailer extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function addStock(Product $product, Stock $stock)
    {
        $stock->product_id = $product->id;
        $this->stock()->save($stock);
    }

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function inStock(): bool
    {
        return $this->stock()->where('in_stock', true)->exists();
    }

    public function client(): Client
    {
        return ClientFactory::make($this);
    }
}

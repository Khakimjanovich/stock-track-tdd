<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Stock
 * @package App\Models
 *
 * @property integer product_id
 * @property bool in_stock
 * @property Retailer retailer
 *
 */
class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'stock';
    protected $casts = [
        'in_stock' => 'boolean'
    ];

    public function track(): void
    {
        $status = $this->retailer->client()->checkAvailability($this);

        $this->update([
            'in_stock' => $status->available,
            'price' => $status->price
        ]);
    }


    public function retailer(): BelongsTo
    {
        return $this->belongsTo(Retailer::class);
    }
}

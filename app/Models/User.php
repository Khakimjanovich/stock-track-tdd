<?php
/*
 * Created by AYKh
 * Please contact before making any changes
 *
 * Tashkent, Uzbekistan
 */


namespace App\Models;

use App\Clients\Cards\Card;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'phone', 'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class, 'user_card')->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'reservation_id',
        'price',
        'title',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    public function adresse()
    {
        return $this->hasOne(Adresse::class);
    }
}

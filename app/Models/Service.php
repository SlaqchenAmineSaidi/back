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
        'price',
        'title',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}

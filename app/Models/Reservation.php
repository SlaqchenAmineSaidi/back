<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'gender',
        'day',
        'time',
        'user_id'
    ];

    public function service()
    {
        return $this->hasOne(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

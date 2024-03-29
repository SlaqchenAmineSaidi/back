<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Adresse extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'adress1',
        'adress2',
        'service_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

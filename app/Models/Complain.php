<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Complain extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'complain',
        'WashId',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

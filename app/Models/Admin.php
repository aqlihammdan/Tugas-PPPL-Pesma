<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "pengguna";
    protected $primarykey = "id";
    protected $fillable = [
        'name', 'level',
        'email',
        'password',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    use HasFactory;
}

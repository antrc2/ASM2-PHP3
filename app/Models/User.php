<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = "users";
    protected $fillable = [
        "fullname","username","password","email","phone","address",'status'
    ];
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        "password"=>'hashed'
    ];
    
}

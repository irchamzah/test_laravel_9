<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    // Kolom yang bisa diisi
    protected $fillable = [
        'username', // Pastikan ini sesuai dengan kolom di tabel
        'email',
        'password',
    ];

    // Kolom yang harus di-hidden
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Kolom yang bisa dikonversi
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

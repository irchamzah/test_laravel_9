<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'username',
        'password',
        'name',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Override getAuthPassword() method
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'username', 'username');
    }
}

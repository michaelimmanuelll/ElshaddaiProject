<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // Pastikan sesuai dengan nama tabel di PHPMyAdmin
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'jabatan',
        'telepon'
    ];

    // Tambahkan ini di dalam class User
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Memberitahu Laravel bahwa kolom ini sudah ter-hash
        ];
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Method untuk check role
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    public function isAdminGereja()
    {
        return $this->role === 'admin_gereja';
    }

    public function isPengurus()
    {
        return $this->role === 'pengurus';
    }
}

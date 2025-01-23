<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'patronymic',
        'login',
        'email',
        'password',
        'role',
        'agree'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'agree' => 'boolean',
    ];

    // Метод для получения полного имени пользователя
    public function getNameAttribute(): string
    {
        return trim("{$this->firstname} {$this->lastname}");
    }

    // Метод для проверки доступа к админ-панели
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->role === 'admin';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function validateCredentials($credentials)
    {
        dd([
            'checking_credentials' => true,
            'provided' => $credentials,
            'stored' => [
                'login' => $this->login,
                'password' => $this->password // Будет захешировано
            ]
        ]);
    }
}

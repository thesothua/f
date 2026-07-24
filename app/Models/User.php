<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    /**
     * The guard name for Spatie permissions.
     *
     * @var string
     */
    protected $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'phone',
        'bio',
        'avatar',
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
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'firstName',
        'lastName',
        'role',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFirstNameAttribute()
    {
        if (!empty($this->attributes['first_name'])) {
            return $this->attributes['first_name'];
        }
        $parts = explode(' ', $this->name ?? '', 2);
        return $parts[0] ?? '';
    }

    public function getLastNameAttribute()
    {
        if (!empty($this->attributes['last_name'])) {
            return $this->attributes['last_name'];
        }
        $parts = explode(' ', $this->name ?? '', 2);
        return $parts[1] ?? '';
    }

    public function getRoleAttribute()
    {
        return $this->roles->first()?->name ?? 'User';
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $frontendUrl = env('FRONTEND_URL', 'http://127.0.0.1:5173');
        $url = $frontendUrl . '/admin/reset-password?token=' . $token . '&email=' . urlencode($this->email);

        $this->notify(new \App\Notifications\ResetPasswordNotification($url));
    }
}

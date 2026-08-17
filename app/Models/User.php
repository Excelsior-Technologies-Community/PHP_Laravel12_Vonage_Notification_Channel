<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'otp',
        'otp_expires_at',
        'phone_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function routeNotificationForVonage($notification)
    {
        return $this->phone;
    }

    public function smsLogs()
    {
        return $this->hasMany(SmsLog::class);
    }

    public function isPhoneVerified(): bool
    {
        return !is_null($this->phone_verified_at);
    }
}
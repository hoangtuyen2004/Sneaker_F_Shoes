<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_code',
        'name',
        'email',
        'birthday',
        'phone_number',
        'gender',
        'image',
        'password',
        'status',
        'role',
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
    ];
    public function location() {
        return $this->hasMany(Location::class);
    }
    public function cart() {
        return $this->hasMany(Cart::class,'users_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'users_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, 'users_id');
    }
    public function status_orders()
    {
        return $this->hasOne(Status_order::class,'users_id');
    }
}

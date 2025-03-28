<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
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
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function visits()
    {
        return $this->belongsToMany(Visit::class, 'visit_user');
    }
    public function usermetas()
    {
        return $this->hasOne(UserMeta::class, 'user_id');
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
    
}

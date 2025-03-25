<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Constants\UserRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const PARTNER = 'partner';
    const CONSULTANT = 'consultant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'value_hour',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        
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

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'user_id'); 
    }
    
    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }
    
    public function isPartner()
    {
        return $this->type == UserRoles::PARTNER;
    }

    public function isConsultant()
    {
        return $this->type == UserRoles::CONSULTANT;
    }

    public function isFinancier()
    {
        return $this->type == UserRoles::FINANCIER;
    }

    public function isIntern()
    {
        return $this->type == UserRoles::INTERN;
    }

    public function roles()
    {
        return [UserRoles::PARTNER, UserRoles::CONSULTANT, UserRoles::FINANCIER, UserRoles::INTERN];
    }

    public static function boot()
    {
        parent::boot();

        // Automatically assign a supplier when a consultant user is created
        static::created(function ($user) {
            if ($user->isConsultant()) {
                Supplier::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'personType' => 0,
                ]);
            }
        });
    }
}

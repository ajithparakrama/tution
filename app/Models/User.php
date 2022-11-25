<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, HasRoles;

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
       'user_name',
        'phone'
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

    /**
     * Get all of the tution for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tution()
    {
        return $this->hasMany(TutionClass::class, 'teacher_id');
    }

       /**
     * The staff that belong to the TutionClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function TutionClass()
    {
        return $this->belongsToMany(TutionClass::class, 'tution_class_user', 'user_id','tution_class_id');
    }
}

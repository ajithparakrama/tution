<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nic',
        'phone',
        'phone1',
        'parent_contact',
        'parent_contact1',
        'email',
        'avatar',
        'remarks',
        'dob',
        'address',
        'parent_name',
        'gender'
    ];


}

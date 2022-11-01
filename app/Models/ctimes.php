<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctimes extends Model
{
    use HasFactory;

    protected $fillable =[
        'date',
'start_at',
'end_at',
'remarks',
'tution_classes_id'
    ];

}

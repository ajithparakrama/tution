<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentMonth extends Model
{
    use HasFactory;


    protected $fillable = [
        'name'
    ];
    /**
     * Get the user that owns the paymentMonth
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function TutionClass()
    {
        return $this->belongsTo(TutionClass::class, 'tution_class_id');
    }

    /**
     * The roles that belong to the paymentMonth
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function student()
    {
        return $this->belongsToMany(student::class, 'payment_month_student', 'payment_month_id', 'student_id')->withPivot('amount');
    }
 
}

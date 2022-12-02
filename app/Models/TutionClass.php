<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutionClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
'type', 
'hall_id',
'teacher_id',
'subjects_id',
'active'
    ];

    /**
     * Get the user that owns the tution_class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

 

    /**
     * Get the user that owns the tution_class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(subject::class, 'subjects_id');
    }

    /**
     * Get all of the ctimes for the tution_class
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ctimes()
    {
        return $this->hasMany(ctimes::class, 'tution_classes_id', 'id');
    }

    /**
     * The staff that belong to the TutionClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function student()
    {
        return $this->belongsToMany(student::class, 'student_tution_class', 'tution_class_id', 'student_id');
    }

    /**
     * Get all of the paymentMonths for the TutionClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMonths()
    {
        return $this->hasMany(paymentMonth::class, 'tution_classes_id');
    }

    /**
     * The staff that belong to the TutionClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function staff()
    {
        return $this->belongsToMany(User::class, 'tution_class_user', 'tution_class_id','user_id');
    }

    /**
     * Get the hall that owns the TutionClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hall()
    {
        return $this->belongsTo(hall::class, 'hall_id');
    }
}

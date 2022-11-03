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
'location',
'institutes_id',
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
     * Get the institute that owns the tution_class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institute()
    {
        return $this->belongsTo(institute::class, 'institutes_id');
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
     * The roles that belong to the TutionClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function student()
    {
        return $this->belongsToMany(student::class, 'student_tution_class', 'tution_class_id', 'student_id');
    }
}

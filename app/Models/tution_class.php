<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tution_class extends Model
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

}
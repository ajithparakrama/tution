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


    /**
     * The students that belong to the ctimes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(student::class, 'ctime_student', 'ctime_id', 'student_id')->withPivot('created_by','ip','update_by','up_ip')->withTimestamps();
    }

}

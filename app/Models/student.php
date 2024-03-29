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

    /**
     * The roles that belong to the TutionClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function TutionClass()
    {
        return $this->belongsToMany(TutionClass::class, 'student_tution_class', 'student_id', 'tution_class_id');
    }

        /**
     * The roles that belong to the paymentMonth
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function paymentMonth()
    {
        return $this->belongsToMany(paymentMonth::class, 'payment_month_student', 'student_id', 'payment_month_id')->withPivot('amount');
    }

        /**
     * The students that belong to the ctimes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ctimes()
    {
        return $this->belongsToMany(ctimes::class, 'ctime_student', 'student_id', 'ctime_id')->withPivot('craete_by','ip','update_by','up_ip');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtbugClass extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class',
        'subject_id',
        'level_id',
        'fee',
        'type',
        'teacher_id',
        'zoom_obj',
        'zoom_link',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User','id','teacher_id');
    }

    public function subject()
    {
        return $this->hasOne('App\Models\Subject','id','subject_id');
    }

    public function level()
    {
        return $this->hasOne('App\Models\Level','id','level_id');
    }


    public function schedule()
    {
        return $this->hasMany('App\Models\ClassSchedule','class_id','id'); ### (Reference Model, 'Model reference id to this model', 'primary of this model')
    }

    public function enrollees() {
        return $this->hasOne(ClassEnrollee::class, 'class_id', 'id');
    }

    /**
     * Get the fee's formatted amount.
     *
     * @param  string  $value
     * @return string
     */
    // public function getFeeAttribute($value)
    // {
    //     return 'SGD ' . number_format($value,2);
    // }


}

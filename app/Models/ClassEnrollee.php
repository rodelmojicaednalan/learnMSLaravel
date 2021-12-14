<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassEnrollee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_id',
        'user_id',
        'status',
        'child_id'
    ];

    public function schedule()
    {
        return $this->hasMany('App\Models\ClassSchedule','class_id','class_id'); ### (Reference Model, 'Model reference id to this model', 'primary of this model')
    }

    public function child() {
        return $this->belongsTo(Child::class);
    }

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function class() {
        return $this->belongsTo(ArtbugClass::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'category';

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
        'subject',
        'type',
        'category',
        'parent_id',
    ];

 
    // public function level()
    // {
    //     return $this->hasOne('App\Models\Level','subject_id','id');
    // }

    // public function grading()
    // {
    //     return $this->hasMany('App\Models\GradingSubject','subject_id','id');
    // }
}

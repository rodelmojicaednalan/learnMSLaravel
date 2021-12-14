<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingSubject extends Model
{
    use HasFactory;

    protected $table = 'grading_subject';

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
        'grading_id',
        'subject_id',
    ]; 


    public function subject()
    {
        return $this->belongsTo('App\Models\Subject','subject_id','id');
    } 


 
}

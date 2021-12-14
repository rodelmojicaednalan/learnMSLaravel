<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $table = 'classes_schedules';

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
        'class_id', 
        'start_date',
        'start_time',
        'end_time',
        'meeting_id',
        'meeting_url',
    ];  

    public function subject()
    {
        return $this->hasOne('App\Models\ArtbugClass','id','class_id');
    } 

  
}

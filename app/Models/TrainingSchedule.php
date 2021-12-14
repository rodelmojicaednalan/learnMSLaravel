<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
{
    use HasFactory;

    protected $table = 'training_schedules';

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
        'training_id', 
        'start_date',
        'start_time',
        'meeting_id',
        'meeting_url',
        'end_time',
    ];  

     public function training()
    {
        return $this->hasOne('App\Models\Training','id','training_id');
    } 
}

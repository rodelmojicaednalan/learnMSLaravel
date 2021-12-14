<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingApplicant extends Model
{
    use HasFactory;

    protected $table = 'training_applicant';

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
        'user_id',
        'status',     
    ];  

    public function schedule()
    {
        return $this->hasMany('App\Models\TrainingSchedule','training_id','id'); ### (Reference Model, 'Model reference id to this model', 'primary of this model')
    }

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    } 

    public function subject()
    {
        return $this->hasOne('App\Models\Subject','id','subject_id');
    } 

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherLevel extends Model
{
    use HasFactory;

    protected $table = 'teacher_level';

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
        'user_id',
        'level',        
    ]; 

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    } 
}

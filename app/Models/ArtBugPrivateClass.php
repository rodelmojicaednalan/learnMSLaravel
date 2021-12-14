<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ArtbugPrivateClass extends Model
{
    use HasFactory; 

    protected $table = 'private_classes';

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
        'class_date',
        'class_start_time',     
        'class_end_time',   
        'teacher_id',    
    ];  
}

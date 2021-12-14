<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grading extends Model
{
    use HasFactory;

    protected $table = 'grading';

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
        'children_id',
        'parent_id',
    ]; 

    public function subjects()
    {
        return $this->hasMany('App\Models\GradingSubject','grading_id','id');
    } 

    public function child()
    {
        return $this->hasOne('App\Models\Child','id','children_id');
    } 
}

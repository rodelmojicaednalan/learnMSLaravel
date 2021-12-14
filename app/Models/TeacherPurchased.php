<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPurchased extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'teacher_purchased';

    protected $fillable = [
        'user_id',
        'curriculum_id',
        'status',
    ];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }

    public function curriculum(){

        return $this->hasOne(Curriculum::class, 'id', 'curriculum_id');

    }

}

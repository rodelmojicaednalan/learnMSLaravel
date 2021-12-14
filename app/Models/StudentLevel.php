<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLevel extends Model
{
    use HasFactory;

    protected $table = 'student_levels';

    protected $fillable = [
        'name',
        'choices'
    ];


}

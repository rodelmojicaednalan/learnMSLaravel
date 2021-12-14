<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculum';

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
        'subject_id',
        'name',
        'description',
        'school_id',
        'thumbnail',
        'fee',
    ];

    public function category()
    {

        return $this->hasOne(Category::class, 'id', 'subject_id');
    }
    public function level()
    {

        return $this->hasOne(Level::class, 'id', 'level_id');
    }
    public function school()
    {

        return $this->hasOne(School::class, 'id', 'school_id');

    }
    public function purchased(){

        return $this->hasMany(TeacherPurchased::class, 'curriculum_id', 'id');

    }
}

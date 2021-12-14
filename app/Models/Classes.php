<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'programmes_id',
        'teacher_id'
    ];

    public function teacher(){

        return $this->hasOne(teacherDetail::class, 'teacher_id');

    }
    public function programmes(){

        return $this->hasOne(Programmes::class, 'programmes_id');

    }
    public function live_class(){

        return $this->hasMany(LiveClassSchedule::class, 'class_id', 'id');

    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($class) { // before delete() method call this
            if ($class->live_class()->count()) {
                $class->live_class()->each(function ($live_class) {
                    $live_class->delete(); // <-- direct deletion
                });
            }
        });
    }

}

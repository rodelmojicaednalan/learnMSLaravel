<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'status',
        'orca_class_id',
    ];

    protected $classes = [
        'orca_class_id' => 'array'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

	public function class_details()
    {
        return $this->belongsTo(OrcaClass::class, 'orca_class_id');
    }

    public function class_schedule(){
        return $this->hasMany(OrcaClassLiveClassSchedule::class, 'orca_classes_id' , 'orca_class_id');
    }

    public function class_schedule_count(){
        return $this->hasMany(OrcaClassLiveClassSchedule::class, 'orca_classes_id' , 'orca_class_id');
    }
}

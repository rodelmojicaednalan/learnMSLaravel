<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'child';

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
        'parent_id',
        'full_name',
        'gender',
        'relationship',
        'school',
        'spoken_language',
        'country_of_residency',
        'grade',
        'birthdate'
    ];

    // public function parent()
    // {
    //     return $this->hasOne('App\Models\User','id','parent_id');
    // }

    /**
     * Get the user that owns the phone.
     */
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id', 'id');
    }

    public function enrolled()
    {
        return $this->belongsTo(ClassEnrollee::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumResources extends Model
{
    use HasFactory;

    protected $table = 'curriculum_resources';

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
        'curr_id',
        'name',
        'type',
        'view_type',
        'size',
        'path',
        'description',
    ];
}

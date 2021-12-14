<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrcaClassPreRecordedVideo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'class_pre_recorded_videos';

    protected $fillable = [
        'programmes_id',
        'class_name',
        'file_name',
        'file_size',
        'type',
        'duration',
        'temp_upload'
    ];

    public function class()
    {
        return $this->belongsTo(Programmes::class, 'programmes_id');
    }
}

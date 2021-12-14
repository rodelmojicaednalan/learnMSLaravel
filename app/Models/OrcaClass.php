<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrcaClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'orca_curricula_id',
        'orca_categories_id',
        'price',
        'cover_photo',
        'class_type',
        'user_id',
    ];

    protected $casts = [
        'orca_categories_id' => 'array'
    ];

    public function liveClass()
    {
        return $this->hasMany(OrcaClassLiveClassSchedule::class, 'orca_classes_id');
    }

    public function preRecordedVideos()
    {
        return $this->hasMany(OrcaClassPreRecordedVideo::class, 'orca_classes_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orcaCategory()
    {

        return $this->hasMany(OrcaCategory::class, 'id');
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($class) { // before delete() method call this

            if ($class->preRecordedVideos()->count()) {
                $class->preRecordedVideos()->each(function ($video) {
                    Storage::delete($video->video_path);
                    $video->delete(); // <-- direct deletion
                });
            }

            // $user->posts()->each(function ($post) {
            //     $post->delete(); // <-- raise another deleting event on Post to delete comments
            // });
            // do the rest of the cleanup...
        });
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'orca_class_id');
    }
}

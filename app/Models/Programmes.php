<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Programmes extends Model
{
    use HasFactory;

    protected $table = 'programmes';

    protected $fillable = [

        'user_id',
        'curriculum_id',
        'categories_id',
        'level_id',
        'title',
        'description',
        'price',
        'cover_photo',
        'is_published',
        'class_type',

    ];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }
    public function categories(){

        return $this->hasOne(Category::class, 'id' , 'categories_id');

    }

    public function level(){
        return $this->hasOne(Level::class, 'id' , 'level_id');
    }
    public function classes(){

        return $this->hasMany(Classes::class, 'programmes_id', 'id');

    }
    public function preRecordedVideos(){

        return $this->hasMany(OrcaClassPreRecordedVideo::class, 'programmes_id', 'id');

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
            Storage::disk('public')->delete('uploads/teacher/class/image/'. $class->cover_photo);
            if ($class->preRecordedVideos()->count()) {
                $class->preRecordedVideos()->each(function ($video) {
                    Storage::disk('public')->delete($video->video_path);
                    $video->delete(); // <-- direct deletion
                });
            }else if($class->classes()->count()){
                $class->classes()->each(function($classes){
                    $classes->delete();
                });
            }

            // $user->posts()->each(function ($post) {
            //     $post->delete(); // <-- raise another deleting event on Post to delete comments
            // });
            // do the rest of the cleanup...
        });
    }
    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentDetail extends Model
{
    use HasFactory;

    protected $appends = [
        'formatted_spoken_language',
        'formatted_related_skills'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'country_of_incorporation',
        'spoken_language',
        'profile_picture',
        'description',
        'related_skills',
        'relationship',
    ];

    public function getFormattedSpokenLanguageAttribute()
    {
        $formatted_language = [];
        if ($this->spoken_language) {
            $formatted_language = explode(',', $this->spoken_language);
        }

        return $formatted_language;
    }

    public function getFormattedRelatedSkillsAttribute()
    {
        $formatted_skills = [];
        if ($this->related_skills) {
            $formatted_skills = explode(',', $this->related_skills);
        }

        return $formatted_skills;
    }
}

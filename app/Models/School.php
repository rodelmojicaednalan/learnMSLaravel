<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo',
        'description',
        'address',
        'user_id',
        'school_name',
        'number_of_teachers',
        'website',
        'spoken_language',
        'country_of_incorporation',
        'company_registration_number',
        'related_skills'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher()
    {
        return $this->belongsToMany(User::class, 'school_teacher')->withTimestamps();
    }

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

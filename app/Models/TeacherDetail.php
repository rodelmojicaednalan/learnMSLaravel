<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDetail extends Model
{
    use HasFactory;

    protected $appends = [
        'masked_moe_registration_number',
        'formatted_spoken_language',
        'formatted_related_skills'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school_id',
        'user_id',
        'highest_education_qualification',
        'name_of_institution',
        'country_of_incorporation',
        'type',
        'spoken_language',
        'profile_picture',
        'description',
        'related_skills',
        'moe_registration_number',
        'moe_registration_number_verified'
    ];


    public function getMaskedMoeRegistrationNumberAttribute()
    {
        if (strlen($this->moe_registration_number) > 4) {
            $mask_number =  str_repeat("*", strlen($this->moe_registration_number) - 4) . substr($this->moe_registration_number, -4);
        } else {
            $mask_number = str_repeat("*", 4);
        }

        return $mask_number;
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

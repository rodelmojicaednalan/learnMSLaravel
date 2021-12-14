<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
// use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    // use HasFactory, Notifiable, HasRoles, Billable;
    use HasFactory, Notifiable, HasRoles, SoftDeletes;
    // use HasFactory, Notifiable;

    protected $appends = [
        'fullname',
        'facebook_link',
        'twitter_link',
        'behance_link',
        'linkedin_link',
        'instagram_link',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'contact_number',
        'is_approved',
        'fb_id',
        'google_id',
        'twitter_id',
        'linkedin_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the children for the user.
     */
    public function children()
    {
        return $this->hasMany(Child::class, 'parent_id');
    }


    // public function training()
    // {
    //     return $this->hasOne('App\Models\Training','trainer','id');
    // }

    // public function teacher(){
    //     return $this->belongsToMany(School::class, 'school_teacher')->withTimestamps();
    // }

    public function schoolAdmin()
    {
        return $this->hasOne(School::class);
    }

    public function teacher()
    {
        return $this->belongsToMany(School::class, 'school_teacher')->withTimestamps();
    }

    public function getFullnameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function teacherDetails()
    {
        return $this->hasOne(TeacherDetail::class);
    }

    public function parentDetails()
    {
        return $this->hasOne(ParentDetail::class);
    }

    public function social_link()
    {
        return $this->hasMany(SocialLink::class);
    }

    public function getFacebookLinkAttribute()
    {
        $facebook = $this->social_link()->whereSocialMediaName('Facebook')->first();

        return (!is_null($facebook)) ? $facebook->social_media_link : '';
    }

    public function getTwitterLinkAttribute()
    {
        $twitter = $this->social_link()->whereSocialMediaName('Twitter')->first();

        return (!is_null($twitter)) ? $twitter->social_media_link : '';
    }

    public function getLinkedinLinkAttribute()
    {
        $linkedin = $this->social_link()->whereSocialMediaName('Linkedin')->first();

        return (!is_null($linkedin)) ? $linkedin->social_media_link : '';
    }

    public function getBehanceLinkAttribute()
    {
        $behance = $this->social_link()->whereSocialMediaName('Behance')->first();

        return (!is_null($behance)) ? $behance->social_media_link : '';
    }

    public function getInstagramLinkAttribute()
    {
        $instagram = $this->social_link()->whereSocialMediaName('Instagram')->first();

        return (!is_null($instagram)) ? $instagram->social_media_link : '';
    }

    public function count_cart()
    {
        return $this->belongsTo(Cart::class, 'user_id');
    }

    // public function isSchoolTeacher()
    // {
    //     return !is_null($this->teacherDetails->school_id);
    // }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrcaClassLiveClassSchedule extends Model
{
    use HasFactory;

    protected $appends = [
        'schedule_difference',
        'formatted_start_date',
        'formatted_start_time',
        'formatted_end_time',
        'schedule_date_difference',
        'schedule_date_difference',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orca_classes_id',
        'class_name',
        'price',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'is_published'
    ];

    public function setStartDateAttribute($value)
    {
        $time = strtotime($value);
        $newformat = date('Y-m-d', $time);
        $this->attributes['start_date'] = $newformat;
    }

    public function setEndDateAttribute($value)
    {
        $time = strtotime($value);
        $newformat = date('Y-m-d', $time);
        $this->attributes['end_date'] = $newformat;
    }

    public function setEndTimeAttribute($value)
    {
        $newFormat = date("H:i:s", strtotime($value));
        $this->attributes['end_time'] = $newFormat;
    }

    public function setStartTimeAttribute($value)
    {
        $newFormat = date("H:i:s", strtotime($value));
        $this->attributes['start_time'] = $newFormat;
    }

    public function class()
    {
        return $this->belongsTo(OrcaClass::class, 'orca_classes_id');
    }

    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->format('D jS\\, F Y');
    }

    public function getFormattedStartTimeAttribute()
    {
        return Carbon::parse($this->start_time)->format('h:i A');
    }

    public function getFormattedEndTimeAttribute()
    {
        return Carbon::parse($this->end_time)->format('h:i A');
    }

    public function getScheduleDifferenceAttribute()
    {
        $now = Carbon::now();
        // $start_date = $this->getScheduleDateDifferenceAttribute();
        // $start_time = Carbon::parse($this->start_time)->format('H:i:s');
        // return "{$start_date}  {$start_time}";
        return Carbon::parse($this->start_date . $this->start_time)->diffForHumans($now, ['syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW]);
    }

    public function getScheduleTimeeDifferenceAttribute()
    {
        $created = new Carbon($this->start_date);
        $now = Carbon::now();
        $difference = ($created->diff($now)->days < 1)
            ? ''
            : $created->diffForHumans(['syntax' => CarbonInterface::DIFF_ABSOLUTE]);

        return $difference;
    }

    public function getScheduleDateDifferenceAttribute()
    {
        $created = new Carbon($this->start_date);
        $now = Carbon::now();
        $difference = ($created->diff($now)->days < 1)
            ? ''
            : $created->diffForHumans(['syntax' => CarbonInterface::DIFF_ABSOLUTE]);

        return $difference;
    }

    public function cart_sched()
    {
        return $this->belongsTo(Cart::class, 'orca_classes_id');
    }

    // public function getScheduleTimeDifferenceAttribute()
    // {
    //     return ($this->start_date->isPast()) ? Carbon::parse($this->start_date)->diffForHumans(['syntax' => CarbonInterface::DIFF_ABSOLUTE]) : '';
    // }
}

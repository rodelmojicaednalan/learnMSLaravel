<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveClassSchedule extends Model
{
    use HasFactory;

    protected $table = 'live_class_schedules';
    
    protected $appends = [
        // 'schedule_difference',
        'formatted_start_date',
        'formatted_start_time',
        'formatted_end_time',
        // 'schedule_date_difference',
        // 'schedule_date_difference',
    ];

    protected $fillable = [

        'class_id',
        'start_date',
        'end_date',
        'start_time',
        'end_time',

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

    public function classes(){

        return $this->hasMany(Classes::class, 'class_id');

    }

}

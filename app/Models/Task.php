<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project() {
        return $this->belongsTo('App\Models\Project');
    }

    public function hours($time) 
    {
        $hours = floor($time);

        return $hours; 
    }

    public function minutes($time) 
    {
        $minutes = round(($time - $this->hours($time)) * 60);

        return $minutes;
    }

    public function formattedTime($time)
    {
        if (!$time) 
            return $time;

        $formattedHour = sprintf('%2d:%02d', $this->hours($time), $this->minutes($time));
        return $formattedHour;
    }
}

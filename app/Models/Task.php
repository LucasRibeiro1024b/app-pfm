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

    public function consultant() {
        return $this->belongsTo('App\Models\User', 'user_id');
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

        $formattedHour = sprintf('%02d:%02d', $this->hours($time), $this->minutes($time));
        return $formattedHour;
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($task) {
    //         Receipt::create([
    //             'title' => $task->title,
    //             'description' => $task->title,
    //             'value' => $task->value,
    //             'end_date' => $task->project->end_date,
    //             'project_id' => $task->project->id,
    //             'client_id' => $task->project->client_id
    //         ]);
    //     });


    //     // static::deleted();

    //     // static::updated();
    // }
}

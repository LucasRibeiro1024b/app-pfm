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

    public function formattedHour($time) 
    {
        if (!$time) {
            return $time;
        }
        $hours = floor($time);

        // Calcula os minutos a partir da parte decimal
        $minutes = round(($time - $hours) * 60);

        // Formata para garantir que as horas e minutos tenham dois dígitos
        $formattedHour = sprintf('%2d:%02d', $hours, $minutes);

        return $formattedHour; 
    }
}

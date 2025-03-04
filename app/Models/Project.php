<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "projects";

    protected $guarded = [];
    
    public function client() 
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'project_id');
    }
    
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'project_id');
    }
}

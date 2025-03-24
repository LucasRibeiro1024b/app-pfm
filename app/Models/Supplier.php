<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function expenses() 
    {
        return $this->hasMany('App\Models\Expense');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

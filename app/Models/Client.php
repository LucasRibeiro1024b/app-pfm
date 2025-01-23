<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $guarded = [];  // tudo enviado pelo post pode ser editado

    public function projects() 
    {
        return $this->hasMany('App\Models\Project');
    }
}

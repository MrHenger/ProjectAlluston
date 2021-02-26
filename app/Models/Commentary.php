<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    use HasFactory;

    protected $fillable = ['comentary'];

    public function post() //Relacion con el modelo Post
    {
        return $this->belongsTo('App/Models/Post');
    }

    public function user() //Relacion con el modeo User
    {
        return $this->belongsTo('App/Models/Post');
    }
}

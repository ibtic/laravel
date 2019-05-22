<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model

{
    //

    protected $table='classroom';

    protected $fillable = [

        'title', 'image',

    ];

    public function students()

    {

        return $this->hasMany('App\Student', 'classroom_id', 'id');

    }
}

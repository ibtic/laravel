<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    
    use SoftDeletes;


    protected $table='student';

    protected $fillable = [


        'name', 'email', 'password','classroom_id',
    ];



    public function classroom(){   



       return $this->hasOne('App\Classroom', 'id', 'classroom_id'); 
         
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User;

class Student extends User
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

    public function getRememberToken()
    
    {

       return null; // not supported
    } 

    public function setRememberToken($value)

    {
  		// not supported
	} 

	public function getRememberTokenName()

	{
	  return null; // not supported
	}

}

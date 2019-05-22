<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classroom;

use App\Student;

use Illuminate\Support\Facades\Input;

class TestController extends Controller

{
    

    public function showClassroomList(){
     
        $classrooms =Classroom::all(); 

        //dd($classrooms);
        
        return view('classroom.add',['classrooms'=>$classrooms]);


    }

    public function showAddClassroom(){
          
          return view('classroom.add');

    }

    public function handleAddClassroom(){
          
      $data=Input::all();

      Classroom::create([

                  
         'title'=>$data['title'],
         'image'=>$data['photo']



      ]);  

      //return back();

      return redirect(route('showClassroomList'));

    }

    public function showAddStudent(){

        $classrooms =Classroom::all(); 

        return view('student.add',['classrooms'=>$classrooms]);

    }
    
    public function handleAddStudent(){
          
      $data=Input::all();

      Student::create([

                  
        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>bcrypt($data['password']),
        'classroom_id'=>$data['classroom_id'],



      ]);  

      

      return back();

      

    }

    public function showStudent($id){
        
        $student=Student::find($id);


        if($student){

           return view('student.view',['student'=>$student]);

        }else{

           return('erreur');
        }
        

        


    }




}

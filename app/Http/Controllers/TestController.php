<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Image;

use Auth;

use App\Classroom;

use App\Student;

use Carbon\Carbon;

use Validator;

use Session;

use Illuminate\Support\Facades\Input;

class TestController extends Controller

{
    

    public function showClassroomList(){

      
    $classrooms =Classroom::all(); 

    return view('classroom.add',['classrooms'=>$classrooms]);


    }

    public function showAddClassroom(){


          
          return view('classroom.add');

    }

    public function handleAddClassroom(){
          
      $data=Input::all();
      //dd($data);

      $photo = 'photo-' . str_random(5) . time() . '.' . $data['photo']->getClientOriginalExtension();

      $fullImagePath = public_path('storage/classrooms/' . $photo);

      Image::make($data['photo']->getRealPath())->save($fullImagePath);

      $photoPath = 'storage/classrooms/' . $photo;

      Classroom::create([

                  
         'title'=>$data['title'],
         'image'=>$photoPath,



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

      $rules =[
              
           'name'=>'required',
           'email'=>'required|email'


      ];

      $message=[

          'name.required'=>'le nom est obligatoire',
          'email.required'=>'l\'email est obligatoire',
          'email.email'=>'l\'email est invalide'
 
      ];

      $validation=validator::make($data,$rules,$message);

      if($validation->fails()){
           
           return redirect()->back()->withErrors($validation->errors());

      }

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

    public function showUpdateStudent($id){

        
        

        $id=decryptageID($id);

        $classrooms =Classroom::all();   
        $student=Student::find($id);


        if($student){

           return view('student.update',['student'=>$student,'classrooms'=>$classrooms]);

        }else{

           return('erreur');
        }
           
           

    }


    
   public function handleUpdateStudent($id){

      $student=Student::find($id);
      $data=Input::all();

      if($student){
         
      /*$student->name=$data["name"];
      $student->email=$data["email"];
      $student->classroom_id=$data["classroom_id"];
 
      $student->save();*/

      $s=DB::table("student")->where('id', '=', $id)->update([
           
          'name'=>$data["name"],    
          'email'=>$data["email"],
          'classroom_id'=>$data["classroom_id"] 


      ]);


       return redirect(route('showStudent',['id'=>$id]));

      }
       
      return back(); 


    }

    public function showStudentLogin(){

        
      return view('student.login');

       
    }

    public function handleStudentLogin(){

      $classrooms =Classroom::all();
      $data=Input::all();

      $cred=[

        'email'=>$data['email'],
        'password'=>$data['password']

      ];  

      if(Auth::attempt($cred)){

        Session::put([

           'msg'=>'success Login',

        ]); 

        return redirect(route('welcome'));


      }

           
          return back();

    }

    public function handleStudentLogout() {


       Auth::logout();

       return redirect(route('showClassroomList'));

      
    }

    public function showSearchName(){
       
       return view('student.search');

    }

    public function handleSearchName(){
       
      $data=Input::all();

      $search=Student::Where('name', 'like', '%' . $data['name'] . '%')->get();

      dd($search);

    }

    public function showSearchDate(){
       
       return view('student.search');

    }

    public function handleSearchDate(){
       
      $data=Input::all();

     //dd($data['firstdate']);

    $firstdate=Carbon::createFromFormat("Y-m-d",$data['firstdate']);

    $seconddate=Carbon::createFromFormat("Y-m-d",$data['lastdate']);

    $search=Student::whereBetween('created_at', array($firstdate, $seconddate))->get();

    dd($search);

    }



}

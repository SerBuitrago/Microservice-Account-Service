<?php

namespace App\Http\Controllers;

use Hask;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Student::all()
        ]);
        
    }

    // -- HU 3
    public function store(Request $request)
    {

        $this->validateCreate($request);

        //CREAMOS EL ESTUDIANTE

        $student = new Student();

        $student->age = $request->input('age');
        $student->code = $request->input('code');
        $student->name = $request->input('name');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->semester = $request->input('semester');
        $student->last_name = $request->input('last_name');
        $student->university_career = $request->input('university_career');


        //CREAMOS EL USUARIO

        $user = new User();

        $user->student_code = $request->input('code');
        $user->student_email = $request->input('email');
        $user->password = app('hash')->make($request->input('password'));

        
        try {
            $student->save();
        } catch (\PDOException  $e) {
            return response()->json($e);
        }

        try {
            $user->save();
            return response()->json([
                'response' =>true,
                'message' => 'user create'
            ]);
           
         

        } catch (\PDOException  $e) {
            return response()->json($e);
        }

    }


    protected function validateCreate(Request $request){

        $this->validate($request, [

            'age' => 'required|integer',
            'code' => 'required|integer|unique:students',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:students',
            'address' => 'required',
            'semester' => 'required',
            'last_name' => 'required',
            'university_career' => 'required',
            'password' => 'required'

        ]);

   }

   // -- HU 4
   public function storeAdmin(Request $request)
   {

        $this->validateCreateAdmin($request);

        //CREAMOS EL ESTUDIANTE

        $student = new Student();

        $student->age = $request->input('age');
        $student->code = $request->input('code');
        $student->name = $request->input('name');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->semester = $request->input('semester');
        $student->last_name = $request->input('last_name');
        $student->university_career = $request->input('university_career');


        //CREAMOS EL USUARIO

        $user = new User();

        $user->student_code = $request->input('code');
        $user->student_email = $request->input('email');
        $user->password = app('hash')->make($request->input('password'));


        //CAPTURAR ROLE

        $role = $request->input('role');
        $user->assignRole($role);

        
        try {
            $student->save();
        } catch (\PDOException  $e) {
            return response()->json($e);
        }

        try {
            $user->save();
            return response()->json([
                'response' =>true,
                'message' => 'user create'
            ]);
        
            

        } catch (\PDOException  $e) {
            return response()->json($e);
        }

   }


   protected function validateCreateAdmin(Request $request){

    $this->validate($request, [

        'age' => 'required|integer',
        'code' => 'required|integer|unique:students',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:students',
        'address' => 'required',
        'semester' => 'required',
        'last_name' => 'required',
        'university_career' => 'required',
        'password' => 'required',
        'role' => 'required'

    ]);

}



    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}

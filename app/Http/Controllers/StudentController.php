<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Hask;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Student::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                'res' =>true,
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

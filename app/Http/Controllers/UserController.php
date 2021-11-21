<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Laravel\Socialite\Facades\Socialite;



class UserController extends Controller
{
    
    // -- HU 1
    public function login(Request $request){
        $this->validateLogin($request);
        return $this->sendLoginResponse($request);
    }

    protected function validateLogin(Request $request){

        $this->validate($request,[
            'student_code' => 'required|integer',
            'password' => 'required',
        ]);

    }

    public function sendLoginResponse(Request $request){

        $user = User::where('student_code',$request['student_code'])->first();

        if(!is_null($user) && Hash::check( $request['password'] , $user->password )){
            
            $user->api_token = Str::random(150);
            $user->save();
            return response()->json([
                'response' => true,
                'token'=> $user->api_token,
                'message' => 'Welcome'
            ]);
        }else{
            return response()->json([
                'response' => false,
                'message' => '¡Los datos ingresados son incorrectos!'
            ]);
        }     

    }

    // -- HU 2
    public function redirectToProvider()
    {
       return Socialite::driver('google')->stateless()->redirect();
    }


    public function handleProviderCallback(Request $request)
    {
        try{
            $data = Socialite::driver('google')->stateless()->user();
            $user = User::where('student_email', $data['email'] )->first();

            $user->api_token = Str::random(150);
            $user->save();

            return response()->json([
                'response' => true,
                'token'=> $user->api_token,
                'message' => 'Welcome'
            ]);
        } catch (PDOException $e) {
            return response()->json([
                'response' => false,
                'message' => '¡Los datos no estan regsitrados!'
            ]);
        }

    }


    public function logout(){

        $user = auth()->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'response' => true,
            'message' => 'Good Bye!'
        ]);
    }


    public function assigRol(Request $request){

        $user = User::where('student_code', $request['code'] )->first();
        //return response()->json($user);
        $user->assignRole('Admin');
        return response()->json([
            'response' => true,
            'message' => 'Assigned role'
        ]);
    }

    // -- HU 5
    public function show(Request $request){
        $user = User::find($request->id);
        if(!empty($user)){
            return response()->json([
                'response' => true,
                'message' =>  $user
            ]);
        }else{
            return response()->json([
                'response' => false,
                'message' =>  $user
            ]);
        }
        
    }

    public function editAdmin(Request $request){
        $user = User::find($request->id)->student;

        if(empty($user)){
            return response()->json([
                'response' => false,
                'message' =>  "User no register!"
            ]);
        }else{
            $user->name = $request['name'];
            $user->last_name =  $request['last_name'];
           // $user->code = 
            /*
            $user->last_name
            $user->address
            $user->age
            $user->phone
            $user->email
            $user->semester
            $user->university_career*/

            $user->save();



            return response()->json([
                'response' => true,
                'message' =>  'User edited'
            ]);
        }


    }




    
}

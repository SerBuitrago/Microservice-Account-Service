<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                'api_token'=> $user->api_token,
                'message' => 'Welcome'
            ]);
        }else{
            return response()->json([
                'response' => false,
                'message' => '¡data incorrect!'
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
                'message' => 'welcome'
            ]);
        } catch (PDOException $e) {
            return response()->json([
                'response' => false,
                'message' => '¡data incorrect!'
            ]);
        }

    }


    public function logout(){

        $user = auth()->user();
        return response()->json([
            'response' => true,
            'message' =>  'Good Bye!'
        ]);
    }


    // -- HU 5
    public function show(Request $request){
        $user = User::where('student_code', $request->code)->get();
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

    // -- HU 6
    public function editAdmin(Request $request){

        $this->validateditAdmin($request);

        $user = User::find($request->id);


        if(empty($user)){
            return response()->json([
                'response' => false,
                'message' =>  "User no register!"
            ]);
        }else{

            try {

                $user->student_email = $request['email'];
                $user->student->name = $request['name'];
                $user->student->last_name =  $request['last_name'];
                $user->student->address = $request['address'];
                $user->student->age = $request['age'];
                $user->student->phone = $request['phone'];
                $user->student->email = $request['email'];
                $user->student->semester = $request['semester'];
                $user->student->university_career = $request['university_career'];

                $user->save();



                return response()->json([
                    'response' => true,
                    'message' =>  'User edited'
                ]);
                
            } catch (\Throwable $th) {

                return response()->json([
                    'response' => false,
                    'message' =>  'Data incomplet'
                ]);

            }
            
        }


    }

    protected function validateditAdmin(Request $request){

        $this->validate($request, [

            'age' => 'required|integer',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:students',
            'address' => 'required',
            'semester' => 'required',
            'last_name' => 'required',
            'university_career' => 'required'

        ]);

   }


   // -- HU 7
   public function deleteAdmin(Request $request){


    $user = User::find($request->id);

    if(empty($user)){
        return response()->json([
            'response' => false,
            'message' =>  "User no register!"
        ]);
    }

    try {
        $user->delete();
        $user->student->delete();
        return response()->json([
            'response' => true,
            'message' =>  'User delete'
        ]);
            
    } catch (\Throwable $th) {

        return response()->json([
            'response' => false,
            'message' =>  'Error'
        ]);

    }
        
    


    }

    public function token(){

        $user = auth()->user();


        if(!empty($user)){
            return response()->json([
                'response' => true,
                'token' => $user->api_token
            ]);
        }else{
            return response()->json([
                'response' => false,
                'token' => "No user api_token"
            ]);
        }

        
    }




    
}

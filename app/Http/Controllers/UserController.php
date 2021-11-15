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
                'res' => true,
                'token'=> $user->api_token,
                'message' => 'Welcome'
            ]);
        }else{
            return response()->json([
                'res' => false,
                'message' => '¡Los datos ingresados son incorrectos!'
            ]);
        }     

    }

    public function redirectToProvider()
    {
       return Socialite::driver('google')->stateless()->redirect();
    }


    public function handleProviderCallback(Request $request)
    {
        try{
            $user = Socialite::driver('google')->stateless()->user();
            return response()->json([
                $user
            ]);
           
        } catch (\Exception $e) {
            return response()->json([
                'res' => false,
                'message' => $e->Message()
            ]);
        }

    }


    public function logout(){

        $user = auth()->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'res' => true,
            'message' => 'Good Bye!'
        ]);
    }

    
}

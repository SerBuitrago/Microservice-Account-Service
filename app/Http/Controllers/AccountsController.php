<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;



class AccountsController extends Controller
{
    public function sendPassword(Request $request)
    {

        $user = DB::table('users')->where('student_email', '=', $request->email)->first();

        if(empty($user)) {
            return response()->json([
                'response' =>false,
                'message' => 'User does not exist'
            ]);
        }

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return response()->json([
                'response' => true,
                'email' => $request->email,
                'token' => $tokenData->token
            ]);
        } else {
            return response()->json([
                'response' => false,
                'message' => 'A Network Error occurred. Please try again.'
            ]);
        }

    }

    private function sendResetEmail($email, $token)
    {
        return true;
    }


    public function resetPassword(Request $request)
    {
        
        $this->validateResetPassword($request);

        $password = $request->password;

        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();

        if (!$tokenData) {
            return response()->json([
                'response' => false,
                'message' => 'A Network Error occurred. Please try again.'
            ]);
        }

        $user = User::where('student_email', $tokenData->email)->first();

        if (!$user){
            return response()->json([
                'response' => false,
                'message' => 'Email not found'
            ]);
        }
        $user->password = app('hash')->make($password);
        $user->update(); 

        try {
            DB::table('password_resets')->where('email', $user->student_email)
            ->delete();
    
            return response()->json([
                'response' => true,
                'message' => 'Password update'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'response' => true,
                'message' => 'Error occurred. Please try again.'
            ]);
        }
       


    }


    protected function validateResetPassword(Request $request){

        $this->validate($request, [
    
            'email' => 'required|email|exists:users,student_email',
            'password' => 'required|confirmed',
            'token' => 'required'

        ]);
    
        }

}

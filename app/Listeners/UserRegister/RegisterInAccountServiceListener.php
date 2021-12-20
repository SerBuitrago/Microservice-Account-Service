<?php

namespace App\Listeners\UserRegister;

use App\Events\UserRegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterInAccountServiceListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegisterEvent  $event
     * @return void
     */
    public function handle(UserRegisterEvent $event)
    {
        $data = $event->getData();


        $this->storeUser($data);
    }

    private function storeUser($data)
    {
        $student = new \App\Models\Student();


        $student->age = $data['age'];
        $student->code = $data['code'];
        $student->name = $data['name'];
        $student->phone = $data['phone'];
        $student->email = $data['email'];
        $student->address = $data['address'];
        $student->semester = $data['semester'];
        $student->last_name = $data['last_name'];
        $student->university_career = $data['university_career'];


        $user = new \App\Models\User();

        $user->student_code = $data[('code')];
        $user->student_email = $data[('email')];
        $user->password = app('hash')->make($data['password']);

        try {
            $user->assignRole('Student');
            $student->save();
        } catch (\PDOException  $e) {
            return response()->json($e);
        }

        try {
            $user->save();
            return response()->json([
                'response' => true,
                'message' => 'Usuario creado'
            ]);
        } catch (\PDOException  $e) {
            return response()->json($e);
        }
    }
}

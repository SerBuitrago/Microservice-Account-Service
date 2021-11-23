<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{

    // -- HU 11
    public function store(Request $request)
    {
        
        //return response()->json($user);$user = User::where('student_code', $request['code'] )->first();$user->assignRole('Admin');
        $this->validateStore($request);

        try {

            $role = Role::create(['name' =>  $request['name']]);
            return response()->json([
                'response' => true,
                'message' => 'create role'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'response' => false,
                'message' => $e->getMessage()
            ]);
        }
        
    }

    protected function validateStore(Request $request){

        $this->validate($request, [
            'name' => 'required|unique:roles',
        ]);

    }


    // -- HU 12
    public function show(Request $request)
    {
        $this->validateShow($request);
        $role = Role::find($request->role_id);

        if(empty($role)){

            return response()->json([
                'response' => false,
                'message' => 'role not found'
            ]);

        }

        return response()->json([
            'response' => true,
            'message' => $role
        ]);

    }

    protected function validateShow(Request $request){

        $this->validate($request, [
            'role_id' => 'required',
        ]);

    }


    // -- HU 13
    public function edit(Request $request)
    {
        $this->validateEdit($request);
        $role = Role::find($request->role_id);

        if(empty($role)){

            return response()->json([
                'response' => false,
                'message' => 'role not found'
            ]);

        }

        try {

            $role->name = $request->name;
            $role->guard_name = $request->guard_name;

            $role->update();

            return response()->json([
                'response' => true,
                'message' => 'role update'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'response' => false,
                'message' => $e->getMessage()
            ]);
        }



    }


    protected function validateEdit(Request $request){
        $this->validate($request, [
            'role_id' => 'required',
            'name' => 'required',
            'guard_name' => 'required'
        ]);
    }

    // -- HU 16
    public function index()
    {
        return response()->json([
            'response' => true, 
            'message' => Role::all()
        ]);
    }


    // -- HU 17
    public function destroy(Request $request)
    {
        $role = Role::find($request->id);

        if(empty($role)){
            return response()->json([
                'response' => false,
                'message' =>  "Role no register!"
            ]);
        }

    try {

        $role->delete();
        return response()->json([
            'response' => true,
            'message' =>  'Rol delete'
        ]);
                
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'response' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
}

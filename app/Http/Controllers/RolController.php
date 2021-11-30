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

    // -- HU 14
    public function assigRol(Request $request)
    {
        
        $this->validateassigRol($request);

        $role = Role::where('name', $request['name'] )->first();
        $perm = Permission::where('name', $request['name_permission'] )->first();

        if(empty($role)){
            return response()->json([
                'response' => false,
                'message' => 'Role not found'
            ]);
        }

        if(empty($perm)){
            return response()->json([
                'response' => false,
                'message' => 'Permission not found'
            ]);
        }

        try {

        $role->givePermissionTo($request['name_permission']);

            return response()->json([
                'response' => true,
                'message' => 'permission asigne a rol'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'response' => false,
                'message' => $e->getMessage()
            ]);
        }
        
    }


    protected function validateassigRol(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'name_permission' => 'required',
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

    public function deleteRolPerm(Request $request)
    {
        $role = Role::where('name', $request['name'] )->first();
        $perm = Permission::where('name', $request['name_permission'] )->first();

        if(empty($role)){
            return response()->json([
                'response' => false,
                'message' => 'Role not found'
            ]);
        }

        if(empty($perm)){
            return response()->json([
                'response' => false,
                'message' => 'Permission not found'
            ]);
        }

        try {

        $role->revokePermissionTo($request['name_permission']);

            return response()->json([
                'response' => true,
                'message' => 'permission quit a rol'
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'response' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}

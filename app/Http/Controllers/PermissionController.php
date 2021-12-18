<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

     // -- HU 18
    public function store(Request $request)
    {
        
        $this->validateStore($request);

        try {

            $perms = Permission::create(['name' =>  $request['name']]);
            return response()->json([
                'response' => true,
                'message' => 'create permission'
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
            'name' => 'required|unique:permissions',
        ]);

    }

    // -- HU 12
    public function show(Request $request)
    {
        $this->validateShow($request);
        $perms = Permission::find($request->id);

        if(empty($perms)){

            return response()->json([
                'response' => false,
                'message' => 'Permission not found'
            ]);

        }

        return response()->json([
            'response' => true,
            'message' => $perms
        ]);

    }

    protected function validateShow(Request $request){

        $this->validate($request, [
            'id' => 'required',
        ]);

    }


    // -- HU 20
    public function edit(Request $request)
    {
        $this->validateEdit($request);
        $perms = Permission::find($request->id);

        if(empty($perms)){

            return response()->json([
                'response' => false,
                'message' => 'Permission not found'
            ]);

        }

        try {

            $perms->name = $request->name;
            $perms->guard_name = $request->guard_name;

            $perms->update();

            return response()->json([
                'response' => true,
                'message' => 'Permission update'
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
            'id' => 'required',
            'name' => 'required',
            'guard_name' => 'required'
        ]);
    }


    // -- HU 21
    public function index()
    {
        return response()->json([
            'response' => true, 
            'message' => Permission::all()
        ]);
    }

    public function indexPost(Request $request)
    {
        $this->validateindexPost($request);
        return response()->json([
            'response' => true, 
            'message' => Permission::all()
        ]);
    }
    
    protected function validateindexPost(Request $request){

        $this->validate($request, [
            'api_token' => 'required',
        ]);

    }

    
    // -- HU 22
    public function destroy(Request $request)
    {
        $perms = Permission::find($request->id);

        if(empty($perms)){
            return response()->json([
                'response' => false,
                'message' =>  "Permission no register!"
            ]);
        }

    try {

        $perms->delete();
        return response()->json([
            'response' => true,
            'message' =>  'Permission delete'
        ]);
                
        } catch (\Illuminate\Database\QueryException $e) {

            return response()->json([
                'response' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
}

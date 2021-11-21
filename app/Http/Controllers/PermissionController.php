<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function index()
    {
        return response()->json([
            'response' => true, 
            'message' => Permission::all()
        ]);
    }


    public function create()
    {
        //
    }

    // -- HU 17
    public function store(Request $request)
    {
        
        //return response()->json($user);$user = User::where('student_code', $request['code'] )->first();$user->assignRole('Admin');
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

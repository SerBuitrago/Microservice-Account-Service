<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$router->get('/', function () use ($router) {
    //$role = Role::create(['name' => 'Admin']);
    //$permission = Permission::create(['name' => 'ver data'])->assignRole($role);

    $user = User::create([
        'name' => 'Admin',
        'student_email' => 'gabriel@gmail.com',
        'password' => '123'
    ])->assignRole('Admin');
   
    return $router->app->version();
});

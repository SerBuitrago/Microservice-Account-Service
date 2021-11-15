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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

$router->get('/', function () use ($router) {
    /*$role = Role::create(['name' => 'Admin']);
    //$permission = Permission::create(['name' => 'ver data'])->assignRole($role);

    $user = User::create([
        'name' => 'Admin',
        'student_email' => 'gabriel@gmail.com',
        'password' => '123'
    ])->assignRole('Admin');
   
    return $router->app->version();*/
});

//---------------------------------------------------------------------------//

// ---ORDEN--- //
/* ---USER--- */
/* ---STUDENT--- */



//METODOS DE USER 

//---- Login ----
$router->post('/login', 'UserController@login');
$router->get('/logout', 'UserController@logout');
//---- Login con Google ----
$router->get('login/google', 'UserController@redirectToProvider');
$router->get('login/google/callback', 'UserController@handleProviderCallback');



$router->group(['middleware' => 'auth'], function () use ($router) {
 
});



//METODOS DE STUDENT 

//---- Listar ----
$router->get('/students', 'StudentController@index');
//---- Registrar ----
$router->post('/student/register', 'StudentController@store');



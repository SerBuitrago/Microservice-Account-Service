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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
//---- Asignar Rol ----
$router->post('/user/rol', 'UserController@assigRol');
//---- Editar Usuario ----
$router->post('/user/edit/{id}', 'UserController@show');



//METODOS DE STUDENT 

//---- Listar ----
$router->get('/students', 'StudentController@index');
//---- Registrar ----
$router->post('/student/register', 'StudentController@store');



//AUTENTICACION POR API_TOKEN

$router->group(['middleware' => 'auth'], function () use ($router) {
    
});



//PROTECCION DE RUTRAS POR ROLES

$router->group(['middleware' => ['role:Admin']], function () use ($router) {
    //---- REGISTRAR STUDENT ----
    $router->post('/student/admin/register', 'StudentController@storeAdmin');
    $router->post('/student/admin/edit/{id}', 'UserController@editAdmin');
});





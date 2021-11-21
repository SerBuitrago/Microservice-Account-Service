<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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


// RECUERDE QUE HABRÁ UNA SERIE DE RUTAS PARA LOS USUARIOS NO AUTENTICADOS, GUEST, QUE ESTARÁN PARA EL PÚBLICO- 


// si, por ahora mapear todo, luego middleware.Hay que verificarque todo sirva primero //


//METODOS DE STUDENT 

//---- Listar ----
$router->get('/students', 'StudentController@index');
//---- Registrar ----
$router->post('/student/register', 'StudentController@store');



//AUTENTICACION POR API_TOKEN

$router->group(['middleware' => 'auth'], function () use ($router) {
});



//PROTECCION DE RUTRAS POR ROLES

$router->post('/student/admin/register', 'StudentController@storeAdmin');
$router->post('/student/admin/edit/{id}', 'UserController@editAdmin');

$router->group(['middleware' => ['role:Admin'], 'prefix' => 'admin'], function () use ($router) {
    //---- REGISTRAR STUDENT ----
    
});


/**
 * APIGATEWAY MICROSERVICES 
 */

$router->get('/test', function () {
    //return response()->json(data: ['message' => 'Todo ok']);
});

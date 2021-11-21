<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

//---------------------------------------------------------------------------//

// ---ORDEN--- //
/* ---USER--- */
/* ---STUDENT--- */



// RECUERDE QUE HABRÁ UNA SERIE DE RUTAS PARA LOS USUARIOS NO AUTENTICADOS, GUEST, QUE ESTARÁN PARA EL PÚBLICO- 
// si, por ahora mapear todo, luego middleware.Hay que verificarque todo sirva primero //

/**
 * METODOS DE LOGEO
 */

//-----ACCIONES DE LOGIN

$router->post('/login', 'UserController@login');
$router->get('/logout', 'UserController@logout');
$router->get('login/google', 'UserController@redirectToProvider');
$router->get('login/google/callback', 'UserController@handleProviderCallback');

//-----RESET PASSWORD
$router->post('send/password', 'AccountsController@sendPassword');
$router->post('reset/password', 'AccountsController@resetPassword');






/**
 * METODOS DE USER
 */

//---- ACCIONES DE USUARIO
$router->post('/user/edit/{id}', 'UserController@show');




/**
 * AUTENTICACION POR API_TOKEN
 */


$router->get('/students', 'StudentController@index');
$router->post('/student/register', 'StudentController@store');


$router->group(['middleware' => 'auth'], function () use ($router) {

});


/**
 * PROTECCION DE RUTRAS POR ROLES
 */

//-----ACCIONES DE ESTUDIANTE

$router->post('/student/admin/register', 'StudentController@storeAdmin');
$router->post('/student/admin/edit/{id}', 'UserController@editAdmin');
$router->post('/student/admin/delete/{id}', 'UserController@deleteAdmin');


$router->group(['middleware' => ['role:Admin'], 'prefix' => 'admin'], function () use ($router) {
   
});



//-----ACCIONES DE SUPER

$router->get('/rol/list', 'RolController@index');
$router->post('/rol/register', 'RolController@store');
$router->post('/rol/show/', 'RolController@show');
$router->post('/rol/update', 'RolController@edit');
$router->post('/rol/delete/{id}', 'RolController@destroy');


//-----ACCIONES DE SUPER

$router->get('/permission/list', 'PermissionController@index');
$router->post('/permission/register', 'PermissionController@store');


$router->group(['middleware' => ['role:Super'], 'prefix' => 'super'], function () use ($router) {
  
});













/**
 * APIGATEWAY MICROSERVICES 
 */

$router->get('/test', function () {
    //return response()->json(data: ['message' => 'Todo ok']);
});

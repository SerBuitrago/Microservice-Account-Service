<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

//---------------------------------------------------------------------------//

// ---ORDEN--- //
/* ---USER--- */
/* ---STUDENT--- */



// RECUERDE QUE HABRÁ UNA SERIE DE RUTAS PARA LOS USUARIOS NO AUTENTICADOS, GUEST, QUE ESTARÁN PARA EL PÚBLICO- 
// si, por ahora mapear todo, luego middleware.Hay que verificarque todo sirva primero //

$router->get('/', function(){});//-

/**
 * METODOS DE LOGEO
 */

//-----ACCIONES DE LOGIN

$router->post('/login', 'UserController@login');//-
$router->get('/logout', 'UserController@logout');//-
$router->get('login/google', 'UserController@redirectToProvider');//-
$router->get('login/google/callback', 'UserController@handleProviderCallback');//-

//-----RESET PASSWORD
$router->post('send/password', 'AccountsController@sendPassword');//-
$router->post('reset/password', 'AccountsController@resetPassword');//-




/**
 * METODOS DE USER
 */

$router->post('/student/register', 'StudentController@store');//-




/**
 * AUTENTICACION POR API_TOKEN
 */
$router->group(['middleware' => 'auth'], function () use ($router) {


    //---- ACCIONES DE USUARIO
    $router->get('/user/auth', 'UserController@token');//-
    $router->post('/user/show', 'UserController@show');//-


    //---- ACCIONES DE ESTUDIANTE
    $router->get('/students', 'StudentController@index');//-
    $router->post('/students', 'StudentController@indexPost');//-
    $router->post('/student/show', 'StudentController@show');//-
    
});




$router->group(['middleware' => ['role:Admin', 'auth']], function () use ($router) {

    /**
     * PROTECCION DE RUTRAS POR ROLES
     */

    //-----ACCIONES DE ESTUDIANTE
    $router->post('/student/admin/register', 'StudentController@storeAdmin');//-
    $router->post('/student/admin/edit/{id}', 'UserController@editAdmin');//-
    $router->post('/student/admin/delete/{id}', 'UserController@deleteAdmin');//-

});





$router->group(['middleware' => ['role:Super', 'auth']], function () use ($router) {
    
    //-----ACCIONES DE SUPER

    $router->get('/rol/list', 'RolController@index');
    $router->post('/rol/register', 'RolController@store');
    $router->post('/rol/show/', 'RolController@show');
    $router->post('/rol/update', 'RolController@edit');
    $router->post('/rol/delete/{id}', 'RolController@destroy');



    //-----ACCIONES DE SUPER

    $router->get('/permission/list', 'PermissionController@index');
    $router->post('/permission/register', 'PermissionController@store');
    $router->post('/permission/show/', 'PermissionController@show');
    $router->post('/permission/update', 'PermissionController@edit');
    $router->post('/permission/delete/{id}', 'PermissionController@destroy');


    
    // OTROS
    $router->post('/student/rol/add', 'UserController@aggRole');
    $router->post('/student/rol/delete', 'UserController@deleteRole');

});


$router->group(['middleware' => ['role:Super', 'auth']], function () use ($router) {
  
    


    $router->post('/permission/deleteRolPerm', 'RolController@deleteRolPerm');
    $router->post('/permission/aggRol', 'RolController@assigRol');

    
});














/**
 * APIGATEWAY MICROSERVICES 
 */

$router->get('/test', function () {
    //return response()->json(data: ['message' => 'Todo ok']);
});

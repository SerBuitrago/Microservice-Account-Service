<?php

use App\Http\Controllers\RolController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

//---------------------------------------------------------------------------//

// ---ORDEN--- //
/* ---USER--- */
/* ---STUDENT--- */



// RECUERDE QUE HABRÁ UNA SERIE DE RUTAS PARA LOS USUARIOS NO AUTENTICADOS, GUEST, QUE ESTARÁN PARA EL PÚBLICO- 
// si, por ahora mapear todo, luego middleware.Hay que verificarque todo sirva primero //

$router->get('/', function () {
    return 'hola';
});

/**
 * METODOS DE LOGEO
 */

//-----ACCIONES DE LOGIN

$router->post('/login', 'UserController@login'); //-
$router->get('/logout', 'UserController@logout'); //-
$router->get('login/google', 'UserController@redirectToProvider'); //-
$router->get('login/google/callback', 'UserController@handleProviderCallback'); //-

//-----RESET PASSWORD
$router->post('send/password', 'AccountsController@sendPassword'); //-
$router->post('reset/password', 'AccountsController@resetPassword'); //-


/**
 * METODOS DE USER
 */

$router->post('/student/register', 'StudentController@store'); //



$router->get('/studentsForMicroservices', 'StudentController@index'); //-


/**
 * AUTENTICACION POR API_TOKEN
 */

$router->get('user/showByToken/{token}', 'UserController@showByToken');
$router->group(['middleware' => 'auth'], function () use ($router) {


    //---- ACCIONES DE USUARIO
    $router->get('/user/auth', 'UserController@token'); //-
    $router->post('/user/show', 'UserController@show'); //-


    //---- ACCIONES DE ESTUDIANTE
    $router->get('/students', 'StudentController@index'); //-
    $router->post('/students', 'StudentController@indexPost'); //-
    $router->post('/student/show', 'StudentController@show'); //-

});


$router->group(['middleware' => ['role:Admin', 'auth']], function () use ($router) {

    /**
     * PROTECCION DE RUTRAS POR ROLES
     */

    //-----ACCIONES DE ESTUDIANTE
    $router->post('/student/admin/register', 'StudentController@storeAdmin'); //-
    $router->put('/student/admin/edit/{id}', 'UserController@editAdmin'); //-
    $router->delete('/student/admin/delete/{id}', 'UserController@deleteAdmin'); //-
});

$router->group(['middleware' => ['role:Super', 'auth']], function () use ($router) {
    //-----ACCIONES DE SUPER
    $router->get('/rol/list', 'RolController@index');
    $router->post('/rol/list', 'RolController@indexPost');
    $router->post('/rol/register', 'RolController@store');
    $router->post('/rol/show/', 'RolController@show');
    $router->put('/rol/update', 'RolController@edit');
    $router->delete('/rol/delete/{id}', 'RolController@destroy');

    $router->post('/rol/dataPerm/', 'RolController@PermisosRol');



    //-----ACCIONES DE SUPER
    $router->get('/permission/list', 'PermissionController@index');
    $router->post('/permission/list', 'PermissionController@indexPost');
    $router->post('/permission/register', 'PermissionController@store');
    $router->post('/permission/show/', 'PermissionController@show');
    $router->put('/permission/update', 'PermissionController@edit');
    $router->delete('/permission/delete/{id}', 'PermissionController@destroy');
});

//'role:Super',
$router->group(['middleware' => ['role:Super', 'auth']], function () use ($router) {

    $router->post('/permission/aggRol', 'RolController@assigRol');
    $router->delete('/permission/deleteRolPerm', 'RolController@deleteRolPerm');

    // OTROS
    $router->post('/student/rol/add', 'UserController@aggRole');
    $router->delete('/student/rol/delete', 'UserController@deleteRole');
});


/*
|--------------------------------------------------------------------------
| Api Gateway
|--------------------------------------------------------------------------
*/
/**
 * Notification
 */
$router->group(['prefix' => 'notification-service'], function () use ($router) {
    $router->get('users/{id}/notifications', 'ApiGateWay\NotificationGatewayController@showNotification');
    $router->post('users/notifications', 'ApiGateWay\NotificationGatewayController@storeNotification');
    $router->put('users/notifications', 'ApiGateWay\NotificationGatewayController@updateNotification');
    $router->delete('users/{id}/notifications', 'ApiGateWay\NotificationGatewayController@destroyNotification');
    $router->post('users', 'ApiGateWay\NotificationGatewayController@storeUser');
    $router->patch('users/checkNotification', 'ApiGateWay\NotificationGatewayController@readingNotificationsByUserId');

    $router->post('sendNotiToNumber', 'ApiGateWay\NotificationGatewayController@sendNotiToNumber');
    $router->post('sendMailAuditoria', 'ApiGateWay\NotificationGatewayController@sendMailAuditoria');
    $router->post('sendMailAsesoria', 'ApiGateWay\NotificationGatewayController@sendMailAsesoria');
});

/**
 * Audit
 */

// $router->group(['prefix' => 'audit-service'], function () use ($router) {
//     $router->get('/', ['uses' => 'AuditGatewayController@fetchReadAll']);
//     $router->get('/{id}', ['uses' => 'AuditGatewayController@fetchRead']);
//     $router->post('/', ['uses' => 'ApiGateWay/NotificationGatewayController@create']);
//     $router->put('/', ['uses' => 'ApiGateWay/NotificationGatewayController@update']);
//     $router->delete('/{id}', ['uses' => 'ApiGateWay/NotificationGatewayController@delete']);
// });

/**
 * Tutoring
 */
$router->group(['prefix' => 'tutoring-service'], function () use ($router) {
    $router->group(['prefix' => 'tema'], function () use ($router) {
        $router->get('list',  'ApiGateWay/TutoringGatewayController@fetchReadTemaAll');
        $router->get('{nombre}',  'ApiGateWay/TutoringGatewayController@fetchReadTemaNombre');
        $router->post('save',  'ApiGateWay/NotificationGatewayController@createTema');
        $router->put('/',  'ApiGateWay/NotificationGatewayController@updateTema');
        $router->delete('/{id}/{tema}',  'ApiGateWay/NotificationGatewayController@deleteTema');
    });
    $router->group(['prefix' => 'tutoria'], function () use ($router) {
        // $router->get('/{nombre}', 'ApiGateWay/TutoringGatewayController@fetchReadTutoriaNombre');
        // // $router->get('/notificacionesall',  'ApiGateWay/TutoringGatewayController@fetchReadTutoriaNotificacionesAll');
        // $router->get('/list',  'ApiGateWay/TutoringGatewayController@fetchReadTutoriaAll');
        // $router->get('/activas',  'ApiGateWay/TutoringGatewayController@fetchReadTutoriaActivasAll');
        // $router->get('/terminadas',  'ApiGateWay/TutoringGatewayController@fetchReadTutoriaTerminadasAll');
        // $router->get('/{id}/{idusuario}',  'ApiGateWay/TutoringGatewayController@fetchTutoriaInscribirse');
        // $router->post('/save',  'ApiGateWay/NotificationGatewayController@createTutoria');
        // $router->put('/',  'ApiGateWay/NotificationGatewayController@updateTutoria');
        // $router->delete('/{id}/{nombre}',  'ApiGateWay/NotificationGatewayController@deleteTutoria');
    });
    $router->group(['prefix' => 'usuario'], function () use ($router) {
        $router->post('/{id}/rol/{rol}',  'ApiGateWay/NotificationGatewayController@createRol');
    });
});

$router->group(['prefix' => 'knowledge-service'], function () use ($router) {
});

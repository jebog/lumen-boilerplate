<?php

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

$router->get('/', function () use ($router) {
    return [
        'name' => config('app.name'),
        'version' => 'dev-master',
    ];
});

$router->group([
    'prefix' => 'v1',
    'middleware' => [
        'check-accept-header',
        'auth',
        'throttle',
    ],
], function () use ($router) {

    $router->group([
        'namespace' => 'Backend',
        'as' => 'backend',
    ], function () use ($router) {

        $router->group([
            'prefix' => 'auth',
        ], function () use ($router) {
            include 'backend/auth/user.php';
            include 'backend/auth/role.php';
            include 'backend/auth/permission.php';
            include 'backend/auth/authorization.php';
        });
    });
});
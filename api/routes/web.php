<?php
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('users', ['uses' => 'UserController@showAllUsers']);
    $router->get('user/{id}', ['uses' => 'UserController@showUser']);
    $router->post('users', ['uses' => 'UserController@create']);
    $router->delete('user/{id}', ['uses' => 'UserController@delete']);
    $router->put('user/{id}', ['uses' => 'UserController@update']);

    $router->get('user/{id}/franchises', ['uses' => 'UserController@showUserAllFranchises']);

    $router->get('user/{id}/franchise/{fid}', ['uses' => 'UserController@showUserFranchise']);

    $router->get('user/{id}/franchise/{fid}/franchiseworkingdays', ['uses' => 'UserController@showUserFranchiseWorkingDays']);

    $router->get('user/{id}/franchise/{fid}/arenas', ['uses' => 'UserController@showUserFranchiseArenas']);
});

<?php

//Authorised
$router->group(['middleware' => 'auth'], function ($router) {
    //Poses
    $router->get('poses', 'PoseController@index');//admin
    $router->get('poses/pending', 'PoseController@getPendingPoses');//admin
    $router->delete('poses/{id}', 'PoseController@destroy');//admin
    $router->post('poses', 'PoseController@post');//user (for confirmation)
    $router->put('poses/{id}', 'PoseController@update');//admin
});

//Poses
$router->get('poses/{id}', 'PoseController@show');//all

//Sequence
$router->post('sequence/generate', 'SequenceController@generate');//all

//Authentication
$router->post('login', 'AuthenticationController@login');//all
$router->post('register', 'AuthenticationController@register');//all



<?php

//Authorised
$router->group(['middleware' => 'auth'], function ($router) {
    //Poses
    //should have admin rights
    $router->get('poses/pending', 'PoseController@getPendingPoses');
    $router->delete('poses/{id}', 'PoseController@destroy');
    $router->put('poses/{id}', 'PoseController@update');
    //any user
    $router->get('poses/search', 'PoseController@search');
    $router->get('poses', 'PoseController@index');
    $router->post('poses', 'PoseController@post');
    $router->get('poses/{id}', 'PoseController@show');
});

//Sequence
$router->get('sequence/generate', 'SequenceController@generate');

//Authentication
$router->post('login', 'AuthenticationController@login');
$router->post('register', 'AuthenticationController@register');

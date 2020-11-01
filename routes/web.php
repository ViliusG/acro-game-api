<?php

$router->get('poses', 'PoseController@index');
$router->get('poses/{id}', 'PoseController@show');
$router->delete('poses/{id}', 'PoseController@destroy');
$router->post('poses', 'PoseController@post');
$router->put('poses/{id}', 'PoseController@update');


/**
 * TODO
 * CRUD for positions
 * Endpoint to fetch positions by difficulty
 */

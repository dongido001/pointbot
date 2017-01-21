<?php

// -------------------------------------------------
// Define your middlewares here.
// -------------------------------------------------

$router->middleware('auth', App\Http\Middleware\Authenticate::class);


// -------------------------------------------------
// Define your routes here.
// -------------------------------------------------

$router->get('/', 'HomeController@index');

$router->get('/points/add', 'PointController@add');
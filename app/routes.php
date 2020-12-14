<?php

use framework\Tools\View;
use framework\Tools\Request;
use framework\Routing\Routes;

/*
|--------------------------------------------------------------------------
| Routes - Enter your routes below
|--------------------------------------------------------------------------
*/

Routes::add('/', function ()
{
  return View::get('myname', [
    'name' => Request::fetchGET('names', 'dude')
  ]);
});

Routes::add('/test1/{number}', function ($number)
{
  return "My favorite number is $number.";
});

Routes::add('/api', function ()
{
  return [
    'success' => true,
    'data' => [],
  ];
});

Routes::add('/test2/{name}', function ($name)
{
  return View::get('myname', [
    'name' => $name
  ]);
});

Routes::add('/test3', function ()
{
  $userId = Request::fetchGET('userId');

  return "Standard query parameter: $userId";
});

Routes::add('/product', 'ProductController@show');

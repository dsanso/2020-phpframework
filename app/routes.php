<?php

use framework\Routing\Routes;
use framework\Tools\Request;

/*
|--------------------------------------------------------------------------
| Routes - Enter your routes below
|--------------------------------------------------------------------------
*/

Routes::add('/', function ()
{
  return view("myname", [
    'name' => Request::fetchGET('names', 'dude')
  ]);
});

Routes::add("/test1/{number}", function ($number)
{
  return "My favorite number is $number.";
});

Routes::add("/test2/{name}", function ($name)
{
  return view('myname', [
    'name' => $name
  ]);
});

Routes::add("/test3", function ()
{
  $userId = Request::fetchGET('userId');

  return "Standard query parameter: $userId";
});

Routes::add("/test4/{dude}", 'ProductController@show');

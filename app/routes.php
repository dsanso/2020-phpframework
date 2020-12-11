<?php

use logic\View;
use logic\Routing\Routes;
use logic\Request;

/*
|--------------------------------------------------------------------------
| Routes - Enter your routes below
|--------------------------------------------------------------------------
*/

Routes::add('/', function ()
{
  return view("myname");
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
  $userId = Request::getData('userId');

  return "Standard query parameter: $userId";
});

Routes::add("/test4/{dude}", 'ProductController@show');

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
  return View::get('home', [
    'name' => 'dsanso'
  ]);
});

Routes::add('/item/edit/{id}', function ($id)
{
  return "You are editing item with the id: $id.";
});

Routes::add('/api', function ()
{
  return [
    'success' => true,
    'data' => [],
  ];
});

Routes::add('/standard/get/query', function ()
{
  $username = Request::fetchGET('username');

  return "Standard get query parameter: $username";
});

Routes::add('/products', 'ProductController@show');

Routes::add('/products/add', 'ProductController@add');

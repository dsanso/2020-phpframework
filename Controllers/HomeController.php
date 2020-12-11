<?php

namespace Controllers;

use \logic\View;

class HomeController
{
  public function __construct()
  {
    new View('home', [
      'name' => "John"
    ]);
    // new View('home');
  }
}

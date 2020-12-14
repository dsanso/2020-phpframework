<?php

namespace framework;

use framework\Tools\Request;
use framework\Routing\Router;
use framework\Tools\Controller;
use framework\Tools\View;

class Framework
{
  public static function start()
  {
    Request::init();

    $route = Router::getRoute();

    if ($route != null)
    {
      Controller::execute($route);
    }
    else
    {
      http_response_code(404);
      echo View::get(404);
    }
  }
}

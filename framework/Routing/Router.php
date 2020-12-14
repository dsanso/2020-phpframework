<?php

namespace framework\Routing;

use framework\Tools\Request;

class Router
{
  public static function getRoute(): ?Route
  {
    $uri_array = Request::getPathArray();

    $routes = Routes::list();

    foreach ($routes as $route)
    {
      $route_uri = $route->getURI();

      $route_uri_array = explode('/', $route_uri);

      if (count($route_uri_array) != count($uri_array))
        continue;

      for ($i = 0; $i < count($uri_array); $i++)
      {
        if ($route_uri_array[$i] == $uri_array[$i])
          continue;

        if (preg_match('/^{[^{}]+}$/', $route_uri_array[$i]))
        {
          $route->addVariable($uri_array[$i]);

          continue;
        }

        continue 2;
      }

      return $route;
    }

    return null;
  }
}

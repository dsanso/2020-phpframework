<?php

namespace logic\Routing;

use logic\View;

class Router
{
  public static function process($uri)
  {
    $uri = trim($uri, '/');
    $uri = preg_replace('/\?.*$/', '', $uri);
    $uri_array = explode('/', $uri);
    $uri_count = count($uri_array);

    $list = Routes::list();

    foreach ($list as $route)
    {
      $route_uri = $route->getURI();

      $route_uri_array = explode('/', $route_uri);

      if (count($route_uri_array) != $uri_count)
        continue;

      $params = [];

      for ($i = 0; $i < $uri_count; $i++)
      {
        if ($route_uri_array[$i] == $uri_array[$i])
          continue;

        if (preg_match('/^{[^{}]+}$/', $route_uri_array[$i], $match))
        {
          array_push($params, $uri_array[$i]);

          continue;
        }

        continue 2;
      }

      $route_controller = $route->getController();

      if (is_string($route_controller))
      {
        if (preg_match('/^[^@]+@[^@]+$/', $route_controller))
        {
          $controllerArray = explode('@', $route_controller);

          $controllerName = 'app\\Controllers\\' . $controllerArray[0];

          $controllerClass = new $controllerName;
          $output = $controllerClass->{$controllerArray[1]}(...$params);

          if (is_string($output))
            echo $output;
        }
        else
        {
          echo "Framework Error: Invalid Route Controller! (Controller: $route_controller)";
        }

        return;
      }

      if ($route_controller instanceof \Closure)
      {
        $output = $route_controller(...$params);

        if (is_string($output))
          echo $output;

        return;
      }

      return;
    }

    http_response_code(404);

    echo view('404');
  }
}

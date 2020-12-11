<?php

namespace logic;

class Route
{
  private static array $routes = [];

  public static function get(string $route, $controller)
  {
    array_push(self::$routes, [
      'route' => $route,
      'controller' => $controller,
    ]);
  }

  public static function serve(string $requested_route)
  {
    self::load();

    foreach (self::$routes as $item)
    {
      if ($item['route'] == $requested_route)
      {
        $controller = $item['controller'];
        break;
      }
    }

    if (is_string($controller))
    {
      $controllerName = '\\Controllers\\' . $controller . 'Controller';
      new $controllerName;
    }
  }

  public static function load()
  {
    require_once "../routes/web.php";
  }
}

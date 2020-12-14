<?php

namespace framework\Routing;

use framework\Tools\Path;

class Routes
{
  /**
   * @var Route[]
   */
  private static array $list = [];

  /**
   * @return Route[]
   */
  public static function list(): array
  {
    require_once Path::getApp() . 'routes.php';

    return static::$list;
  }

  /**
   * @param string $uri
   * @param string|\Closure $controller
   */
  public static function add(string $uri, $controller)
  {
    $route = new Route();

    $route->setURI(trim($uri, '/'));
    $route->setController($controller);

    array_push(static::$list, $route);
  }
}

<?php

namespace logic\Routing;

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
    return self::$list;
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

    array_push(self::$list, $route);
  }
}

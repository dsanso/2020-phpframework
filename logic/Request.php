<?php

namespace logic;

class Request
{
  private static string $uri;
  private static string $method;
  private static array $data;

  public static function parse()
  {
    self::$uri = $_SERVER['REQUEST_URI'];
    self::$method = $_SERVER['REQUEST_METHOD'];
    self::$data = $_REQUEST;

    self::serve();
  }

  public static function serve()
  {
    Route::serve(self::$uri);
  }
}

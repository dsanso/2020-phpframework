<?php

namespace framework\Tools;

class Request
{
  private static string $path;
  private static string $query;

  public static function init(): void
  {
    $uri = $_SERVER['REQUEST_URI'];

    $path = preg_replace('/\?.*$/', '', $uri);
    $path = trim($path, '/');

    $query = preg_replace('/^.*?(\?|$)/', '', $uri);

    static::$path = $path;
    static::$query = $query;
  }

  public static function getPath(): string
  {
    return static::$path;
  }

  public static function getQuery(): string
  {
    return static::$query;
  }

  public static function getPathArray(): array
  {
    return explode('/', static::$path);
  }

  public static function fetchGET(string $key, $default = null)
  {
    return $_GET[$key] ?? $default;
  }

  public static function fetchPOST(string $key, $default = null)
  {
    return $_POST[$key] ?? $default;
  }

  public static function fetchREQUEST(string $key, $default = null)
  {
    return $_REQUEST[$key] ?? $default;
  }
}

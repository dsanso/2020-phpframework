<?php

namespace framework\Tools;

class Request
{
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

<?php

namespace logic;

class Request
{
  public static function getData(string $key, $default = null)
  {
    if (isset($_REQUEST[$key]))
      return $_REQUEST[$key];

    return $default;
  }
}

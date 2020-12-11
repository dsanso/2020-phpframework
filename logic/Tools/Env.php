<?php

namespace logic\Tools;

class Env
{
  public static function get(string $key, $default = null)
  {
    $file = file_get_contents(Path::getRoot() . '.env');
    $lines = explode(PHP_EOL, $file);

    foreach ($lines as $line)
    {
      if (explode("=", $line)[0] == $key)
        return explode("=", $line)[1];
    }

    return $default;
  }
}

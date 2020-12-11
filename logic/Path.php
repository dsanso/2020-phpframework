<?php

namespace logic;

class Path
{
  /**
   *
   * @var string
   */
  private static string $root;

  /**
   *
   * @param string $path
   * @return void
   */
  public static function setRoot(string $path)
  {
    self::$root = $path;
  }

  /**
   *
   * @return string
   */
  public static function getRoot()
  {
    return self::$root;
  }

  /**
   *
   * @return string
   */
  public static function getApp()
  {
    return self::$root . '/app/';
  }
}

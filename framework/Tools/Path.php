<?php

namespace framework\Tools;

class Path
{
  /**
   *
   * @return string
   */
  public static function getRoot()
  {
    return preg_replace('/public$/', '', $_SERVER['DOCUMENT_ROOT']);
  }

  /**
   *
   * @return string
   */
  public static function getApp()
  {
    return self::getRoot() . '/app/';
  }
}

<?php

namespace framework\Database;

use framework\Tools\Env;

class Database
{
  private static ?\PDO $conn = null;

  public static function connect(): \PDO
  {
    if (self::$conn != null)
      return self::$conn;

    $host = Env::get('DB_HOST');
    $port = Env::get('DB_PORT');
    $database = Env::get('DB_DATABASE');
    $username = Env::get('DB_USERNAME');
    $password = Env::get('DB_PASSWORD');

    return new \PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
  }

  public static function table(string $table)
  {
    return new QueryBuilder($table);
  }
}

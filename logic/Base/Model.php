<?php

namespace logic\Base;

use logic\Database;

class Model
{
  protected static string $tableName;

  public function save()
  {
    // $pdo = Database::connect();

    // $statement = $link->prepare('INSERT INTO :table_name (name, lastname, age) VALUES (:fname, :sname, :age)');

    // $statement->execute([
    //   'table_name' => self::$tableName,
    //   'fname' => 'Bob',
    //   'sname' => 'Desaunois',
    //   'age' => '18',
    // ]);
  }

  public static function all()
  {
    $pdo = Database::connect();

    $stmt = $pdo->prepare("SELECT * FROM products;");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, self::class);
    $stmt->execute();
    $obj = $stmt->fetch();

    return $obj;
  }
}

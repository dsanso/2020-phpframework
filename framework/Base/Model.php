<?php

namespace framework\Base;

use framework\Database\Database;

class Model
{
  /**
   * Define custom table name.
   *
   * @var string
   */
  protected static string $table;


  /**
   * Define custom primary key.
   *
   * @var string
   */
  protected static string $primarykey = 'id';

  /**
   * Get table name.
   *
   * @return string
   */
  public static function getTableName(): string
  {
    if (!isset(static::$table))
    {
      $reflect = new \ReflectionClass(static::class);
      $className = $reflect->getShortName();

      $table = strtolower($className);

      if (substr($table, -1) != 's')
        $table .= 's';

      static::$table = $table;
    }

    return static::$table;
  }

  /**
   * Load all rows from the database to the corresponding model.
   *
   * @return Model[]
   */
  public static function all(): array
  {
    return Database::table(static::getTableName())->useModel(static::class)->get();
  }

  /**
   * Save model instance to the database.
   *
   * @return void
   */
  public function save(): void
  {
    $objVars = get_object_vars($this);

    if (count($objVars) < 1)
      return;

    $pdo = Database::connect();

    $stmt = $pdo->prepare('REPLACE INTO ' . static::getTableName() . ' (' . implode(', ', array_keys($objVars)) . ') VALUES (:' . implode(', :', array_keys($objVars)) . ')');

    foreach ($objVars as $column => $value)
      $stmt->bindValue($column, $value);

    $stmt->execute();
  }
}

<?php

namespace framework\Database;

class QueryBuilder
{
  /**
   * Instance scope table name.
   *
   * @var string
   */
  private string $table;

  /**
   * Automatically generated sql query.
   *
   * @var string
   */
  private string $sql;

  /**
   * Values for the PDO statement.
   *
   * @var array
   */
  private array $values = [];

  /**
   * PDO fetch mode parameters.
   *
   * @var array
   */
  private array $fetchMode = [];

  /**
   * Constructor.
   *
   * @param string $table
   */
  public function __construct(string $table)
  {
    $this->table = $table;
    $this->sql = 'SELECT * FROM ' . $this->table;
  }

  /**
   * Get query results.
   *
   * @return array
   */
  public function get(int $pdo_fetch_style = \PDO::FETCH_ASSOC): array
  {
    $pdo = Database::connect();

    $stmt = $pdo->prepare($this->sql);

    if (count($this->fetchMode) > 0)
      $stmt->setFetchMode(...$this->fetchMode);

    if (count($this->values) > 0)
      foreach ($this->values as $index => $value)
        $stmt->bindParam($index + 1, $value);

    $stmt->execute();

    if (count($this->fetchMode) > 0)
      $results = $stmt->fetchAll();
    else
      $results = $stmt->fetchAll($pdo_fetch_style);

    return $results;
  }

  /**
   * Set a basic column where constraint.
   *
   * @param string $key
   * @param mixed $value
   * @return QueryBuilder
   */
  public function where(string $column, $value): QueryBuilder
  {
    array_push($this->values, $value);

    if (strpos($this->sql, " WHERE ") > -1)
    {
      $this->sql .= " AND `$column` = ?";
    }
    else
    {
      $this->sql .= " WHERE `$column` = ?";
    }

    return $this;
  }

  /**
   * Set PDO fetch mode parameters.
   *
   * @param string $key
   * @param mixed $value
   * @return QueryBuilder
   */
  public function setFetchMode($mode, $classNameObject): QueryBuilder
  {
    $this->fetchMode = [$mode, $classNameObject];

    return $this;
  }

  /**
   * Place results in a model.
   *
   * @param string $className
   * @return QueryBuilder
   */
  public function useModel(string $className): QueryBuilder
  {
    $this->fetchMode = [\PDO::FETCH_CLASS, $className];

    return $this;
  }
}

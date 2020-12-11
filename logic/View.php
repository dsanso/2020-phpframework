<?php

namespace logic;

class View
{

  public function __construct(string $viewName, array $params = [])
  {
    extract($params);

    require_once '../Views/' . $viewName . '.view.php';
  }
}

<?php

namespace framework\Routing;

class Route
{
  private string $uri;
  private $controller;
  private array $variables = [];

  public function getURI()
  {
    return $this->uri;
  }

  public function setURI(string $uri)
  {
    $this->uri = $uri;
  }

  public function getController()
  {
    return $this->controller;
  }

  public function setController($controller)
  {
    $this->controller = $controller;
  }

  public function getVariables()
  {
    return $this->variables;
  }

  public function addVariable(string $value)
  {
    array_push($this->variables, $value);
  }
}

<?php

namespace framework\Routing;

class Route
{
  private string $uri;
  private $controller;

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
}

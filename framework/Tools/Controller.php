<?php

namespace framework\Tools;

use framework\Routing\Route;

class Controller
{
  public static function execute(Route $route)
  {
    $controller = $route->getController();

    $output = null;

    if ($controller instanceof \Closure)
    {
      $output = $controller(...$route->getVariables());
    }

    if (is_string($controller))
    {
      $validControllerString = false;

      if (preg_match('/^[^@]+@[^@]+$/', $controller))
      {
        $controllerArray = explode('@', $controller);

        $controllerName = 'app\\Controllers\\' . $controllerArray[0];

        if (file_exists('../' . $controllerName . '.php'))
        {
          $controllerClass = new $controllerName;

          if (method_exists($controllerClass, $controllerArray[1]))
          {
            $output = $controllerClass->{$controllerArray[1]}(...$route->getVariables());
            $validControllerString = true;
          }
        }
      }

      if ($validControllerString == false)
      {
        echo "Framework Error: Invalid Route Controller! (Controller: $controller)";
        exit();
      }
    }

    if (is_array($output))
    {
      header('Content-Type: application/json; charset=UTF-8');
      echo json_encode($output);
    }
    elseif (is_string($output))
    {
      echo $output;
    }
  }
}

<?php

spl_autoload_register(function ($class_name)
{
  include '../' . $class_name . '.php';
});

require_once 'helpers.php';

require_once '../app/routes.php';

framework\Routing\Router::process($_SERVER['REQUEST_URI']);

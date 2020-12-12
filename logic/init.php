<?php

namespace logic;

use logic\Tools\Path;

spl_autoload_register(function ($class_name)
{
  include '../' . $class_name . '.php';
});

Path::setRoot(preg_replace("/public$/", '', $_SERVER['DOCUMENT_ROOT']));

require_once 'helpers.php';

require_once '../app/routes.php';

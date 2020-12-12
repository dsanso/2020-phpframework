<?php

namespace logic;

use app\Models\Product;
use logic\Tools\Path;

spl_autoload_register(function ($class_name)
{
  include '../' . $class_name . '.php';
});

Path::setRoot(preg_replace("/public$/", '', $_SERVER['DOCUMENT_ROOT']));

require_once 'helpers.php';

require_once '../app/routes.php';

$all = Product::all();

// $all[0]->price = 150;

// $all[0]->save();

print_r($all);

// $obj->name = "Dude";

// print_r($obj);

// echo Product::getTableName();

exit();

<?php

require_once "../logic/init.php";

use \logic\Routing\Router;

Router::process($_SERVER['REQUEST_URI']);

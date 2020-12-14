<?php

use framework\Framework;

spl_autoload_register(fn ($className) => include '../' . $className . '.php');

require_once 'helpers.php';

Framework::start();

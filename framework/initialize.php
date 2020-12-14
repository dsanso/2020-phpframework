<?php

use framework\Framework;

spl_autoload_register(fn ($className) => include '../' . $className . '.php');

Framework::start();

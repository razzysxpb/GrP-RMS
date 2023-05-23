<?php
require '../autoload.php';

$routes = new \woodlands\Routes();

$entryPoint = new \central\EntryPoint($routes);

$entryPoint->run();




<?php
require __DIR__ . "/vendor/autoload.php";

use Src\Routes\Contact;
use Src\Routes\Home;

$ContactRoutes = new Contact;
$HomeRoutes    = new Home;

$HomeRoutes->initRoutes();
$ContactRoutes->initRoutes();
<?php
namespace NhienLam\hw4;

require_once 'vendor/autoload.php';

use NhienLam\hw4\controllers\Controller as Controller;
use NhienLam\hw4\views\layouts\Layout as Layout;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

require_once("./src/controllers/Controller.php");
$controller = new Controller();
$controller->mapServerController();



<?php
namespace NhienLam\hw4\models\monolog;

require_once 'vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class Monolog {
    //create savedImage.log to record which images was just saved
    function savedImageLog(){
      // Create a log channel
      $logger = new Logger('my_logger');
      // Now add some handlers
      $logger->pushHandler(new StreamHandler('src/resources/image.log', Logger::DEBUG));
      $logger->pushHandler(new FirePHPHandler());
      // You can now use your logger
      $logger->info('Image was just saved ');
      // $logger->info('Image was just saved ', ['username' => 'Seldaek']);
    }
  }
?>
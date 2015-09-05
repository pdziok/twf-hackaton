<?php
use Symfony\Component\Debug\ExceptionHandler;

require_once ROOT_PATH .'/vendor/autoload.php';

$config = include ROOT_PATH .'/config/config.php';

$timezone = isset($config['timezone']) ? $config['timezone'] : 'UTC';
date_default_timezone_set($timezone);

$debug = isset($config['application_environment'])
    && $config['application_environment'] != 'production';

$app = new FunGame\Application([
    'config' => $config,
    'debug' => $debug,
]);

\Symfony\Component\Debug\ErrorHandler::register();
ExceptionHandler::register();

return $app;

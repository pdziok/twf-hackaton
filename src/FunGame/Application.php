<?php
namespace FunGame;

use Igorw\Silex\ConfigServiceProvider;
use MJanssen\Provider\RoutingServiceProvider;
use ServiceProvider\ControllersServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;

class Application extends \Silex\Application
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);

        $this->register(
            new ConfigServiceProvider(__DIR__ . '/../../config/routes.php')
        );

        $this->register(new MonologServiceProvider(), [
            'monolog.logfile' => sprintf(
                $this['config']['monolog']['monolog.logfile'],
                $this['config']['application_environment']
            ),
        ]);

        $this->register(new RoutingServiceProvider('fun-game'));

        $this->register(new ServiceControllerServiceProvider());
        $this->register(new ControllersServiceProvider());
    }
}

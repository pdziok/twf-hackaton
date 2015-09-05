<?php
/**
 * @author pdziok
 */
namespace ServiceProvider;

use FunGame\GameController;
use Silex\Application as SilexApplication;
use Silex\ServiceProviderInterface;
use FunGame\IndexController;

class ControllersServiceProvider implements ServiceProviderInterface
{
    private $controllers = [];

    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param SilexApplication $app
     */
    public function register(SilexApplication $app)
    {
        $this->registerIndexController($app);
        $this->registerGameController($app);
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     *
     * @param SilexApplication $app
     */
    public function boot(SilexApplication $app)
    {
    }

    /**
     * @param SilexApplication $app
     * @return array
     */
    private function registerIndexController(SilexApplication $app)
    {
        $serviceName = 'index.controller';
        $app[$serviceName] = $app->share(function () {
            return new IndexController();
        });
        $this->controllers[$serviceName] = IndexController::class;
    }


    /**
     * @param SilexApplication $app
     * @return array
     */
    private function registerGameController(SilexApplication $app)
    {
        $serviceName = 'game.controller';
        $app[$serviceName] = $app->share(function () {
            return new GameController();
        });
        $this->controllers[$serviceName] = GameController::class;
    }
}

<?php
/**
 * @author pdziok
 */
namespace FunGame;

use Silex\Application as SilexApplication;

class GameController
{
    public function getStartAction(SilexApplication $app)
    {
        return $app['twig']->render('game/start.twig');
    }

    public function getMainAction(SilexApplication $app)
    {
        return $app['twig']->render('game/main.twig');
    }

    public function getSummaryAction(SilexApplication $app)
    {
        return $app['twig']->render('game/summary.twig');
    }
}

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
}

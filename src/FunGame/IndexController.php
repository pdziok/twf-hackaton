<?php
/**
 * @author pdziok
 */
namespace FunGame;

use Silex\Application as SilexApplication;

class IndexController
{
    /**
     * List possible endpoints.
     *
     * @param SilexApplication $app
     */
    public function getIndexAction(SilexApplication $app)
    {
        return $app['twig']->render('home.twig');
    }
}

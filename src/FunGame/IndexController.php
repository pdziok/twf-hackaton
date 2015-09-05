<?php
/**
 * @author pdziok
 */
namespace FunGame;

use Silex\Application as SilexApplication;
use Silex\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController
{
    /**
     * List possible endpoints.
     *
     * @param SilexApplication $app
     * @return JsonResponse
     */
    public function getIndexAction(SilexApplication $app)
    {
        return $app['twig']->render('home.twig');
    }
}

<?php
/**
 * @author pdziok
 */
namespace FunGame;

use Silex\Application as SilexApplication;
use Symfony\Component\HttpFoundation\Request;

class GameController
{
    private $imageList = [
        ['id' => 1, 'href' =>'cards/1.jpg'],
        ['id' => 2, 'href' =>'cards/2.jpg'],
        ['id' => 3, 'href' =>'cards/3.jpg'],
        ['id' => 4, 'href' =>'cards/4.jpg'],
        ['id' => 5, 'href' =>'cards/5.jpg'],
        ['id' => 6, 'href' =>'cards/6.jpg'],
        ['id' => 7, 'href' =>'cards/7.jpg'],
        ['id' => 8, 'href' =>'cards/8.jpg'],
        ['id' => 9, 'href' =>'cards/9.jpg'],
        ['id' => 10, 'href' =>'cards/10.jpg'],
        ['id' => 11, 'href' =>'cards/11.jpg'],
        ['id' => 12, 'href' =>'cards/12.jpg'],
    ];

    public function getStartAction(Request $request, SilexApplication $app)
    {
        $amount = $request->get('number', 3);
        $cards = $this->getRandomCards($amount);

        return $app['twig']->render('game/start.twig', array_merge([
            'cards' => $cards
        ], $request->query->all()));
    }

    public function getMainAction(Request $request, SilexApplication $app)
    {
        $amount = $request->get('amount', 3);
        $cards = $this->getRandomCards($amount);

        return $app['twig']->render('game/main.twig', [
            'cards' => $cards
        ]);
    }

    public function getSummaryAction(SilexApplication $app)
    {
        return $app['twig']->render('game/summary.twig');
    }

    /**
     * @param $amount
     * @return array
     */
    private function getRandomCards($amount)
    {
        $stack = $this->imageList;

        $cards = [];
        for ($i = 0; $i < $amount; $i++) {
            $randomElement = rand(0, count($stack) - 1);
            $cards[] = array_splice($stack, $randomElement, 1)[0];
            $stack = array_values($stack);
        }

        return $cards;
    }
}

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
        ['id' => 1, 'href' => 'cards/1.jpg'],
        ['id' => 2, 'href' => 'cards/2.jpg'],
        ['id' => 3, 'href' => 'cards/3.jpg'],
        ['id' => 4, 'href' => 'cards/4.jpg'],
        ['id' => 5, 'href' => 'cards/5.jpg'],
        ['id' => 6, 'href' => 'cards/6.jpg'],
        ['id' => 7, 'href' => 'cards/7.jpg'],
        ['id' => 8, 'href' => 'cards/8.jpg'],
        ['id' => 9, 'href' => 'cards/9.jpg'],
        ['id' => 10, 'href' => 'cards/10.jpg'],
        ['id' => 11, 'href' => 'cards/11.jpg'],
        ['id' => 12, 'href' => 'cards/12.jpg'],
    ];

    public function getStartAction(Request $request, SilexApplication $app)
    {
        $amount = $request->get('number', 3);
        $cards = $this->getRandomCards($amount);

        return $app['twig']->render('game/start.twig', array_merge([
            'cards' => $cards
        ], $request->query->all()));
    }

    public function getPlayAction(Request $request, SilexApplication $app)
    {
        $amount = $request->get('amount', 20);
        $chosenIds = $request->get('chosen');

        $allCardsNumber = 20;
        $cardTypesNumber = 6;
        $chosenIds = [1, 2, 3];

        $cardIds = $this->getCardIdsToPlay($allCardsNumber, $cardTypesNumber, $chosenIds);
        $cards = $this->getCards($cardIds, $chosenIds);

        return $app['twig']->render('game/play.twig', [
            'cards' => $cards,
        ]);
    }

    public function getSummaryAction(SilexApplication $app)
    {
        return $app['twig']->render('game/summary.twig');
    }

    private function getCards(array $cardIds, array $chosenIds)
    {
        $cards = [];
        foreach ($this->imageList as $image) {
            foreach ($cardIds as $cardId) {
                if ($image['id'] == $cardId) {

                    if(in_array($image['id'], $chosenIds)){
                        $image['chosen'] = 1;
                    } else {
                        $image['chosen'] = 0;
                    }

                    $cards[] = $image;
                }
            }
        }

        shuffle($cards);

        return $cards;
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

    /**
     * @param integer $allCardsNumber  liczba kart na planszy
     * @param integer $cardTypesNumber liczba typow kart
     * @param array $chosenCards wybrane id kart
     * @return array
     */
    private function getCardIdsToPlay($allCardsNumber, $cardTypesNumber, array $chosenCards)
    {
        $oneCardNumber = floor($allCardsNumber / $cardTypesNumber);

        //cards to guess
        $toGuessCardIds = [];
        for ($i = 0; $i < $oneCardNumber; $i++) {
            $toGuessCardIds = array_merge($chosenCards, $toGuessCardIds);
        }

        //cards other than to guess
        $otherCardIds = array_diff($this->extractCardIds($this->imageList), $chosenCards);
        $otherCardIds = array_slice($otherCardIds, 0, $cardTypesNumber - count($chosenCards));

        //wrong cards
        $wrongCardIds = [];
        for ($i = 0; $i < $oneCardNumber; $i++) {
            $wrongCardIds = array_merge($otherCardIds, $wrongCardIds);
        }

        $cardsToAdd = $allCardsNumber - $oneCardNumber * count($chosenCards) - $oneCardNumber * count($otherCardIds);
        for ($i = 0; $i < $cardsToAdd; $i++) {
            $wrongCardIds[] = array_rand($otherCardIds, 1);
        }

        $allCardIds = array_merge($toGuessCardIds, $wrongCardIds);

        shuffle($allCardIds);

        return $allCardIds;
    }

    private function extractCardIds($cards)
    {
        $ids = [];
        foreach ($cards as $card) {
            $ids[] = $card['id'];
        }

        return $ids;
    }
}

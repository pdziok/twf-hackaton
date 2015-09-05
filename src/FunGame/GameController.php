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
        return $app['twig']->render('game/start.twig', [
            'cards' => [
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
                ['href' => 'http://ocdn.eu/images/pulscms/OTY7MDQsMCwxNywzMjAsMWMyOzA2LDMxNCwxYmM7MGMsMTQwYjFjZmU3ZjBhYzUyZWRjMDEwZDcwOTc4ZTg0YmUsMSwxLDYsMA__/1ab5be982c5d11f9091e92b759cd801e.jpg'],
            ]
        ]);
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

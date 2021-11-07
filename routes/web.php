<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('homepage',
    new Route('/', [
        'controller' => 'PageController',
        'method' => 'index'
    ])
);

$routes->add('add_comment',
    new Route('/comments', [
        'controller' => 'PageController',
        'method' => 'addComment'
    ], [], [], '', [], ['POST'])
);

$routes->add('comments',
    new Route('/comments', [
        'controller' => 'PageController',
        'method' => 'showComments'
    ])
);

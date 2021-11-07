<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('product',
    new Route('/product/{id}', [
        'controller' => 'ProductController',
        'method' => 'showAction'
    ], ['id' => '[0-9]+'])
);

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

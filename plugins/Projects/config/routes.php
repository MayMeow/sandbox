<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Projects',
    ['path' => '/projects'],
    function (RouteBuilder $routes) {
        //$routes->fallbacks(DashedRoute::class);
        $routes->connect('/:project/dependencies', 'Dependencies::index')->setPatterns(['project' => '\d+'])->setPass(['project']);
    }
);

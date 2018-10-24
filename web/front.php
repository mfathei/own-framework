<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/../src/app.php';
$container = include __DIR__ . '/../src/container.php';

function render_template(Request $request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();

    include sprintf(__DIR__ . '/../src/pages/%s.php', $_route);

    return new Response(ob_get_clean());
}

$container->setParameter('routes', $routes);
$response = $container->get('framework')->handle($request);

$response->send();

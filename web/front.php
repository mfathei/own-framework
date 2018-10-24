<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\EventDispatcher\EventDispatcher;

$request = Request::createFromGlobals();
$requestStack = new RequestStack();
$routes = include __DIR__ . '/../src/app.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new HttpKernel\EventListener\ExceptionListener('Calendar\Controller\ErrorController::exception'));
$dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher, $requestStack));
//$dispatcher->addListener('response', array(new Simplex\GoogleListener(), 'onResponse'));
//$dispatcher->addSubscriber(new Simplex\GoogleListener());
//$dispatcher->addListener('response', array(new Simplex\ContentLengthListener(), 'onResponse'), -255);
//$dispatcher->addSubscriber(new Simplex\ContentLengthListener());

function render_template(Request $request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();

    include sprintf(__DIR__ . '/../src/pages/%s.php', $_route);

    return new Response(ob_get_clean());
}


$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$framework = new Simplex\Framework($dispatcher, $matcher, $controllerResolver, $requestStack, $argumentResolver);
$framework = new HttpKernel\HttpCache\HttpCache(
    $framework,
    new HttpKernel\HttpCache\Store(__DIR__ . '/../cache')
);
$response = $framework->handle($request);

$response->send();

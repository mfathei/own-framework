<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// The URI being requested (e.g /about ) minus any query parameter
$request->getPathInfo();

// retrieve GET variables
$request->query->get('foo');

// retrieve POST variable
$request->request->get('bar', 'default value if bar doesnot exist');

// retrieve SERVER variables
$request->server->get('HTP_HOST');

// retrieve and instance of UploadedFile identified by foo
$request->files->get('foo');

// retrieve a COOKIE value
$request->cookies->get('PHPSESSID');

// rerieve an HTTP request header, with normalized, lowercase keys
$request->headers->get('host');
$request->headers->get('content_type');

$request->getMethod(); // GET, POST, PUT, DELETE, HEAD
$request->getLanguages(); // an array of languages the client accepts

// =============================================================================

// You can also simulate a request
$request = Request::create('/index.php?name=Fabien');

// =============================================================================
// You can also tweak the response
$response = new Response();

$response->setContent('Hello World');
$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');

// configure the HTTP cache headers
$response->setMaxAge(10);

// =============================================================================

if($myIP === $_SERVER['REMOTE_ADDR'])
{
    // the client is a known one, so give it some more privilege
}

// if the client uses reverse proxy
if($myIP === $_SERVER['HTTP_X_FORWARDED_FOR'] || $myIP === $_SERVER['REMOTE_ADDR'])
{
    // the client is a known one, so give it some more privilege
}

// more secure
$request = Request::createFromGlobals();
if($myIP === $request->getClientIp())
{
    // the client is a known one, so give it some more privilege
}

// more secure and trust reverse proxies
$request = Request::createFromGlobals();
$request->setTrustedProxies(array('10.0.0.1'));

if($myIP === $request->getClientIp())
{
    // the client is a known one, so give it some more privilege
}

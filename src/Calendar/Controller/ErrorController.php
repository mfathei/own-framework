<?php
/**
 * Created by PhpStorm.
 * User: mahdy
 * Date: 10/24/18
 * Time: 2:07 PM
 */

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Debug\Exception\FlattenException;

class ErrorController
{
    public function exception(FlattenException $exception)
    {
        $msg = 'Something went wrong (' . $exception->getMessage() . ')';
        return new Response($msg, $exception->getStatusCode());
    }
}
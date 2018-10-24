<?php
/**
 * Created by PhpStorm.
 * User: mahdy
 * Date: 10/24/18
 * Time: 12:38 PM
 */

namespace Simplex;


class ContentLengthListener
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        $headers = $response->headers;

        if (!$headers->has('Content-Length') && !$headers->has('Transfer-Encoding')) {
            $headers->set('Content-Length', strlen($response->getContent()));
        }
    }
}
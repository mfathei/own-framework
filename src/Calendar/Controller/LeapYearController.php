<?php
/**
 * Created by PhpStorm.
 * User: mahdy
 * Date: 10/23/18
 * Time: 7:31 PM
 */

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Response;

use Calendar\Model\LeapYear;

class LeapYearController
{
    public function index($year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            $response = new Response('Yep, this is a leap year! ' . rand());
        } else {
            $response = new Response('Nope, this is not a leap year.');
        }

        $response->setTtl(10);// Cache response for 10 seconds

        return $response;
    }
}

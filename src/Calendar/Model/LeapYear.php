<?php
/**
 * Created by PhpStorm.
 * User: mahdy
 * Date: 10/23/18
 * Time: 7:32 PM
 */

namespace Calendar\Model;

class LeapYear
{
    function isLeapYear($year = null)
    {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }

}
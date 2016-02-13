<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/8/2016
 * Time: 10:26 PM
 */

namespace ICalParser\Factory;


use ICalParser\Component\Base\Vcomponent;
use ICalParser\Factory\ComponentFactory;

class ProcessorFactory
{
    private static $vCalendar;

    public static function processBegin($fh)
    {
        self::$vCalendar = new \stdClass();

        while (!feof($fh)) {

            $line = fgets($fh);

            if (substr($line, 0, 6) == 'BEGIN:') {
                if (trim(substr($line, 6, strlen($line))) == 'VCALENDAR') {
                    self::$vCalendar = ComponentFactory::buildComponent('VCALENDAR');
                    //self::$vCalendar->process($fh);
                }
            } elseif (substr($line, 0, 4) == 'END:') {
                if (trim(substr($line, 6, strlen($line))) == 'VCALENDAR') {
                    return self::$vCalendar;
                }
            }
        }
        var_dump(self::$vCalendar->getAttributes());
        echo '<hr/>';
        var_dump(self::$vCalendar);
    }

    public static function process(&$fhandle, Vcomponent &$vcomponent)
    {

        $line = fgetc($fhandle);

        //$vcomponent->getAttributeNames();

    }
}
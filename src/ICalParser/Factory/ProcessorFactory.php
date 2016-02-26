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
    private static $vCalendar_list;

    public static function processBegin($fh)
    {
        self::$vCalendar_list = array();

        while (!feof($fh)) {

            $line = fgets($fh);
            $vCalendar = new \stdClass();

            if (substr($line, 0, 6) == 'BEGIN:') {
                if (trim(substr($line, 6, strlen($line))) == 'VCALENDAR') {

                    //create a new VCalendar Component
                    $vCalendar = ComponentFactory::buildComponent('VCALENDAR');

                    //let the VCalendar Component process the next lines
                    $vCalendar->process($fh);

                    //add this VCalendar to the list of VCalendars
                    self::$vCalendar_list[] = $vCalendar;
                }
            } elseif (substr($line, 0, 4) == 'END:') {
                if (trim(substr($line, 6, strlen($line))) == 'VCALENDAR') {

                    return self::$vCalendar_list;
                }
            }
        }

        echo '<pre>';
        var_dump(self::$vCalendar_list);
        echo '</pre>';

        //didn't find an END, the ical file/text is not validated
        $parseFault = new \ICalParser\Debug\Fault\ParseFault();
        $parseFault->setMessage('END iCal attribute not found for VCalendar');
        return $parseFault;
    }

    public static function process(&$fhandle, Vcomponent &$vcomponent)
    {

        $line = fgetc($fhandle);

        //$vcomponent->getAttributeNames();

    }
}
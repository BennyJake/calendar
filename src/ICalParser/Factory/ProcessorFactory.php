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

        $lineNumber = 0;

        while (!feof($fh)) {

            $line = fgets($fh);
            $lineNumber++;

            //if there's anything to read on this line
            if ($line) {

                if (substr($line, 0, 6) == 'BEGIN:' && trim(substr($line, 6, strlen($line))) == 'VCALENDAR') {

                    //create a new VCalendar Component
                    $vCalendar = ComponentFactory::buildComponent('VCALENDAR');

                    //let the VCalendar Component process the next lines
                    $vCalendar->process($fh, $lineNumber, 'BEGIN', 'VCALENDAR');

                    //add this VCalendar to the list of VCalendars
                    self::$vCalendar_list[] = $vCalendar;

                }
                else{

                    //we found a line that wasn't an BEGIN for VCALENDAR, we can't process it
                    $parseFault = new \ICalParser\Debug\Fault\ParseFault();
                    $parseFault->setMessage('Unknown Line Found');
                    $parseFault->setLineNumber($lineNumber);
                    $parseFault->setLine($line);
                    return $parseFault;
                }
            }
        }

        //if the list of vCalendars validates, return the list
        if(TRUE) {
            return self::$vCalendar_list;
        }
        //if the list does NOT validate, return a parsing error
        else {
            //didn't find an END, the ical file/text is not validated
            $parseFault = new \ICalParser\Debug\Fault\ParseFault();
            $parseFault->setMessage('END iCal attribute not found for VCalendar');
            return $parseFault;
        }
    }

}
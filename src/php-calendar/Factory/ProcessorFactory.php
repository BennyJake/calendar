<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/8/2016
 * Time: 10:26 PM
 */

namespace phpCalendar\Factory;


use PhpCalendar\Component\Base\Vcomponent;
use phpCalendar\component\Vcalendar;
use PhpCalendar\ComponentFactory;

class ProcessorFactory
{
    public static function processBegin($line){

        $Vcalendar = new Vcalendar();

        if(substr($line,0,6) == 'BEGIN:'){
            if(substr(6,strlen($line)) == 'VCALENDAR'){
                        ComponentFactory::buildComponent('VCALENDAR');
            }
        }
        elseif(substr($line,0,4) == 'END:'){
            if(substr(6,strlen($line)) == 'VCALENDAR'){
                return
            }
        }
    }

    public static function process(&$fhandle, Vcomponent &$vcomponent){

        $line = fgetc($fhandle);

        //$vcomponent->getAttributeNames();

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: bchrisman
 * Date: 4/6/2015
 * Time: 4:42 PM
 */

namespace ICalParser\Component;

//Resource: http://en.wikipedia.org/wiki/ICalendar#Journal_entry_.28VJOURNAL.29

class Vcalendar extends \ICalParser\Component\Base\Vcomponent{

    public function __construct(){
        parent::__construct();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: bchrisman
 * Date: 4/6/2015
 * Time: 4:42 PM
 */

namespace phpCalendar\component;

require 'util/Vcomponent.php';
require 'util/VcomponentTrait.php';
//Resource: http://en.wikipedia.org/wiki/ICalendar#Journal_entry_.28VJOURNAL.29

class Vcalendar extends Vcomponent{

    use \VcomponentTrait;

    private $componentType = 'VCALENDAR';

    private $component = array(
        'VERSION' => array(
            'required' => TRUE,'value' => ''),
        'PRODID' => array(
            'required' => TRUE,'value' => 'PUBLIC'),
    );


}
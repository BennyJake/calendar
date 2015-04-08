<?php
/**
 * Created by PhpStorm.
 * User: bchrisman
 * Date: 4/6/2015
 * Time: 4:42 PM
 */

namespace phpCalendar\component;

require_once 'util/Vcomponent.php';
//Resource: http://en.wikipedia.org/wiki/ICalendar#Journal_entry_.28VJOURNAL.29

class Vcalendar extends Vcomponent{

    protected $componentType = 'VCALENDAR';

    private $component = array(
        'BEGIN' => array(
            'required' => TRUE,'value' => 'VCALENDAR'),
        'PRODID' => array(
            'required' => TRUE,'value' => '-//hacksw/handcal//NONSGML v1.0//EN'),
        'VERSION' => array(
            'required' => TRUE,'value' => '2.0'),
        'CALSCALE' => array(
            'required' => TRUE,'value' => 'GREGORIAN'),
        'METHOD' => array(
            'required' => TRUE,'value' => 'PUBLISH'),
        'END' => array(
            'required' => TRUE,'value' => 'VCALENDAR'),
    );


}
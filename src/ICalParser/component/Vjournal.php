<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 5:55 PM
 */

namespace ICalParser\Component;

//Resource: http://en.wikipedia.org/wiki/ICalendar#Journal_entry_.28VJOURNAL.29

class Vjournal extends \ICalParser\Component\Base\Vcomponent{

    public function __construct(){
        parent::__construct();
    }
}
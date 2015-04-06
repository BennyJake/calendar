<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 5:55 PM
 */

namespace phpCalendar\component;

require 'Vcomponent.php';

//Resource: http://en.wikipedia.org/wiki/ICalendar#Journal_entry_.28VJOURNAL.29

class Vjournal extends  Vcomponent{

    private $componentType = 'VJOURNAL';

    private $component = array(
        'STATUS' => array(
            'required' => TRUE,'value' => ''),
        'CLASS' => array(
            'required' => TRUE,'value' => 'PUBLIC'),
        'CATEGORIES' => array(
            'required' => TRUE,'value' => array()),
        'DESCRIPTION' => array(
            'required' => TRUE,'value' => ''),
    );

    public function __construct(){
        parent::__construct();
        $this->component = array_merge(parent::getAttributes(),$this->component);
        return $this;
    }
}
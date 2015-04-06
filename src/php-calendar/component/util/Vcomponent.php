<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/19/14
 * Time: 9:05 PM
 */

namespace phpCalendar\component;


use phpCalendar\ComponentFactory;

class Vcomponent {

    private $component = array(
        'BEGIN' => array(
            'required' => TRUE,'value' => ''),
        'END' => array(
            'required' => TRUE,'value' => ''),
    );

    public function getAttributes(){
        //return all relevant private variables
        return $this->component;
    }


} 
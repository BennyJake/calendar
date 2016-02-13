<?php
/**
 * Created by PhpStorm.
 * User: bench_000
 * Date: 4/13/2015
 * Time: 9:41 PM
 */

namespace phpCalendar\component;

require_once 'Base/Vcomponent.php';

class Daylight extends Vcomponent{



    public function __construct(){
        $this->attributes = array_replace_recursive($this->attributes, array(
            'BEGIN' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'DAYLIGHT'),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'DAYLIGHT'),
        ));

        parent::__construct($settings = array());
    }
}
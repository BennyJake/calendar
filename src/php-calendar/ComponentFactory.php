<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 6:27 PM
 */

namespace phpCalendar;

use phpCalendar\component\Vjournal;

require 'component/Vjournal.php';

class ComponentFactory {

    private $component_types = array('VALARM','VEVENT','VFREEBUSY','VJOURNAL','VTODO');

    public function __construct(){

    }

    public function buildComponent($name, array $settings = null){
        if(in_array(strtoupper($name),$this->component_types)){
            $className = "phpCalendar\\component\\".ucfirst($name);
            return new $className($settings);
        }
        else{
            return NULL;
        }
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 6:27 PM
 */

namespace phpCalendar;

use phpCalendar\component\Vjournal;
use phpCalendar\component\Vcalendar;

require 'component/Vjournal.php';
require 'component/Vcalendar.php';

class ComponentFactory {

    private $component_types = array('VCALENDAR','VALARM','VEVENT','VFREEBUSY','VJOURNAL','VTODO');

    public function __construct(){

    }

    public function buildComponent($name, array $settings = null){
        if(in_array(strtoupper($name),$this->component_types)){

            $className = "phpCalendar\\component\\".ucfirst(strtolower($name));

            if(isset($settings)) {
                foreach ($settings as $key => $value) {
                    unset($settings[$key]);
                    $settings[strtoupper($key)] = array('value' => $value);
                }
            }

            return new $className($settings);
        }
        else{
            return NULL;
        }
    }
} 
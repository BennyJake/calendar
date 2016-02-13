<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 6:27 PM
 */

namespace PhpCalendar/Factory;

use Composer\Factory;
use phpCalendar\component\Vjournal;
use phpCalendar\component\Vcalendar;

class ComponentFactory {

    public function __construct(){

    }

    public static function buildComponent($component){

            if(is_subclass_of($component,'\PhpCalendar\Component\Base\Vcomponent')){
                $reflection = new \ReflectionClass($component);
                $className = $reflection->getName();
            }else{
                $className = "phpCalendar\\Component\\".ucfirst(strtolower($component));
                $component = new $className;
            }

            $component->setAttributes(\phpCalendar\Config::getConfig());

            return new $className();
    }
} 
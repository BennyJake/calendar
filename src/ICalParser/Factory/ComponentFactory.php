<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 6:27 PM
 */

namespace ICalParser\Factory;

use Composer\Factory;
use ICalParser\component\Vjournal;
use ICalParser\component\Vcalendar;

class ComponentFactory {

    public function __construct(){}

    public static function buildComponent($component){

            if(is_subclass_of($component,'\ICalParser\Component\Base\Vcomponent')){
                $reflection = new \ReflectionClass($component);
                $className = $reflection->getName();
            }else{
                $className = "ICalParser\\Component\\".ucfirst(strtolower($component));
                $component = new $className();
            }

            $component->setAttributes(\ICalParser\Config::getConfig());

            return $component;
    }
} 
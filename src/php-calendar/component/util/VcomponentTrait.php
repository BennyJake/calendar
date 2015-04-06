<?php
/**
 * Created by PhpStorm.
 * User: bchrisman
 * Date: 4/6/2015
 * Time: 10:53 AM
 */

trait VcomponentTrait{

    private $childComponent;

    public function __construct($settings = NULL){
        $this->childComponent = array();
        $this->component = array_replace_recursive(parent::getAttributes(),$this->getAttributes(),$settings);
        return $this;
    }

    public function __get($name)
    {
        if(isset($this->component[strtoupper($name)])){
            return $this->component[strtoupper($name)];
        }
        return NULL;
    }

    public function getComponentType(){
        return $this->componentType;
    }

    public function getAttributes(){
        //return all relevant private variables
        return $this->component;
    }

    public function addComponent(\phpCalendar\component\Vcomponent $component){
        $this->childComponent[] = $component;
    }
}
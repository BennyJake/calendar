<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/19/14
 * Time: 9:05 PM
 */

namespace phpCalendar\component;


//use phpCalendar\ComponentFactory;

class Vcomponent {

    protected $componentType;
    protected $childComponent;

    //shared by all classes that inherit Vcomponent
    private $component = array(
        'BEGIN' => array(
            'required' => TRUE,'value' => ''),
        'END' => array(
            'required' => TRUE,'value' => ''),
    );

    public function __construct($settings = NULL){

        $this->childComponent = array();

        $this->addAttributes($settings);

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

    public function addAttributes($settings = NULL){

        $child = is_subclass_of($this,'Vcomponent');

        //combine parent/child/passed component settings
        if($child) {
            if(isset($settings)){
                $this->component = array_replace_recursive(parent::getAttributes(), $this->getAttributes(), $settings);
            }
            else{
                $this->component = array_replace_recursive(parent::getAttributes(), $this->getAttributes());
            }
        }
        else{
            if(isset($settings)) {
                $this->component = array_replace_recursive($this->getAttributes(), $settings);
            }
            else{
                //nothing changes...
            }
        }
    }

    public function addComponent(Vcomponent $component){
        $this->childComponent[] = $component;
    }

} 
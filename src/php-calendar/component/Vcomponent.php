<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/19/14
 * Time: 9:05 PM
 */

namespace phpCalendar\component;


class Vcomponent {

    private $component = array(
        'UID' => array(
            'required' => TRUE,'value' => ''),
        'DTSTAMP' => array(
            'required' => TRUE,'value' => ''),
        'ORGANIZER' => array(
            'required' => TRUE,'value' => ''),
    );

    public function __construct(array $settings = null){
        if($settings){
            foreach($settings as $setting_name => $setting_value){
                if(isset($this->component[$setting_name])){
                    $this->component[$setting_name] = $setting_value;
                }
            }
        }
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

} 
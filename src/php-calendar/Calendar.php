<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 5:47 PM
 */

namespace phpCalendar;

use phpCalendar\component\Vcomponent;

require 'ComponentFactory.php';

class Calendar {

    private $calendar = array(
        'BEGIN' => array(
            'required' => TRUE,'value' => 'VCALENDAR'),
        'PRODID' => array(
            'required' => TRUE,'value' => '-//hacksw/handcal//NONSGML v1.0//EN'),
        'VERSION' => array(
            'required' => TRUE,'value' => '2.0'),
        'CALSCALE' => array(
            'required' => TRUE,'value' => 'GREGORIAN'),
        'METHOD' => array(
            'required' => TRUE,'value' => 'PUBLISH'),
        'END' => array(
            'required' => TRUE,'value' => 'VCALENDAR'),
    );

    private $calendar_components = array();

    private $component_factory;

    public function __construct(){

        $this->component_factory = new ComponentFactory();

        return $this;
    }

    /**
     * @param array $calendar
     */
    public function setCalendar($calendar)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * @return array
     */
    public function getCalendar()
    {
        return $this;
    }

    public function __set($name, $value)
    {
        if(in_array(strtoupper($name),$this->calendar)){
            $calendar = $this->getCalendar();
            $calendar[strtoupper($name)]['value'] = $value;
            $this->setCalendar($calendar);
        }

        return $this;
    }

    public function addComponent($name,array $settings = null){

        $component = $this->component_factory->buildComponent($name,$settings);
        $this->calendar_components[] = $component;

        return $this;
    }

    public function getComponentByUid($uid){

        foreach($this->getCalendarComponents() as $calendar_component){
            if($calendar_component instanceof Vcomponent){
                if($calendar_component->uid['value'] === $uid){
                    return $calendar_component;
                }
            }
        }

    }

    /**
     * @param array $calendar_components
     */
    public function setCalendarComponents($calendar_components)
    {
        $this->calendar_components = $calendar_components;
    }

    /**
     * @return array
     */
    public function getCalendarComponents()
    {
        return $this->calendar_components;
    }

    public function getComponentByDate($start,$end = null){

    }
}
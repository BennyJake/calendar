<?php
/**
 * Created by PhpStorm.
 * User: bchrisman
 * Date: 4/6/2015
 * Time: 11:09 AM
 */

namespace phpCalendar;

class Parser {

    private $calendar;

    private $keyword_list = array(
        "BEGIN",
        "VERSION",
        "PRODID",
        "DTSTAMP",
        "UID",
        "ORGANIZER",
        "STATUS",
        "CLASS",
        "CATEGORIES",
        "DESCRIPTION",
        "END"
    );

    public function __construct($content){

        $content_by_line = explode( "\n", $content );

        $content_in_array = $this->to_array($content_by_line);

        return $this;
    }

    private function to_object($content){

        $calendar = new \phpCalendar\Calendar();

        foreach($content as $content_line){
            if($content_line['name'] == 'BEGIN'){
                if($content_line['value'] == 'VCALENDAR') {
                    $object = new \phpCalendar\Calendar();
                }
                else{
                    $object = new \phpCalendar\Calendar();
                }
            }
        }
    }

    private function to_array($content){

        $content_in_array = array();

        foreach($content as $line_num => $line_content){
            if(strpos($line_content,':') !== FALSE){
                $line_array = explode(':',$line_content);
                if(in_array($line_array[0],$this->keyword_list)){

                    $content_in_array[] = array('name' => $line_array[0],'value' => $line_array[1]);

                }
                else{
                    $content_in_array[sizeof($content_in_array)-1]['value'].=$line_content;
                }
            }
            else{
                $content_in_array[sizeof($content_in_array)-1]['value'].=$line_content;
            }
        }

        return $content_in_array;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: bchrisman
 * Date: 4/6/2015
 * Time: 11:09 AM
 */

namespace phpCalendar;

use phpCalendar\component\Vcomponent;
use phpCalendar\component\Vjournal as Vjournal;
use phpCalendar\component\Vcalendar as Vcalendar;

require_once 'component/Vwrapper.php';
require_once 'component/Vjournal.php';
require_once 'component/Vcalendar.php';

class Parser {

    private $calendar;

    private $content;
    private $content_two;
    private $counter;

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

        $this->content = explode( "\n", $content );

        $this->content = $this->to_array();

        $counter = -1;

        $this->content = $this->object2($counter,'Vwrapper');

        echo '<pre>';
        var_dump($this->content);
        echo '</pre>';

        return $this;
    }

    private function object2(&$counter,$vcomponentName){

        $className = "phpCalendar\\component\\".$vcomponentName;
        $vcomponent = new $className;

        for(;$counter + 1 < sizeof($this->content);){

            $counter++;
            echo $counter.' '.$this->content[$counter]['value'].'<br/>';
            if($this->content[$counter]['name'] == 'BEGIN'){

                $new_vcomponent = $this->object2($counter,ucfirst(strtolower(trim($this->content[$counter]['value']))));
                $vcomponent->addComponent($new_vcomponent);
            }
            elseif($this->content[$counter]['name'] == 'END'){
                break;
            }
            else{
                $vcomponent->addAttributes(array($this->content[$counter]['name'] => $this->content[$counter]['value']));
            }
        }

        return $vcomponent;
    }

    private function object(&$counter,Vcomponent $vcomponent = NULL){

        for(;$counter + 1 < sizeof($this->content);){

            $counter++;

            if($this->content[$counter]['name'] == 'BEGIN'){

                echo 'Counter-Begin: '.$counter.'<br/>';

                $className = "phpCalendar\\component\\".ucfirst(strtolower(trim($this->content[$counter]['value'])));

                $vcomponent = new $className(NULL);

                $new_vcomponent = $this->object($counter);

                if(isset($new_vcomponent)) {
                    $vcomponent->addComponent($new_vcomponent);
                }
            }
            elseif($this->content[$counter]['name'] == 'END'){
                echo 'Counter-End: '.$counter.'<br/>';
                break;
            }
            else{
                if(isset($new_vcomponent)) {
                    $vcomponent->addAttributes(array($this->content[$counter]['name'] => $this->content[$counter]['value']));
                }
            }
        }

        return $vcomponent;
    }

    private function nest(&$nest_array,&$begin_tag_array,&$end_tag_array){
        foreach($begin_tag_array as $key => $value){
            echo '<pre>';
            echo 'WUTT';
            var_dump($begin_tag_array);
            echo '</pre>';
            //if we have a nested begin tag...
            if(isset($begin_tag_array[$key+1]) && $begin_tag_array[$key+1] < $end_tag_array[$key]){

                $new_end_tag_array = $end_tag_array;
                $new_begin_tag_array = $begin_tag_array;

                unset($new_begin_tag_array[$key]);
                $new_begin_tag_array = array_values($new_begin_tag_array);

                $nest_array[] = $this->nest($nest_array,$new_begin_tag_array,$new_end_tag_array);
            }else{
            //else we have a closing end tag

                var_dump($key);

                return $nest_array;
            }
            //$this->nest();
        }
    }

    private function to_array(){

        $content_in_array = array();

        foreach($this->content as $line_num => $line_content){
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
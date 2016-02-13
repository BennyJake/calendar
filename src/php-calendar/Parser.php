<?php
/**
 * Created by PhpStorm.
 * User: bchrisman
 * Date: 4/6/2015
 * Time: 11:09 AM
 */

namespace phpCalendar;

class Parser
{
    public function __construct(){}

    public function parse($content){

        if(is_file($content)){
           if($fh = fopen($content,"r")){
               while (!feof($fh)){
                   \phpCalendar\Factory\ProcessorFactory::processBegin($fh);
               }
               fclose($fh);
           }
        }
    }
}
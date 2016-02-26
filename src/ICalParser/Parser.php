<?php
/**
 * Created by PhpStorm.
 * User: bchrisman
 * Date: 4/6/2015
 * Time: 11:09 AM
 */

namespace ICalParser;

class Parser
{
    public function __construct()
    {
    }

    public function parse($content)
    {
        if (is_file(realpath($content))) {
            if ($fh = fopen($content, "r")) {

                //TODO: Abstract out the list of VCalendars to a MasterContainer (that also extends a VComponent
                $masterContainer = \ICalParser\Factory\ProcessorFactory::processBegin($fh);
                fclose($fh);

                return $masterContainer;
            }
        } else {
            echo 'No file detected...';
        }

        return FALSE;
    }
}
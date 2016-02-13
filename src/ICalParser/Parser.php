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
                \ICalParser\Factory\ProcessorFactory::processBegin($fh);
                fclose($fh);
            }
        } else {
            echo 'No file detected...';
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/8/2016
 * Time: 10:14 PM
 */
require __DIR__ . '/vendor/autoload.php';

$parser = new \ICalParser\Parser();
$vCalendars = $parser->parse('data/basic.ics');
//var_dump($vCalendars);
echo $vCalendars[0];
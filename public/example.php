<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 6:30 PM
 */

require_once('../src/php-calendar/Calendar.php');

//$calendar = new \phpCalendar\Calendar();
$calendar = new \phpCalendar\Calendar();
$journal = $calendar->addComponent('vjournal',array('uid'=>'1234'))->getComponentByUid('1234');
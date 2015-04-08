<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11/17/2014
 * Time: 6:30 PM
 */

require_once('../src/php-calendar/Calendar.php');
require_once('../src/php-calendar/Parser.php');

$factory = new \phpCalendar\ComponentFactory();
$vcalendar = $factory->buildComponent('VCALENDAR');
$vjournal = $factory->buildComponent('VJOURNAL',array('UID'=>'1234'));
$vcalendar->addComponent($vjournal);
echo $vcalendar->getComponentType();
echo $vjournal->getComponentType();
$parser = new \phpCalendar\Parser("BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//ABC Corporation//NONSGML My Product//EN
BEGIN:VJOURNAL
DTSTAMP:19970324T120000Z
UID:uid5@example.com
ORGANIZER:MAILTO:jsmith@example.com
STATUS:DRAFT
CLASS:PUBLIC
CATEGORIES:Project Report, XYZ, Weekly Meeting
DESCRIPTION:Project xyz Review Meeting Minutes\n
 Agenda\n1. Review of project version 1.0 requirements.\n2.
 Definition
 of project processes.\n3. Review of project schedule.\n
 Participants: John Smith, Jane Doe, Jim Dandy\n-It was
  decided that the requirements need to be signed off by
  product marketing.\n-Project processes were accepted.\n
 -Project schedule needs to account for scheduled holidays
  and employee vacation time. Check with HR for specific
  dates.\n-New schedule will be distributed by Friday.\n-
 Next weeks meeting is cancelled. No meeting until 3/23.
END:VJOURNAL
END:VCALENDAR");
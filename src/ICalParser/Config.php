<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/10/2016
 * Time: 10:33 PM
 */

namespace ICalParser;


class Config
{
    private static $config = array(
        'ICalParser\Component\Daylight' => array(
            'BEGIN' => array(
                'required' => TRUE,
                'limit' => 1,
                'value' => 'DAYLIGHT'
            ),
            'COMMENT' => array(
                'required' => FALSE,
                'limit' => 0,
                'value' => array()
            ),
            'DTSTART' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART;VALUE=DATE' => array(
                'required' => TRUE,
                'limit' => 1,
                'value' => ''
            ),
            'RDATE' => array(
                'required' => FALSE,
                'limit' => 0,
                'value' => array()
            ),
            'RRULE' => array(
                'required' => FALSE,
                'limit' => 0,
                'value' => array()
            ),
            'TZNAME' => array(
                'required' => FALSE,
                'limit' => 0,
                'value' => array()
            ),
            'TZOFFSETTO' => array(
                'required' => TRUE,
                'limit' => 1,
                'value' => ''
            ),
            'TZOFFSETFROM' => array(
                'required' => TRUE,
                'limit' => 1,
                'value' => ''
            ),
            'XPROP' => array(
                'required' => FALSE,
                'limit' => 0,
                'value' => array()
            ),
            'END' => array(
                'required' => TRUE,
                'limit' => 1,
                'value' => 'DAYLIGHT'
            ),
        ),
        'ICalParser\Component\Standard' => array(
            'COMMENT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'DTSTART' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART;VALUE=DATE' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'RDATE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RRULE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'TZNAME' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'TZOFFSETTO' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'TZOFFSETFROM' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'XPROP' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'DAYLIGHT'),
        ),
        'ICalParser\Component\Valarm' => array(
            'ACTION' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'BEGIN' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VFREEBUSY'),
            'DURATION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VFREEBUSY'),
            'REPEAT' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'TRIGGER' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'XPROP' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
        ),
        'ICalParser\Component\Vcalendar' => array(
            'BEGIN' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VCALENDAR'),
            'CALSCALE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => 'GREGORIAN'),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VCALENDAR'),
            'METHOD' => array(
                'required' => FALSE, 'limit' => 1, 'value' => 'PUBLISH'),
            'PRODID' => array(
                'required' => TRUE, 'limit' => 1, 'value' => '-//hacksw/handcal//NONSGML v1.0//EN'),
            'VERSION' => array(
                'required' => TRUE, 'limit' => 1, 'value' => '2.0'),
            'XPROP' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'VEVENT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'VTODO' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'VJOURNAL' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'VFREEBUSY' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'VTIMEZONE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'X-WR-CALNAME' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'X-WR-TIMEZONE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
        ),
        'ICalParser\Component\Vevent' => array(
            'ATTACH' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'ATTENDEE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'BEGIN' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VEVENT'),
            'CATEGORIES' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CLASS' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'COMMENT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CONTACT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CREATED' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DESCRIPTION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTEND' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTEND;VALUE=DATE' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'DTSTAMP' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART;VALUE=DATE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DURATION' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VEVENT'),
            'EXDATE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'EXRULE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'GEO' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'LAST-MODIFIED' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'LOCATION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'ORGANIZER' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'PRIORITY' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'RDATE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RECURID' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'RELATED' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RESOURCES' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RRULE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RSTATUS' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'SEQUENCE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'STATUS' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'SUMMARY' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'TRANSP' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'UID' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'URL' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'XPROP' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
        ),
        'ICalParser\Component\Vfreebusy' => array(
            'ATTENDEE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'BEGIN' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VFREEBUSY'),
            'COMMENT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CONTACT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CREATED' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DESCRIPTION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTEND' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTEND;VALUE=DATE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTAMP' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART;VALUE=DATE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DURATION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VFREEBUSY'),
            'FREEBUSY' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'ORGANIZER' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'RSTATUS' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'ULD' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'URL' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'XPROP' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
        ),
        'ICalParser\Component\Vjournal' => array(
            'ATTACH' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'ATTENDEE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'BEGIN' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VJOURNAL'),
            'CATEGORIES' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CLASS' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'COMMENT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CONTACT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CREATED' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DESCRIPTION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTAMP' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART;VALUE=DATE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VJOURNAL'),
            'EXDATE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'EXRULE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'LASTMOD' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'ORGANIZER' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'RDATE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RECURID' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'RELATED' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RRULE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RSTATUS' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'SEQUENCE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'STATUS' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'SUMMARY' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'ULD' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'URL' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'XPROP' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
        ),
        'ICalParser\Component\Vtimezone' => array(
            'BEGIN' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VTIMEZONE'),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VTIMEZONE'),
            'LASTMOD' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'TZID' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'TZURL' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'X-LIC-LOCATION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
        ),
        'ICalParser\Component\Vtodo' => array(
            'ATTACH' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'ATTENDEE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'BEGIN' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VTODO'),
            'CATEGORIES' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CLASS' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'COMMENT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'COMPLETED' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'CONTACT' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'CREATED' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DESCRIPTION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTAMP' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DTSTART;VALUE=DATE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'DUE' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'DURATION' => array(
                'required' => TRUE, 'limit' => 1, 'value' => ''),
            'END' => array(
                'required' => TRUE, 'limit' => 1, 'value' => 'VTODO'),
            'EXDATE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'EXRULE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'GEO' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'LASTMOD' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'LOCATION' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'ORGANIZER' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'PERCENT' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'PRIORITY' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'RDATE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RECURID' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'RELATED' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RESOURCES' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RRULE' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'RSTATUS' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
            'SEQUENCE' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'STATUS' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'SUMMARY' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'ULD' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'URL' => array(
                'required' => FALSE, 'limit' => 1, 'value' => ''),
            'XPROP' => array(
                'required' => FALSE, 'limit' => 0, 'value' => array()),
        ),

    );

    /**
     * @return array
     */
    public static function getConfig()
    {
        return self::$config;
    }

    /**
     * @param array $config
     */
    public static function setConfig($config)
    {
        self::$config = $config;
    }

}
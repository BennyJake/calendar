<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/14/2016
 * Time: 7:29 PM
 */

namespace ICalParser\Debug\Fault;


class ParseFault
{
    private $line;
    private $lineNumber;

    private $message;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param mixed $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

    /**
     * @return mixed
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * @param mixed $lineNumber
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
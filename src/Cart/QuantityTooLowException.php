<?php

namespace Gwo\Recruitment\Cart\Exception;

use Exception;

class QuantityTooLowException extends Exception
{
    protected $message;
    protected $code;
    protected $file;
    protected $line;
    protected $severity;

    public function __construct($message, $code, $severity, $filename, $lineno, $previous)
    {
    }

    final public function getSeverity()
    {
    }

    final private function __clone()
    {
    }

    final public function getMessage()
    {
    }

    final public function getCode()
    {
    }

    final public function getFile()
    {
    }

    final public function getLine()
    {
    }

    final public function getTrace()
    {
    }

    final public function getPrevious()
    {
    }

    final public function getTraceAsString()
    {
    }

    public function __toString()
    {
    }
}

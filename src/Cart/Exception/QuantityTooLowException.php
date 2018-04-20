<?php

namespace Gwo\Recruitment\Cart\Exception;

use Exception;

class QuantityTooLowException extends Exception
{

    public function __construct($message = 'Quantity too low', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    
    final public function getSeverity()
    {
    }
}

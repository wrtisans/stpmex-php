<?php

namespace Wrtisans\STP\Exceptions;

use Exception;

class STPException extends Exception
{
    /**
     * Create a new STPException instance.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  \Exception  $previous
     */
    public function __construct(string $message, int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

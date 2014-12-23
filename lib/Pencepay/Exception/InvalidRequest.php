<?php

/**
 * Raised when parameters sent in the request are invalid.
 *
 * @package    Pencepay
 * @subpackage Exception
 * @copyright  2014 Pencepay Ltd
 */
class Pencepay_Exception_InvalidRequest extends Pencepay_Exception {

    function __construct($message, $code = -1, $parameter = '') {
        $this->message = $message;
        $this->code = $code;
        $this->parameter = $parameter;
    }

}
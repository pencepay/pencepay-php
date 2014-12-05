<?php

class Pencepay_Request_CreditCardAddress extends Pencepay_Request_Address {

    /* @var Pencepay_Request_CreditCard */
    private $parent;

    /**
     * @param Pencepay_Request_CreditCard
     */
    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_CreditCard */
    public function done() {
        return $this->parent;
    }

}
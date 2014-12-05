<?php

class Pencepay_Request_CustomerAddress extends Pencepay_Request_Address {

    /* @var Pencepay_Request_Customer */
    private $parent;

    /**
     * @param Pencepay_Request_Customer
     */
    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_Customer */
    public function done() {
        return $this->parent;
    }

}
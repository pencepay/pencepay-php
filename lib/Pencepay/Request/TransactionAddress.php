<?php

class Pencepay_Request_TransactionAddress extends Pencepay_Request_Address {

    /* @var Pencepay_Request_Transaction */
    private $parent;

    /**
     * @param Pencepay_Request_Transaction
     */
    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_Transaction */
    public function done() {
        return $this->parent;
    }

}
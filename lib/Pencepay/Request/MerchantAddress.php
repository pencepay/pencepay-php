<?php

class Pencepay_Request_MerchantAddress extends Pencepay_Request_Address {

    /* @var Pencepay_Request_Merchant */
    private $parent;

    /**
     * @param Pencepay_Request_Merchant
     */
    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_Merchant */
    public function done() {
        return $this->parent;
    }

}
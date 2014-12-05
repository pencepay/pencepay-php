<?php

class Pencepay_Request_TransactionCreditCard extends Pencepay_Request {

	protected $cardholderName;
	protected $number;
	protected $expiryMonth;
	protected $expiryYear;
	protected $cvv;

    private $parent;

    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_Transaction */
    public function done() {
        return $this->parent;
    }

    /** @return self */
    public function cardholderName($cardholderName) {
        $this->cardholderName = $cardholderName;
        return $this;
    }

    /** @return self */
    public function number($number) {
        $this->number = $number;
        return $this;
    }

    /** @return self */
    public function expiryMonth($expiryMonth) {
        $this->expiryMonth = $expiryMonth;
        return $this;
    }

    /** @return self */
    public function expiryYear($expiryYear) {
        $this->expiryYear = $expiryYear;
        return $this;
    }

    /** @return self */
    public function cvv($cvv) {
        $this->cvv = $cvv;
        return $this;
    }

    public function _prepare() {
        return [
            "cardholderName",
            "number",
            "expiryMonth",
            "expiryYear",
            "cvv"
        ];
    }

}
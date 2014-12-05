<?php

class Pencepay_Request_CreditCard extends Pencepay_Request {

	protected $customerUid;
	protected $cardholderName;
	protected $number;
	protected $expiryMonth;
	protected $expiryYear;
	protected $cvv;
    protected $billingAddressUid;
    protected $billingAddress;
	protected $customData;
	protected $settings;

    private $parent;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_CreditCard;
    }

    function __construct($parent = null) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_Customer */
    public function done() {
        return $this->parent;
    }

    /** @return self */
    public function customerUid($customerUid) {
        $this->customerUid = $customerUid;
        return $this;
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

    /** @return self */
    public function billingAddressUid($billingAddressUid) {
        $this->billingAddressUid = $billingAddressUid;
        return $this;
    }

    /** @return Pencepay_Request_CreditCardAddress */
    public function billingAddress() {
        $this->billingAddress = new Pencepay_Request_CreditCardAddress($this);
        return $this->billingAddress;
    }

    /** @return self */
    public function customData(array $customData) {
        $this->customData = $customData;
        return $this;
    }

    /** @return Pencepay_Request_CreditCardSettings */
    public function settings(   ) {
        $this->settings = new Pencepay_Request_CreditCardSettings($this);
        return $this->settings;
    }

    public function _prepare() {
        return [
            "customerUid",
            "cardholderName",
            "number",
            "expiryMonth",
            "expiryYear",
            "cvv",
            "customData",
            "billingAddressUid",
            "billingAddress",
            "settings"
        ];
    }

}
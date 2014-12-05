<?php

class Pencepay_Request_BankAccount extends Pencepay_Request {

	protected $customerUid;
	protected $accountHolder;
	protected $accountNumber;
	protected $iban;
	protected $bic;
	protected $countryCode;
	protected $customData;

    private $parent;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_BankAccount;
    }

    function __construct($parent) {
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
    public function accountHolder($accountHolder) {
        $this->accountHolder = $accountHolder;
        return $this;
    }

    /** @return self */
    public function accountNumber($accountNumber) {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /** @return self */
    public function iban($iban) {
        $this->iban = $iban;
        return $this;
    }

    /** @return self */
    public function bic($bic) {
        $this->bic = $bic;
        return $this;
    }

    /** @return self */
    public function countryCode($countryCode) {
        $this->countryCode = $countryCode;
        return $this;
    }

    /** @return self */
    public function customData(array $customData) {
        $this->customData = $customData;
        return $this;
    }

    public function _prepare() {
        return [
            "customerUid",
            "accountHolder",
            "accountNumber",
            "iban",
            "bic",
            "countryCode",
            "customData"
        ];
    }

}
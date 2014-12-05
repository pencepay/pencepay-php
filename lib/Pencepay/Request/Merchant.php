<?php

class Pencepay_Request_Merchant extends Pencepay_Request {

	protected $email;
	protected $secret;
	protected $name;
	protected $dba;
	protected $registrationNo;
	protected $taxNo;
	protected $phone;
	protected $fax;
	protected $businessAddress;
	protected $settings;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Merchant;
    }

    /** @return self */
    public function email($email) {
        $this->email = $email;
        return $this;
    }

    /** @return self */
    public function secret($secret) {
        $this->secret = $secret;
        return $this;
    }

    /** @return self */
    public function name($name) {
        $this->name = $name;
        return $this;
    }

    /** @return self */
    public function dba($dba) {
        $this->dba = $dba;
        return $this;
    }

    /** @return self */
    public function registrationNo($registrationNo) {
        $this->registrationNo = $registrationNo;
        return $this;
    }

    /** @return self */
    public function taxNo($taxNo) {
        $this->taxNo = $taxNo;
        return $this;
    }

    /** @return self */
    public function phone($phone) {
        $this->phone = $phone;
        return $this;
    }

    /** @return self */
    public function fax($fax) {
        $this->fax = $fax;
        return $this;
    }

    /** @return Pencepay_Request_MerchantAddress */
    public function businessAddress() {
        $this->businessAddress = new Pencepay_Request_MerchantAddress($this);
        return $this->businessAddress;
    }

    /** @return Pencepay_Request_MerchantSettings */
    public function settings() {
        $this->settings = new Pencepay_Request_MerchantSettings($this);
        return $this->settings;
    }

    public function _prepare() {
        return [
            "email",
            "secret",
            "name",
            "dba",
            "registrationNo",
            "taxNo",
            "phone",
            "fax",
            "businessAddress",
            "settings"
        ];
    }

}
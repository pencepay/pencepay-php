<?php

class Pencepay_Request_Paycode extends Pencepay_Request {

	protected $amount;
	protected $currencyCode;
	protected $orderId;
	protected $description;
	protected $validUntil;
    protected $settings;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Paycode;
    }

    /** @return self */
    public function amount($amount) {
        $this->amount = $amount;
        return $this;
    }

    /** @return self */
    public function currencyCode($currencyCode) {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /** @return self */
    public function orderId($orderId) {
        $this->orderId = $orderId;
        return $this;
    }

    /** @return self */
    public function description($description) {
        $this->description = $description;
        return $this;
    }

    /** @return self */
    public function validUntil($validUntil) {
        $this->validUntil = $validUntil;
        return $this;
    }

    /** @return Pencepay_Request_PaycodeSettings */
    public function settings(   ) {
        $this->settings = new Pencepay_Request_PaycodeSettings($this);
        return $this->settings;
    }

    public function _prepare() {
        return [
            "amount",
            "currencyCode",
            "orderId",
            "description",
            "validUntil",
            "settings"
        ];
    }

}
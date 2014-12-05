<?php

class Pencepay_Request_Transaction extends Pencepay_Request {

    protected $paymentMethod;
    protected $bic;
    protected $countryCode;
    protected $requestIpAddress;
    protected $amount;
    protected $currencyCode;
    protected $orderId;
    protected $description;
    protected $creditCardUid;
    protected $customerUid;
    protected $customer;
    protected $creditCard;
    protected $billingAddress;
    protected $settings;
    protected $tags = [];
    protected $customData;
    protected $cancelUrl;
    protected $redirectUrl;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Transaction;
    }

    /** @return self */
    public function paymentMethod($paymentMethod) {
        $this->paymentMethod = $paymentMethod;
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
    public function requestIpAddress($requestIpAddress) {
        $this->requestIpAddress = $requestIpAddress;
        return $this;
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
    public function creditCardUid($customerUid) {
        $this->customerUid = $customerUid;
        return $this;
    }

    /** @return self */
    public function customerUid($customerUid) {
        $this->customerUid = $customerUid;
        return $this;
    }

    /** @return Pencepay_Request_CustomerAddress */
    public function customer() {
        $this->customer = new Pencepay_Request_Customer($this);
        return $this->customer;
    }

    /** @return Pencepay_Request_TransactionAddress */
    public function billingAddress() {
        $this->billingAddress = new Pencepay_Request_TransactionAddress($this);
        return $this->billingAddress;
    }

    /** @return Pencepay_Request_TransactionCreditCard */
    public function creditCard() {
        $this->creditCard = new Pencepay_Request_TransactionCreditCard($this);
        return $this->creditCard;
    }

    /** @return Pencepay_Request_TransactionSettings */
    public function settings() {
        $this->settings = new Pencepay_Request_TransactionSettings($this);
        return $this->settings;
    }

    /** @return self */
    public function tag($tag) {
        $this->tags[] = $tag;
        return $this;
    }

    /** @return self */
    public function tags(array $tags) {
        $this->tags = $tags;
        return $this;
    }

    /** @return self */
    public function customData(array $values) {
        $this->customData = $values;
        return $this;
    }

    /** @return self */
    public function cancelUrl($cancelUrl) {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    /** @return self */
    public function redirectUrl($redirectUrl) {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    public function _prepare() {
        return [
            "paymentMethod",
            "bic",
            "countryCode",
            "requestIpAddress",
            "amount",
            "currencyCode",
            "orderId",
            "description",
            "creditCardUid",
            "customerUid",
            "customer",
            "billingAddress",
            "creditCard",
            "settings",
            "tags",
            "customData",
            "cancelUrl",
            "redirectUrl"
        ];
    }

}
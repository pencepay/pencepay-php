<?php

class Pencepay_Request_Customer extends Pencepay_Request {

    protected $name;
    protected $firstName;
    protected $lastName;
    protected $phone;
    protected $mobile;
    protected $email;
    protected $description;
    protected $customData;
    protected $billingAddress;
    protected $creditCard;

    protected $parent;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Customer;
    }

    /**
     * @param Pencepay_Request_Transaction $parent
     */
    function __construct($parent = null) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_Transaction */
    public function done() {
        return $this->parent;
    }

    /** @return self */
    public function name($name) {
        $this->name = $name;
        return $this;
    }

    /** @return self */
    public function firstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    /** @return self */
    public function lastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    /** @return self */
    public function phone($phone) {
        $this->phone = $phone;
        return $this;
    }

    /** @return self */
    public function mobile($mobile) {
        $this->mobile = $mobile;
        return $this;
    }

    /** @return self */
    public function email($email) {
        $this->email = $email;
        return $this;
    }

    /** @return self */
    public function description($description) {
        $this->description = $description;
        return $this;
    }

    /** @return Pencepay_Request_CustomerAddress */
    public function billingAddress() {
        $this->billingAddress = new Pencepay_Request_CustomerAddress($this);
        return $this->billingAddress;
    }

    /** @return Pencepay_Request_CreditCard */
    public function creditCard() {
        $this->creditCard = new Pencepay_Request_CreditCard($this);
        return $this->creditCard;
    }

    /** @return self */
    public function customData(array $customData) {
        $this->customData = $customData;
        return $this;
    }

    public function _prepare() {
        return [
            "name",
            "firstName",
            "lastName",
            "phone",
            "mobile",
            "email",
            "description",
            "billingAddress",
            "creditCard",
            "customData"
        ];
    }

}
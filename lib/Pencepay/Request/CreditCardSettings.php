<?php


class Pencepay_Request_CreditCardSettings extends Pencepay_Request {

    protected $verifyCard;
    protected $makeDefault;

    protected $parent;

    /**
     * @param Pencepay_Request_CreditCard
     */
    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_CreditCard */
    public function done() {
        return $this->parent;
    }

    /** @return self */
    public function verifyCard($verifyCard) {
        $this->verifyCard = $this->booleanToString($verifyCard);
        return $this;
    }

    /** @return self */
    public function makeDefault($makeDefault) {
        $this->makeDefault = $this->booleanToString($makeDefault);
        return $this;
    }

    /** @return self */
    public function customerUid($customerUid) {
        $this->customerUid = $customerUid;
        return $this;
    }

    public function _prepare() {
        return [
            "verifyCard",
            "makeDefault"
        ];
    }

}
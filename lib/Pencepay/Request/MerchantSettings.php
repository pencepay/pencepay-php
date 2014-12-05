<?php


class Pencepay_Request_MerchantSettings extends Pencepay_Request {

    protected $sendNotificationsToCustomer;
    protected $sendNotificationsToMerchant;

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

    /** @return self */
    public function sendNotificationsToCustomer($sendNotificationsToCustomer) {
        $this->sendNotificationsToCustomer = $this->booleanToString($sendNotificationsToCustomer);
        return $this;
    }

    /** @return self */
    public function sendNotificationsToMerchant($sendNotificationsToMerchant) {
        $this->sendNotificationsToMerchant = $this->booleanToString($sendNotificationsToMerchant);
        return $this;
    }

    public function _prepare() {
        return [
            "sendNotificationsToCustomer",
            "sendNotificationsToMerchant"
        ];
    }

}
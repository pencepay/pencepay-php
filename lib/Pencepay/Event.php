<?php

/**
 * @property-read string $eventType
 * @property-read string $objectUid
 * @property-read string $objectType
 * @property-read string $pending
 * @property-read string $created
 *
 * @property-read Pencepay_Customer $customer
 * @property-read Pencepay_Address $address
 * @property-read Pencepay_CreditCard $creditCard;
 * @property-read Pencepay_BankAccount $bankAccount
 * @property-read Pencepay_Paycode $paycode
 * @property-read Pencepay_Transaction $transaction
 * @property-read Pencepay_Callback $callback
 * @property-read Pencepay_Tag $tag
 * @property-read Pencepay_Merchant $merchant
 */
class Pencepay_Event extends Pencepay_Object {

    /**
     * @param string $eventUid
     * @return Pencepay_Event
     */
    public static function find($eventUid) {
        return Pencepay_Util_HttpClient::get("/event/$eventUid");
    }

    /**
     * @param Pencepay_Request_EventSearch $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/event_search", $search);
    }

    /**
     * @param string $postBody
     * @return Pencepay_Event
     */
    public static function parse($postBody, $checkAuthenticity = false) {
        $event = Pencepay_Util_Json::fromJson($postBody);
        if ($event != null && $checkAuthenticity) {
            $event = self::find($event->uid);
        }
        return $event;
    }

}
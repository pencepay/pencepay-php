<?php

/**
 * @property-read string $code
 * @property-read string $url
 * @property-read string $amount
 * @property-read string $currencyCode
 * @property-read string $orderId
 * @property-read string $description
 * @property-read string $reserveFundsOnly
 * @property-read string $saveInSafe
 * @property-read string $validUntil
 * @property-read string $created
 */
class Pencepay_Paycode extends Pencepay_Object {

    /**
     * @param Pencepay_Request_Paycode $request
     * @return Pencepay_Paycode
     */
    public static function create(Pencepay_Request_Paycode $request) {
        return Pencepay_Util_HttpClient::post("/paycode", $request);
    }

    /**
     * @param string $tagUid
     * @param Pencepay_Request_Paycode $request
     * @return Pencepay_Paycode
     */
    public static function update($tagUid, Pencepay_Request_Paycode $request) {
        return Pencepay_Util_HttpClient::post("/paycode/$tagUid", $request);
    }

    /**
     * @param string $tagUid
     * @return Pencepay_Paycode
     */
    public static function find($tagUid) {
        return Pencepay_Util_HttpClient::get("/paycode/$tagUid");
    }

    /**
     * @param Pencepay_Request_Search $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/paycode_search", $search);
    }

    /**
     * @param string $tagUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($tagUid) {
        return Pencepay_Util_HttpClient::delete("/paycode/$tagUid");
    }

}
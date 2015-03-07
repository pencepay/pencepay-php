<?php

/**
 * @property-read string $customerUid
 * @property-read string $cardholderName
 * @property-read string $brand
 * @property-read string $imageUrl
 * @property-read string $bin
 * @property-read string $issuerName
 * @property-read string $issuerCountry
 * @property-read string $last4
 * @property-read string $expiryMonth
 * @property-read string $expiryYear
 * @property-read string $fingerprint
 * @property-read string $isDefault
 * @property-read string $isExpired
 * @property-read array $customData
 * @property-read string $created
 */
class Pencepay_CreditCard extends Pencepay_Object {

    public function getMaskedNumber() {
        return $this->bin . "******" . $this->last4;
    }

    /**
     * @param string $customerUid
     * @param Pencepay_Request_CreditCard $request
     * @return Pencepay_CreditCard
     */
    public static function create($customerUid, Pencepay_Request_CreditCard $request) {
        return Pencepay_Util_HttpClient::post("/customer/$customerUid/card", $request);
    }

    /**
     * @param string $cardUid
     * @param string $customerUid
     * @param Pencepay_Request_CreditCard $request
     * @return Pencepay_CreditCard
     */
    public static function update($cardUid, $customerUid, Pencepay_Request_CreditCard $request) {
        return Pencepay_Util_HttpClient::post("/customer/$customerUid/card/$cardUid", $request);
    }

    /**
     * @param string $cardUid
     * @param string $customerUid
     * @return Pencepay_CreditCard
     */
    public static function find($cardUid, $customerUid) {
        return Pencepay_Util_HttpClient::get("/customer/$customerUid/card/$cardUid");
    }

    /**
     * @param string $customerUid
     * @param Pencepay_Request_Search $search
     * @return Pencepay_Collection
     */
    public static function search($customerUid, $search) {
        return Pencepay_Util_HttpClient::getWithParams("/customer/$customerUid/cards", $search);
    }

    /**
     * @param string $cardUid
     * @param string $customerUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($cardUid, $customerUid) {
        return Pencepay_Util_HttpClient::delete("/customer/$customerUid/card/$cardUid");
    }

}
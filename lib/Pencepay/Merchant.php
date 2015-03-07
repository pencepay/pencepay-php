<?php

/**
 * @property-read string $status
 * @property-read string $name
 * @property-read string $dba
 * @property-read string $registrationNo
 * @property-read string $taxNo
 * @property-read string $email
 * @property-read string $phone
 * @property-read string $fax
 * @property-read array $settings
 * @property-read string $parentMerchantUid
 * @property-read string $defaultCurrency
 * @property-read array $supportedCurrencies
 * @property-read Pencepay_Address $businessAddress
 * @property-read string $created
 */
class Pencepay_Merchant extends Pencepay_Object {

    /**
     * @param Pencepay_Request_Merchant $request
     * @return Pencepay_Merchant
     */
    public static function create(Pencepay_Request_Merchant $request) {
        return Pencepay_Util_HttpClient::post("/merchant", $request);
    }

    /**
     * @param string $merchantUid
     * @param Pencepay_Request_Merchant $request
     * @return Pencepay_Merchant
     */
    public static function update($merchantUid, Pencepay_Request_Merchant $request) {
        return Pencepay_Util_HttpClient::post("/merchant/$merchantUid", $request);
    }

    /**
     * @param string $merchantUid
     * @return Pencepay_Merchant
     */
    public static function cleanup($merchantUid) {
        return Pencepay_Util_HttpClient::post("/merchant/$merchantUid/cleanup");
    }

    /**
     * @param string $merchantUid
     * @return Pencepay_Merchant
     */
    public static function close($merchantUid) {
        return Pencepay_Util_HttpClient::post("/merchant/$merchantUid/close");
    }

    /**
     * @param string $merchantUid
     * @return Pencepay_Merchant
     */
    public static function find($merchantUid) {
        return Pencepay_Util_HttpClient::get("/merchant/$merchantUid");
    }

    /**
     * @param Pencepay_Request_MerchantSearch $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/merchants", $search);
    }

    /**
     * @param string $merchantUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($merchantUid) {
        return Pencepay_Util_HttpClient::delete("/merchant/$merchantUid");
    }

}
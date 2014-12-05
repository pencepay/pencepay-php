<?php

/**
 * @property-read string $customerUid
 * @property-read string $company
 * @property-read string $firstName
 * @property-read string $lastName
 * @property-read string $addressLine1
 * @property-read string $addressLine2
 * @property-read string $city
 * @property-read string $postalCode
 * @property-read string $countryCode
 * @property-read array $customData
 * @property-read string $created
 */
class Pencepay_Address extends Pencepay_Object {

    /**
     * @param string $customerUid
     * @param Pencepay_Request_Address $request
     * @return Pencepay_Address
     */
    public static function create($customerUid, Pencepay_Request_Address $request) {
        return Pencepay_Util_HttpClient::post("/customer/$customerUid/address", $request);
    }

    /**
     * @param string $addressUid
     * @param string $customerUid
     * @param Pencepay_Request_Address $request
     * @return Pencepay_Address
     */
    public static function update($addressUid, $customerUid, Pencepay_Request_Address $request) {
        return Pencepay_Util_HttpClient::post("/customer/$customerUid/address/$addressUid", $request);
    }

    /**
     * @param string $addressUid
     * @param string $customerUid
     * @return Pencepay_Address
     */
    public static function find($addressUid, $customerUid) {
        return Pencepay_Util_HttpClient::get("/customer/$customerUid/address/$addressUid");
    }

    /**
     * @param string $customerUid
     * @param Pencepay_Request_Search $search
     * @return Pencepay_Collection
     */
    public static function search($customerUid, $search) {
        return Pencepay_Util_HttpClient::getWithParams("/customer/$customerUid/address_search", $search);
    }

    /**
     * @param string $addressUid
     * @param string $customerUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($addressUid, $customerUid) {
        return Pencepay_Util_HttpClient::delete("/customer/$customerUid/address/$addressUid");
    }

}
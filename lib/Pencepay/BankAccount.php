<?php

/**
 * @property-read string $customerUid
 * @property-read string $accountHolder
 * @property-read string $accountNumber
 * @property-read string $iban
 * @property-read string $bic
 * @property-read string $countryCode
 * @property-read string $isDefault
 * @property-read array $customData
 * @property-read string $created
 */
class Pencepay_BankAccount extends Pencepay_Object {

    /**
     * @param string $customerUid
     * @param Pencepay_Request_BankAccount $request
     * @return Pencepay_BankAccount
     */
    public static function create($customerUid, Pencepay_Request_BankAccount $request) {
        return Pencepay_Util_HttpClient::post(
                "/customer/$customerUid/bank_account", $request);
    }

    /**
     * @param string $accountUid
     * @param string $customerUid
     * @param Pencepay_Request_BankAccount $request
     * @return Pencepay_BankAccount
     */
    public static function update($accountUid, $customerUid, Pencepay_Request_BankAccount $request) {
        return Pencepay_Util_HttpClient::post(
                "/customer/$customerUid/bank_account/$accountUid", $request);
    }

    /**
     * @param string $accountUid
     * @param string $customerUid
     * @return Pencepay_BankAccount
     */
    public static function find($accountUid, $customerUid) {
        return Pencepay_Util_HttpClient::get(
                "/customer/$customerUid/bank_account/$accountUid");
    }

    /**
     * @param string $customerUid
     * @param Pencepay_Request_Search $search
     * @return Pencepay_Collection
     */
    public static function search($customerUid, $search) {
        return Pencepay_Util_HttpClient::getWithParams("/customer/$customerUid/bank_account_search", $search);
    }

    /**
     * @param string $accountUid
     * @param string $customerUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($accountUid, $customerUid) {
        return Pencepay_Util_HttpClient::delete(
                "/customer/$customerUid/bank_account/$accountUid");
    }

}
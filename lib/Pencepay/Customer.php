<?php

/**
 * @property-read string $name
 * @property-read string $firstName
 * @property-read string $lastName
 * @property-read string $phone
 * @property-read string $mobile
 * @property-read string $email
 * @property-read string $description
 * @property-read array $customData
 * @property-read string $defaultBillingAddress
 * @property-read string $defaultCreditCard
 * @property-read string $defaultBankAccount
 * @property-read Pencepay_Address[] $addresses
 * @property-read Pencepay_CreditCard[] $creditCards
 * @property-read Pencepay_BankAccount[] $bankAccounts
 * @property-read array $customData
 * @property-read string $created
 */
class Pencepay_Customer extends Pencepay_Object {

    /**
     * @param Pencepay_Request_Customer $request
     * @return Pencepay_Customer
     */
    public static function create(Pencepay_Request_Customer $request) {
        return Pencepay_Util_HttpClient::post('/customer', $request);
    }

    /**
     * @param string $customerUid
     * @param Pencepay_Request_Customer $request
     * @return Pencepay_Customer
     */
    public static function update($customerUid, Pencepay_Request_Customer $request) {
        return Pencepay_Util_HttpClient::post("/customer/$customerUid", $request);
    }

    /**
     * @param string $customerUid
     * @return Pencepay_Customer
     */
    public static function find($customerUid) {
        return Pencepay_Util_HttpClient::get("/customer/$customerUid");
    }

    /**
     * @param Pencepay_Request_CustomerSearch $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/customer_search", $search);
    }

    /**
     * @param string $customerUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($customerUid) {
        return Pencepay_Util_HttpClient::delete("/customer/$customerUid");
    }

}
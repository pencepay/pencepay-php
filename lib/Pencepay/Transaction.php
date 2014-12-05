<?php

/**
 * @property-read string $id
 * @property-read string $live
 * @property-read string $amount
 * @property-read string $currencyCode
 * @property-read string $orderId
 * @property-read string $description
 * @property-read string $transactionType
 * @property-read string $status
 * @property-read string $paymentMethod
 * @property-read string $cvvResult
 * @property-read string $avsResult
 * @property-read string $approvalCode
 * @property-read string $failureCode
 * @property-read string $failureMessage
 * @property-read array $tags
 * @property-read string $cancelUrl
 * @property-read string $redirectUrl
 * @property-read Pencepay_Customer $customer
 * @property-read Pencepay_CreditCard $creditCard
 * @property-read Pencepay_Object $paymentInstructions
 * @property-read array $actions
 * @property-read array $customData
 * @property-read string $created
 */
class Pencepay_Transaction extends Pencepay_Object {

    /**
     * @param Pencepay_Request_Transaction $request
     * @return Pencepay_Transaction
     */
    public static function create(Pencepay_Request_Transaction $request) {
        return Pencepay_Util_HttpClient::post("/transaction", $request);
    }

    /**
     * @param string $transactionUid
     * @return Pencepay_Transaction
     */
    public static function find($transactionUid) {
        return Pencepay_Util_HttpClient::get("/transaction/$transactionUid");
    }

    /**
     * @param Pencepay_Request_TransactionSearch $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/transaction_search", $search);
    }

    /**
     * @param string $transactionUid
     * @return string Status of the transaction
     */
    public static function status($transactionUid) {
        return Pencepay_Util_HttpClient::get("/transaction/$transactionUid/status");
    }

    /**
     * @param string $transactionUid
     * @return Pencepay_Transaction
     */
    public static function void($transactionUid) {
        return Pencepay_Util_HttpClient::post("/transaction/$transactionUid/void");
    }

    /**
     * @param string $transactionUid
     * @param string $amount
     * @return Pencepay_Transaction
     */
    public static function capture($transactionUid, $amount) {
        $actionRequest = Pencepay_Request_TransactionAction::build()->amount($amount);
        return Pencepay_Util_HttpClient::post("/transaction/$transactionUid/capture", $actionRequest);
    }

    /**
     * @param string $transactionUid
     * @param string $amount
     * @return Pencepay_Transaction
     */
    public static function refund($transactionUid, $amount) {
        $actionRequest = Pencepay_Request_TransactionAction::build()->amount($amount);
        return Pencepay_Util_HttpClient::post("/transaction/$transactionUid/refund", $actionRequest);
    }

}
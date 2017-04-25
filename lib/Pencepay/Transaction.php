<?php

/**
 * @property-read string $id
 * @property-read string $live
 * @property-read string $amount
 * @property-read string $currencyCode
 * @property-read string $refundedAmount
 * @property-read string $orderId
 * @property-read string $description
 * @property-read string $transactionType
 * @property-read string $status
 * @property-read string $paymentMethod
 * @property-read string $cvvResult
 * @property-read string $avsStreetResult
 * @property-read string $avsPostalCodeResult
 * @property-read string $approvalCode
 * @property-read string $failureCode
 * @property-read string $failureMessage
 * @property-read array $tags
 * @property-read string $cancelUrl
 * @property-read string $redirectUrl
 * @property-read Pencepay_Store $store
 * @property-read Pencepay_Customer $customer
 * @property-read Pencepay_CreditCard $creditCard
 * @property-read Pencepay_Object $paymentInstructions
 * @property-read array $actions
 * @property-read array $customData
 * @property-read string $created
 */
class Pencepay_Transaction extends Pencepay_Object {

    public static $checkoutUrl = 'https://secure.pencepay.com/service/1.0/checkout';

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
        return Pencepay_Util_HttpClient::getWithParams("/transactions", $search);
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

    /**
     * @param Pencepay_Request_Transaction $request
     * @return array
     */
    public static function generateCheckoutParameters(Pencepay_Request_Transaction $request) {
        $required = array('amount', 'currencyCode', 'orderId', 'cancelUrl', 'redirectUrl');
        $requestParams = $request->getParams();

        // Check if required properties are set
        foreach ($required as $propertyName) {
            if (!self::arrayValueNotEmpty($propertyName, $requestParams)) {
                throw new Pencepay_Exception_InvalidRequest(
                        'Required Checkout request property not set: ' . $propertyName);
            }
        }

        $params = array();
        foreach ($requestParams as $key => $value) {
            if (self::arrayValueNotEmpty($key, $requestParams)) {
                $params[$key] = $value;
            }
        }

        $params['apiVersion'] = Pencepay_Version::get();
        $params['publicKey'] = Pencepay_Context::getPublicKey();

        $digestInput = '';
        $signatureFields = array('publicKey', 'amount', 'currencyCode', 'orderId');
        foreach ($signatureFields as $field) {
            $digestInput .= $params[$field];
        }
        $digestInput .= Pencepay_Context::getSecretKey();

        $params['signature'] = hash('sha256', $digestInput);

        return $params;
    }

    private static function arrayValueNotEmpty($propertyName, array $requestParams) {
        if (!array_key_exists($propertyName, $requestParams) || empty($requestParams[$propertyName])) {
            return false;
        }
        return true;
    }

}
<?php

/**
 * @property-read string $requestMethod
 * @property-read string $requestIpAddr
 * @property-read string $requestPath
 * @property-read string $requestParameters
 * @property-read string $requestBody
 * @property-read string $responseBody
 * @property-read string $responseCode
 * @property-read string $created
 * @property-read array $relations
 */
class Pencepay_Log extends Pencepay_Object {

    /**
     * @param string $logUid
     * @return Pencepay_Log
     */
    public static function find($logUid) {
        return Pencepay_Util_HttpClient::get("/log/$logUid");
    }

    /**
     * @param Pencepay_Request_LogSearch $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/logs", $search);
    }

}
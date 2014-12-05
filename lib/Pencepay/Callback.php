<?php

/**
 * @property-read string $url
 * @property-read string $live
 * @property-read string $created
 */
class Pencepay_Callback extends Pencepay_Object {

    /**
     * @param Pencepay_Request_Callback $request
     * @return Pencepay_Callback
     */
    public static function create(Pencepay_Request_Callback $request) {
        return Pencepay_Util_HttpClient::post("/callback", $request);
    }

    /**
     * @param string $callbackUid
     * @param Pencepay_Request_Callback $request
     * @return Pencepay_Callback
     */
    public static function update($callbackUid, Pencepay_Request_Callback $request) {
        return Pencepay_Util_HttpClient::post("/callback/$callbackUid", $request);
    }

    /**
     * @param string $callbackUid
     * @return Pencepay_Callback
     */
    public static function find($callbackUid) {
        return Pencepay_Util_HttpClient::get("/callback/$callbackUid");
    }

    /**
     * @param Pencepay_Request_Search $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/callback_search", $search);
    }

    /**
     * @param string $callbackUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($callbackUid) {
        return Pencepay_Util_HttpClient::delete("/callback/$callbackUid");
    }

}
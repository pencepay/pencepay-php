<?php

/**
 * @property-read string $name
 * @property-read string $code
 * @property-read string $created
 */
class Pencepay_Tag extends Pencepay_Object {

    /**
     * @param Pencepay_Request_Tag $request
     * @return Pencepay_Tag
     */
    public static function create(Pencepay_Request_Tag $request) {
        return Pencepay_Util_HttpClient::post("/tag", $request);
    }

    /**
     * @param string $tagUid
     * @param Pencepay_Request_Tag $request
     * @return Pencepay_Tag
     */
    public static function update($tagUid, Pencepay_Request_Tag $request) {
        return Pencepay_Util_HttpClient::post("/tag/$tagUid", $request);
    }

    /**
     * @param string $tagUid
     * @return Pencepay_Tag
     */
    public static function find($tagUid) {
        return Pencepay_Util_HttpClient::get("/tag/$tagUid");
    }

    /**
     * @param Pencepay_Request_Search $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/tags", $search);
    }

    /**
     * @param string $tagUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($tagUid) {
        return Pencepay_Util_HttpClient::delete("/tag/$tagUid");
    }

}
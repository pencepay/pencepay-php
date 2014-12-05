<?php

/**
 * @property-read string $name
 * @property-read array $permissions
 * @property-read string $created
 */
class Pencepay_Role extends Pencepay_Object {

    /**
     * @param Pencepay_Request_Role $request
     * @return Pencepay_Role
     */
    public static function create(Pencepay_Request_Role $request) {
        return Pencepay_Util_HttpClient::post("/role", $request);
    }

    /**
     * @param string $roleUid
     * @param Pencepay_Request_Role $request
     * @return Pencepay_Role
     */
    public static function update($roleUid, Pencepay_Request_Role $request) {
        return Pencepay_Util_HttpClient::post("/role/$roleUid", $request);
    }

    /**
     * @param string $roleUid
     * @return Pencepay_Role
     */
    public static function find($roleUid) {
        return Pencepay_Util_HttpClient::get("/role/$roleUid");
    }

    /**
     * @param Pencepay_Request_Search $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/role_search", $search);
    }

    /**
     * @param string $roleUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($roleUid) {
        return Pencepay_Util_HttpClient::delete("/role/$roleUid");
    }

}
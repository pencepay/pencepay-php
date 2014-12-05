<?php

/**
 * @property-read string $active
 * @property-read string $uses2FA
 * @property-read string $emailNotifications
 * @property-read string $email
 * @property-read string $firstName
 * @property-read string $lastName
 * @property-read string $mobile
 * @property-read string $loginAttempt
 * @property-read string $loginIpAddress
 * @property-read string $passwordExpiry
 * @property-read array $roles
 * @property-read string $created
 */
class Pencepay_User extends Pencepay_Object {

    /**
     * @param Pencepay_Request_User $request
     * @return Pencepay_User
     */
    public static function create(Pencepay_Request_User $request) {
        return Pencepay_Util_HttpClient::post("/user", $request);
    }

    /**
     * @param string $userUid
     * @param Pencepay_Request_User $request
     * @return Pencepay_User
     */
    public static function update($userUid, Pencepay_Request_User $request) {
        return Pencepay_Util_HttpClient::post("/user/$userUid", $request);
    }

    /**
     * @param string $userUid
     * @return Pencepay_User
     */
    public static function find($userUid) {
        return Pencepay_Util_HttpClient::get("/user/$userUid");
    }

    /**
     * @param Pencepay_Request_Search $search
     * @return Pencepay_Collection
     */
    public static function search($search) {
        return Pencepay_Util_HttpClient::getWithParams("/user_search", $search);
    }

    /**
     * @param string $userUid
     * @return Pencepay_DeleteResult
     */
    public static function delete($userUid) {
        return Pencepay_Util_HttpClient::delete("/user/$userUid");
    }

    /**
     * @param string $email
     * @return Pencepay_User
     */
    public static function resetPassword($email) {
        return Pencepay_Util_HttpClient::get("/reset_password/$email");
    }

    /**
     * @param string $userUid
     * @param string $newPassword
     * @return Pencepay_User
     */
    public static function changePassword($userUid, $newPassword) {
        $request = array('password' => $newPassword);
        return Pencepay_Util_HttpClient::postArray("/user/$userUid/change_password", $request);
    }

    /**
     * Initiates the two-factor authentication activation process for this user.
     *
     * @param string $userUid
     * @return array
     */
    public static function start2FA($userUid) {
        return Pencepay_Util_HttpClient::post("/user/$userUid/tfa");
    }

    /**
     * Enables the two-factor authentication for this user.
     *
     * @param string $userUid
     * @param string $authenticationKey
     * @param string $verificationCode
     * @return array
     */
    public static function enable2FA($userUid, $authenticationKey, $verificationCode) {
        $request = array(
            'authenticationKey' => $authenticationKey,
            'verificationCode' => $verificationCode
        );
        return Pencepay_Util_HttpClient::postArray("/user/$userUid/tfa_enable", $request);
    }

    /**
     * Disables the two-factor authentication for this user.
     *
     * @param string $userUid
     * @param string $verificationCode
     * @return array
     */
    public static function disable2FA($userUid, $verificationCode) {
        $request = array('verificationCode' => $verificationCode);
        return Pencepay_Util_HttpClient::postArray("/user/$userUid/tfa_disable", $request);
    }

}
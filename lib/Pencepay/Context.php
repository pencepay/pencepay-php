<?php

class Pencepay_Context {

    const SERVER_API_VERSION = "1";

    const DEVELOPMENT = "DEVELOPMENT";
    const PRODUCTION = "PRODUCTION";

    const GATEWAY_DEVELOPMENT = "http://localhost/api/v1";
    const GATEWAY_PRODUCTION = "https://api.pencepay.com/v1";

    private static $publicKey;
    private static $secretKey;
    private static $environment = self::PRODUCTION;

    public static function setSecretKey($secretKey) {
        self::$secretKey = $secretKey;
    }

    public static function getSecretKey() {
        if (self::$secretKey == null) {
            throw new Pencepay_Exception_InvalidRequest('Secret Key not set. Use Pencepay_Context::setSecretKey() to set it.');
        }
        return self::$secretKey;
    }

    public static function setPublicKey($publicKey) {
        self::$publicKey = $publicKey;
    }

    public static function getPublicKey() {
        if (self::$publicKey == null) {
            throw new Pencepay_Exception_InvalidRequest('Public Key not set. Use Pencepay_Context::setPublicKey() to set it.');
        }
        return self::$publicKey;
    }

    public static function setEnvironment($environment) {
        self::$environment = $environment;
    }

    public static function getBaseUrl() {
        return (self::$environment == self::PRODUCTION) ? self::GATEWAY_PRODUCTION : self::GATEWAY_DEVELOPMENT;
    }

}
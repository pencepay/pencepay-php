<?php

class Pencepay_Context {

    const SERVER_API_VERSION = 1;

    const DEVELOPMENT = "DEVELOPMENT";
    const PRODUCTION = "PRODUCTION";

    const GATEWAY_DEVELOPMENT = "http://localhost/frontend/api/v1";
    const GATEWAY_PRODUCTION = "https://api.pencepay.com/frontend/api/v1";

    private static $publicKey;
    private static $secretKey;
    private static $environment = self::PRODUCTION;

    public static function init($secretKey, $publicKey, $environment = self::PRODUCTION) {
        self::$publicKey = $publicKey;
        self::$secretKey = $secretKey;
        self::$environment = $environment;
    }

    public static function setSecretKey($secretKey) {
        self::$secretKey = $secretKey;
    }

    public static function getSecretKey() {
        return self::$secretKey;
    }

    public static function setPublicKey($publicKey) {
        self::$publicKey = $publicKey;
    }

    public static function getPublicKey() {
        return self::$publicKey;
    }

    public static function setEnvironment($environment) {
        self::$environment = $environment;
    }

    public static function getBaseUrl() {
        return (self::$environment == self::PRODUCTION) ? self::GATEWAY_PRODUCTION : self::GATEWAY_DEVELOPMENT;
    }

}
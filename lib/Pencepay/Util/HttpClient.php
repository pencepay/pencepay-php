<?php

class Pencepay_Util_HttpClient {

    public static function get($path) {
        return self::_doRequest('GET', $path);
    }

    public static function getWithParams($path, Pencepay_Request $requestObject) {
        return self::_doRequest('GET', self::buildUrl($path, $requestObject->getParams()));
    }

    public static function delete($path) {
        return self::_doRequest('DELETE', $path);
    }

    public static function post($path, Pencepay_Request $requestObject = null) {
        return self::_doRequest('POST', $path, ($requestObject != null) ? $requestObject->getParams() : array());
    }

    public static function postArray($path, array $data) {
        return self::_doRequest('POST', $path, $data);
    }

    private static function buildUrl($path, array $fields) {
        return "$path?" . self::encodeParameters($fields);
    }

    private static function _doRequest($httpVerb, $path, $requestParams = array()) {
        return self::_sendRequest($httpVerb, Pencepay_Context::getBaseUrl() . $path, $requestParams);
    }

    private static function encodeParameters(array $params, $prefix = null) {
        $r = array();
        foreach ($params as $k => $v) {
            if (is_null($v)) {
                continue;
            }

            if ($prefix && $k && !is_int($k)) {
                $k = $prefix . "[" . $k . "]";
            } else if ($prefix) {
                $k = $prefix;
            }

            if (is_array($v)) {
                $r[] = self::encodeParameters($v, $k, true);
            } else {
                $r[] = "$k=" . urlencode($v);
            }
        }
        return implode("&", $r);
    }

    private static function _sendRequest($httpMethod, $url, $requestParams = array()) {

        $curl = curl_init();
		curl_setopt($curl, CURLOPT_TIMEOUT, 120);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $httpMethod);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Accept: application/json',
			'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
			'User-Agent: Pencepay PHP Library ' . Pencepay_Version::get(),
			'X-ApiVersion: ' . Pencepay_Context::SERVER_API_VERSION
		));
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, self::_getAuthCredentials());

		if (count($requestParams) > 0) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, self::encodeParameters($requestParams));
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$responseBody = curl_exec($curl);
		$httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

        if (self::_isErrorResponse($httpStatus)) {
            switch ($httpStatus) {
                case 400:
                    $error = Pencepay_Util_Json::fromJson($responseBody);
                    throw new Pencepay_Exception_InvalidRequest($error->message, $error->code, $error->parameter);
                case 401:
                    throw new Pencepay_Exception_ApiAuthentication($responseBody);
                case 402:
                    $error = Pencepay_Util_Json::fromJson($responseBody);
                    throw new Pencepay_Exception_Processing($error->message, $error->code, $error->parameter);
                case 403:
                    $error = Pencepay_Util_Json::fromJson($responseBody);
                    throw new Pencepay_Exception_Authorization($error->message, $error->code);
                case 404:
                    $error = Pencepay_Util_Json::fromJson($responseBody);
                    throw new Pencepay_Exception_ItemNotFound($error->message, $error->code);
                case 501:
                case 502:
                    $error = Pencepay_Util_Json::fromJson($responseBody);
                    throw new Pencepay_Exception_ServerSide($error->message, $error->code);
                default:
                    throw new Pencepay_Exception_Unexpected("Unexpected response received from server", $httpStatus);
            }
        }

        return Pencepay_Util_Json::fromJson($responseBody);
	}

    private static function _isErrorResponse($httpStatus) {
        return $httpStatus != 200 && $httpStatus != 201 && $httpStatus != 202;
    }

	private static function _getAuthCredentials() {
		return Pencepay_Context::getPublicKey() . ':' . Pencepay_Context::getSecretKey();
	}

}
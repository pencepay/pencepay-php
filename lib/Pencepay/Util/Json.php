<?php

final class Pencepay_Util_Json {

	public static function fromJson($jsonData) {
		$res = json_decode($jsonData, true);
        if (!empty($res)) {
            return self::_createPencepayObject($res);
        }
        return null;
	}

    private static function _createPencepayObject($data) {
        $types = [
            'error'        => 'Pencepay_Error',
            'list'         => 'Pencepay_Collection',
            'event'        => 'Pencepay_Event',
            'log'          => 'Pencepay_Log',
            'customer'     => 'Pencepay_Customer',
            'card'         => 'Pencepay_CreditCard',
            'bankAccount'  => 'Pencepay_BankAccount',
            'address'      => 'Pencepay_Address',
            'callback'     => 'Pencepay_Callback',
            'paycode'      => 'Pencepay_Paycode',
            'tag'          => 'Pencepay_Tag',
            'transaction'  => 'Pencepay_Transaction',
            'merchant'     => 'Pencepay_Merchant',
            'user'         => 'Pencepay_User',
        ];

        if (self::isList($data)) {
            $converted = [];
            foreach ($data as $item) {
                array_push($converted, self::_createPencepayObject($item));
            }
            return $converted;

        } else if (isset($data['type']) &&
                    is_string($data['type']) &&
                    isset($types[$data['type']])) {

            $classType = !empty($types[$data['type']]) ? $types[$data['type']] : 'Pencepay_Object';
            return self::_createObject($classType, $data);

        } else {
            return $data;
        }
    }

    private static function _createObject($class, $data) {
        $obj = new $class();
        foreach ($data as $name => $value) {
            if (is_array($value)) {
                $obj[$name] = self::_createPencepayObject($value);
            } else {
                $obj[$name] = $value;
            }
        }
        return $obj;
    }

    public static function isList($data) {
        if (!is_array($data)) {
            return false;
        }

        foreach (array_keys($data) as $key) {
            if (!is_numeric($key)) {
                return false;
            }
        }
        return true;
    }

}
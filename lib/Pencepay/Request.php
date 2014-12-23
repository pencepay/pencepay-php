<?php

/**
 * Base class for all Pencepay PHP Library requests
 *
 */
abstract class Pencepay_Request {

    private $params = [];

    protected function booleanToString($value) {
        return ($value === true) ? "true" : "false";
    }

    /**
     * @return array
     */
    public function getParams() {
        $searchFields = array('filter', 'filterRange', 'filterMulti');

        $fields = $this->_prepare();
        foreach ($fields as $field) {
            // Skip null values
            if (!property_exists($this, $field) || $this->$field === null) {
                continue;
            }

            // Empty string '' is used to unset the gateway object property

            if ($this->$field instanceof Pencepay_Request) {
                $this->params[$field] = $this->$field->getParams();

            } else if (in_array($field, $searchFields)) {
                // Special handling of search filters/operators
                if (count($this->$field) > 0)
                    $this->params[$field] = json_encode($this->$field, true);

            } else {
                $this->params[$field] = $this->$field;
            }
        }
        return $this->_flattenParameters($this->params);
    }

    private function _flattenParameters(array $data) {
        $map = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
//                if (is_array($this->$key) && count($value) === count($value, COUNT_RECURSIVE)) {
//                    // Leave single-dimensional array as-is
//                    $map[$key] = $value;
//                    continue;
//                }

                $nested = [];
                if ($this->$key instanceof Pencepay_Request) {
                    foreach ($value as $ikey => $ivalue) {
                        $nested["$key.$ikey"] = $ivalue;
                    }

                } else if (self::isArrayAssoc($this->$key)) {
                    foreach ($value as $ikey => $ivalue) {
                        $nested[$key . '[' . $ikey . ']'] = $ivalue;
                    }

                } else if (!self::isArrayAssoc($this->$key)) {
                    $map[$key] = $value;
                    continue;

                } else {
                    foreach ($value as $ikey => $ivalue) {
                        $nested["$key.$ikey"] = $ivalue;
                    }
                }

                $map = array_merge($map, $this->_flattenParameters($nested));

            } else {
                $map[$key] = $value;
            }
        }
        return $map;
    }

    function isArrayAssoc($array) {
        return (bool) count(array_filter(array_keys($array), 'is_string'));
    }

    /**
     * @return array
     */
    public abstract function _prepare();

}
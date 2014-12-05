<?php

/**
 * Base class for all Pencepay PHP Library requests
 *
 */
abstract class Pencepay_Request {

    private $params = [];

    public function addParams(array $fields) {
        foreach ($fields as $field) {
            if (property_exists($this, $field)) {
                $this->params[$field] = $this->$field;
            }
        }
    }

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
            if (!property_exists($this, $field)) {
                continue;
            }

            if ($this->$field instanceof Pencepay_Request) {
                $this->params[$field] = $this->$field->getParams();

            } else if (in_array($field, $searchFields)) {
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
                $nested = [];
                foreach ($value as $ikey => $ivalue) {
                    if ($key === 'customData')
                        $nested[$key . '[' . $ikey . ']'] = $ivalue;
                    else
                        $nested["$key.$ikey"] = $ivalue;
                }
                $map = array_merge($map, $this->_flattenParameters($nested));

            } else {
                $map[$key] = $value;
            }
        }
        return $map;
    }

    /**
     * @return array
     */
    public abstract function _prepare();

}
<?php

class Pencepay_Request_Search_RangeNode {

    private $parent;

    function __construct($name, $parent) {
        $this->name = $name;
        $this->parent = $parent;
    }

    function greaterThanOrEqualTo($value) {
        $this->parent->_addRangeCriteria($this->name, 'min', $value);
        return $this->parent;
    }

    function lessThanOrEqualTo($value) {
        $this->parent->_addRangeCriteria($this->name, 'max', $value);
        return $this->parent;
    }

    function is($value) {
        $this->parent->_addRangeCriteria($this->name, 'is', $value);
        return $this->parent;
    }

    function between($min, $max) {
        $this->parent->_addRangeCriteria($this->name, 'min', $min);
        $this->parent->_addRangeCriteria($this->name, 'max', $max);
        return $this->parent;
    }

}
<?php

class Pencepay_Request_Search_MultipleValueNode {

    private $parent;

    function __construct($name, $parent) {
        $this->name = $name;
        $this->parent = $parent;
    }

    function in(array $values) {
        $this->parent->_addMultipleValueCriteria($this->name, $values);
        return $this->parent;
    }

    function is($value) {
        $this->in(array($value));
        return $this->parent;
    }

}
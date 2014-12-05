<?php

class Pencepay_Request_Search_IsNode {

    protected $parent;

    function __construct($name, $parent) {
        $this->name = $name;
        $this->parent = $parent;
    }

    function is($value) {
        $this->parent->_addCriteria($this->name, 'is', strval($value));
        return $this->parent;
    }

}

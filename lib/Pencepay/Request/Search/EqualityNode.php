<?php

class Pencepay_Request_Search_EqualityNode extends Pencepay_Request_Search_IsNode {

    function isNot($value) {
        $this->parent->_addCriteria($this->name, 'isNot', strval($value));
        return $this->parent;
    }

}
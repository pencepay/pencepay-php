<?php

class Pencepay_Request_Search_PartialMatchNode extends Pencepay_Request_Search_EqualityNode {

    function startsWith($value) {
        $this->parent->_addCriteria($this->name, 'startsWith', strval($value));
        return $this->parent;
    }

    function endsWith($value) {
        $this->parent->_addCriteria($this->name, 'endsWith', strval($value));
        return $this->parent;
    }

}
<?php

class Pencepay_Request_Search_KeyValueNode {

    function __construct($name) {
        $this->name = $name;
        $this->searchTerm = True;
    }

    function is($value) {
        $this->searchTerm = $value;
        return $this;
    }

    function toParam() {
        return $this->searchTerm;
    }

}
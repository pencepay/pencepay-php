<?php

class Pencepay_Request_Search_TextNode extends Pencepay_Request_Search_PartialMatchNode {

    function contains($value) {
        $this->parent->_addCriteria($this->name, 'contains', strval($value));
        return $this->parent;
    }

}
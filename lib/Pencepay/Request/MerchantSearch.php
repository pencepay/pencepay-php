<?php

class Pencepay_Request_MerchantSearch extends Pencepay_Request_Search {

    /** @return self */
    public static function build() {
        return new Pencepay_Request_MerchantSearch;
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function name() {
        return new Pencepay_Request_Search_TextNode("name", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function dba() {
        return new Pencepay_Request_Search_TextNode("dba", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function status() {
        return new Pencepay_Request_Search_MultipleValueNode("status", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function registrationNo() {
        return new Pencepay_Request_Search_TextNode("registrationNo", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function countryCode() {
        return new Pencepay_Request_Search_MultipleValueNode("countryCode", $this);
    }

    /** @return Pencepay_Request_Search_RangeNode */
    public function created() {
        return new Pencepay_Request_Search_RangeNode("created", $this);
    }

    /** @return self */
    public function limit($limit) {
        $this->limit = $limit;
        return $this;
    }

    /** @return self */
    public function before($before) {
        $this->before = $before;
        return $this;
    }

    /** @return self */
    public function after($after) {
        $this->after = $after;
        return $this;
    }

}
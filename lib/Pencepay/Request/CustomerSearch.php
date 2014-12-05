<?php

class Pencepay_Request_CustomerSearch extends Pencepay_Request_Search {

    /** @return self */
    public static function build() {
        return new Pencepay_Request_CustomerSearch;
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function uids() {
        return new Pencepay_Request_Search_MultipleValueNode("uids", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function name() {
        return new Pencepay_Request_Search_TextNode("name", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function firstName() {
        return new Pencepay_Request_Search_TextNode("firstName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function lastName() {
        return new Pencepay_Request_Search_TextNode("lastName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function email() {
        return new Pencepay_Request_Search_TextNode("email", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function phone() {
        return new Pencepay_Request_Search_TextNode("phone", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function mobile() {
        return new Pencepay_Request_Search_TextNode("mobile", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function description() {
        return new Pencepay_Request_Search_TextNode("description", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function addressCompany() {
        return new Pencepay_Request_Search_TextNode("addressCompany", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function addressFirstName() {
        return new Pencepay_Request_Search_TextNode("addressFirstName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function addressLastName() {
        return new Pencepay_Request_Search_TextNode("addressLastName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function addressLine1() {
        return new Pencepay_Request_Search_TextNode("addressLine1", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function addressLine2() {
        return new Pencepay_Request_Search_TextNode("addressLine2", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function addressCity() {
        return new Pencepay_Request_Search_TextNode("addressCity", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function addressPostalCode() {
        return new Pencepay_Request_Search_TextNode("addressPostalCode", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function addressCountryCode() {
        return new Pencepay_Request_Search_MultipleValueNode("addressCountryCode", $this);
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
<?php

class Pencepay_Request_TransactionSearch extends Pencepay_Request_Search {

    /** @return self */
    public static function build() {
        return new Pencepay_Request_TransactionSearch;
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function ids() {
        return new Pencepay_Request_Search_MultipleValueNode("ids", $this);
    }

    /** @return Pencepay_Request_Search_RangeNode */
    public function amount() {
        return new Pencepay_Request_Search_RangeNode("amount", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function currencyCode() {
        return new Pencepay_Request_Search_TextNode("currencyCode", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function status() {
        return new Pencepay_Request_Search_MultipleValueNode("status", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function paymentMethod() {
        return new Pencepay_Request_Search_MultipleValueNode("paymentMethod", $this);
    }

    /** @return Pencepay_Request_Search_IsNode */
    public function approvalCode() {
        return new Pencepay_Request_Search_IsNode("approvalCode", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function live() {
        return new Pencepay_Request_Search_MultipleValueNode("live", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function tags() {
        return new Pencepay_Request_Search_MultipleValueNode("tags", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function customerUids() {
        return new Pencepay_Request_Search_MultipleValueNode("customerUids", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function customerName() {
        return new Pencepay_Request_Search_TextNode("customerName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function customerFirstName() {
        return new Pencepay_Request_Search_TextNode("customerFirstName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function customerLastName() {
        return new Pencepay_Request_Search_TextNode("customerLastName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function customerEmail() {
        return new Pencepay_Request_Search_TextNode("customerEmail", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function customerPhone() {
        return new Pencepay_Request_Search_TextNode("customerPhone", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function customerMobile() {
        return new Pencepay_Request_Search_TextNode("customerMobile", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function billingCompany() {
        return new Pencepay_Request_Search_TextNode("billingCompany", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function billingFirstName() {
        return new Pencepay_Request_Search_TextNode("billingFirstName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function billingLastName() {
        return new Pencepay_Request_Search_TextNode("billingLastName", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function billingLine1() {
        return new Pencepay_Request_Search_TextNode("billingLine1", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function billingLine2() {
        return new Pencepay_Request_Search_TextNode("billingLine2", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function billingCity() {
        return new Pencepay_Request_Search_TextNode("billingCity", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function billingPostalCode() {
        return new Pencepay_Request_Search_TextNode("billingPostalCode", $this);
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function billingCountryCode() {
        return new Pencepay_Request_Search_MultipleValueNode("billingCountryCode", $this);
    }

    /** @return Pencepay_Request_Search_TextNode */
    public function cardholderName() {
        return new Pencepay_Request_Search_TextNode("cardholderName", $this);
    }

    /** @return Pencepay_Request_Search_IsNode */
    public function cardBin() {
        return new Pencepay_Request_Search_IsNode("cardBin", $this);
    }

    /** @return Pencepay_Request_Search_IsNode */
    public function cardNumberLast4() {
        return new Pencepay_Request_Search_IsNode("cardNumberLast4", $this);
    }

    /** @return Pencepay_Request_Search_EqualityNode */
    public function cardExpiryDate() {
        return new Pencepay_Request_Search_EqualityNode("cardExpiryDate", $this);
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
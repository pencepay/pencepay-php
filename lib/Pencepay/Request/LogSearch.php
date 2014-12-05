<?php

class Pencepay_Request_LogSearch extends Pencepay_Request_Search {

    /** @return self */
    public static function build() {
        return new Pencepay_Request_LogSearch;
    }

    /** @return Pencepay_Request_Search_MultipleValueNode */
    public function objectUid() {
        return new Pencepay_Request_Search_MultipleValueNode("objectUid", $this);
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
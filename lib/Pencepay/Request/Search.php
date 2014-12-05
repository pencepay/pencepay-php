<?php

class Pencepay_Request_Search extends Pencepay_Request {

    protected $limit;
    protected $before;
    protected $after;

    protected $filter = array();
    protected $filterRange = array();
    protected $filterMulti = array();

    public function _addCriteria($name, $operator, $value) {
        if (!key_exists($name, $this->filter)) {
            $this->filter[$name] = array($operator => $value);
        } else {
            $this->filter[$name][$operator] = $value;
        }
    }

    public function _addRangeCriteria($name, $operator, $value) {
        if (!key_exists($name, $this->filterRange)) {
            $this->filterRange[$name] = array($operator => $value);
        } else {
            $this->filterRange[$name][$operator] = $value;
        }
    }

    public function _addMultipleValueCriteria($name, array $values) {
        $this->filterRange[$name] = $values;
    }

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Search;
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

    public function _prepare() {
        return [
            "limit",
            "before",
            "after",
            "filter",
            "filterRange",
            "filterMulti"
        ];
    }

}
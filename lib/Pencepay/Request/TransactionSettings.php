<?php


class Pencepay_Request_TransactionSettings extends Pencepay_Request {

    protected $reserveFundsOnly;
    protected $saveInSafe;
    protected $locale;

    private $parent;

    /**
     * @param Pencepay_Request_Transaction
     */
    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_Transaction */
    public function done() {
        return $this->parent;
    }

    /** @return self */
    public function reserveFundsOnly($reserveFundsOnly) {
        $this->reserveFundsOnly = $this->booleanToString($reserveFundsOnly);
        return $this;
    }

    /** @return self */
    public function saveInSafe($saveInSafe) {
        $this->saveInSafe = $this->booleanToString($saveInSafe);
        return $this;
    }

    /** @return self */
    public function locale($locale) {
        $this->locale = $locale;
        return $this;
    }

    public function _prepare() {
        return [
            "reserveFundsOnly",
            "saveInSafe",
            "locale"
        ];
    }

}
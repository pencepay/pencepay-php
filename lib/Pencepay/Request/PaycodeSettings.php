<?php


class Pencepay_Request_PaycodeSettings extends Pencepay_Request {

    protected $reserveFundsOnly;
    protected $saveInSafe;

    private $parent;

    /**
     * @param Pencepay_Request_Paycode
     */
    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_Paycode */
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

    public function _prepare() {
        return [
            "reserveFundsOnly",
            "saveInSafe"
        ];
    }

}
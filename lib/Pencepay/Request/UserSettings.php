<?php


class Pencepay_Request_UserSettings extends Pencepay_Request {

    protected $emailNotifications;

    private $parent;

    /**
     * @param Pencepay_Request_User
     */
    function __construct($parent) {
        $this->parent = $parent;
    }

    /* @var Pencepay_Request_User */
    public function done() {
        return $this->parent;
    }

    /** @return self */
    public function emailNotifications($emailNotifications) {
        $this->emailNotifications = $this->booleanToString($emailNotifications);
        return $this;
    }

    public function _prepare() {
        return [
            "emailNotifications"
        ];
    }

}
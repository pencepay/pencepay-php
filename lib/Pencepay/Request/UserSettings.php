<?php


class Pencepay_Request_UserSettings extends Pencepay_Request {

    protected $emailNotifications;
    protected $use2FA;

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

    /** @return self */
    public function use2FA($use2FA) {
        $this->use2FA = $this->booleanToString($use2FA);
        return $this;
    }

    public function _prepare() {
        return [
            "emailNotifications",
            "saveInSafe",
            "locale"
        ];
    }

}
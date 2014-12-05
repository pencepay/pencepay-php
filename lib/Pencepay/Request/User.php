<?php

class Pencepay_Request_User extends Pencepay_Request {

	protected $active;
	protected $email;
	protected $firstName;
	protected $lastName;
	protected $mobile;
	protected $language;
	protected $roles = [];
	protected $settings;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_User;
    }

    /** @return self */
    public function active($active) {
        $this->active = $this->booleanToString($active);
        return $this;
    }

    /** @return self */
    public function email($email) {
        $this->email = $email;
        return $this;
    }

    /** @return self */
    public function firstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    /** @return self */
    public function lastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    /** @return self */
    public function mobile($mobile) {
        $this->mobile = $mobile;
        return $this;
    }

    /** @return self */
    public function language($language) {
        $this->language = $language;
        return $this;
    }

    /** @return self */
    public function role($role) {
        $this->roles[] = $role;
        return $this;
    }

    /** @return self */
    public function roles(array $roles) {
        $this->roles = $roles;
        return $this;
    }

    /** @return Pencepay_Request_UserSettings */
    public function settings() {
        $this->settings = new Pencepay_Request_UserSettings($this);
        return $this->settings;
    }

    public function _prepare() {
        return [
            "active",
            "email",
            "firstName",
            "lastName",
            "mobile",
            "language",
            "roles",
            "settings"
        ];
    }

}
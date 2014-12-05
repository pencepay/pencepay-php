<?php

class Pencepay_Request_Role extends Pencepay_Request {

	protected $name;
	protected $permissions;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Role;
    }

    /** @return self */
    public function name($name) {
        $this->name = $name;
        return $this;
    }

    /** @return self */
    public function permission($permissionName, $enabled = true) {
        $this->permissions[$permissionName] = $this->booleanToString($enabled);
        return $this;
    }

    /** @return self */
    public function permissions(array $permissions) {
        $this->permissions = $permissions;
        return $this;
    }

    public function _prepare() {
        return [
            "name",
            "permissions"
        ];
    }

}
<?php

class Pencepay_Request_Tag extends Pencepay_Request {

	protected $name;
	protected $code;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Tag;
    }

    /** @return self */
    public function name($name) {
        $this->name = $name;
        return $this;
    }

    /** @return self */
    public function code($code) {
        $this->code = $code;
        return $this;
    }

    public function _prepare() {
        return [
            "name",
            "code"
        ];
    }

}
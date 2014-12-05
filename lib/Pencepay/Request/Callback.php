<?php

class Pencepay_Request_Callback extends Pencepay_Request {

	protected $url;
	protected $live;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Callback;
    }

    /** @return self */
    public function url($url) {
        $this->url = $url;
        return $this;
    }

    /** @return self */
    public function live($live) {
        $this->live = $live;
        return $this;
    }

    public function _prepare() {
        return [
            "url",
            "live"
        ];
    }

}
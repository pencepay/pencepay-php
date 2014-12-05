<?php

class Pencepay_Request_TransactionAction extends Pencepay_Request {

    protected $amount;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_TransactionAction;
    }

    /** @return self */
    public function amount($amount) {
        $this->amount = $amount;
        return $this;
    }

    public function _prepare() {
        return [
            "amount"
        ];
    }

}
<?php

class Pencepay_Request_Address extends Pencepay_Request {

	protected $company;
	protected $firstName;
	protected $lastName;
	protected $addressLine1;
	protected $addressLine2;
	protected $city;
	protected $postalCode;
	protected $countryCode;
	protected $customData;

    /** @return self */
    public static function build() {
        return new Pencepay_Request_Address;
    }

    /** @return self */
    public function company($company) {
        $this->company = $company;
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
    public function addressLine1($addressLine1) {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    /** @return self */
    public function addressLine2($addressLine2) {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /** @return self */
    public function postalCode($postalCode) {
        $this->postalCode = $postalCode;
        return $this;
    }

    /** @return self */
    public function city($city) {
        $this->city = $city;
        return $this;
    }

    /** @return self */
    public function countryCode($countryCode) {
        $this->countryCode = $countryCode;
        return $this;
    }

    /** @return self */
    public function customData(array $customData) {
        $this->customData = $customData;
        return $this;
    }

    public function _prepare() {
        return [
            "company",
            "firstName",
            "lastName",
            "addressLine1",
            "addressLine2",
            "city",
            "postalCode",
            "countryCode",
            "customData"
        ];
    }

}
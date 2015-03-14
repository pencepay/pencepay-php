<?php

/**
 * Holds information about the Pencepay PHP Library version.
 */
final class Pencepay_Version {

	const MAJOR = 1;
	const MINOR = 0;
	const PATCH = 4;

	protected function __construct() {
	}

	public static function get() {
		return self::MAJOR . '.' . self::MINOR . '.' . self::PATCH;
	}

}
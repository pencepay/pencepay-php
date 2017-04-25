<?php

set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__)));

require_once('Pencepay/Version.php');
require_once('Pencepay/Util/Json.php');
require_once('Pencepay/Exception.php');
require_once('Pencepay/Exception/ApiAuthentication.php');
require_once('Pencepay/Exception/ApiConnection.php');
require_once('Pencepay/Exception/Authorization.php');
require_once('Pencepay/Exception/InvalidRequest.php');
require_once('Pencepay/Exception/ItemNotFound.php');
require_once('Pencepay/Exception/Processing.php');
require_once('Pencepay/Exception/ServerSide.php');
require_once('Pencepay/Exception/Unexpected.php');
require_once('Pencepay/Context.php');
require_once('Pencepay/Util/HttpClient.php');
require_once('Pencepay/Request.php');
require_once('Pencepay/Request/Search.php');
require_once('Pencepay/Request/Search/IsNode.php');
require_once('Pencepay/Request/Search/EqualityNode.php');
require_once('Pencepay/Request/Search/KeyValueNode.php');
require_once('Pencepay/Request/Search/MultipleValueNode.php');
require_once('Pencepay/Request/Search/PartialMatchNode.php');
require_once('Pencepay/Request/Search/RangeNode.php');
require_once('Pencepay/Request/Search/TextNode.php');
require_once('Pencepay/Request/Address.php');
require_once('Pencepay/Request/Customer.php');
require_once('Pencepay/Request/CustomerSearch.php');
require_once('Pencepay/Request/CustomerAddress.php');
require_once('Pencepay/Request/CreditCard.php');
require_once('Pencepay/Request/CreditCardAddress.php');
require_once('Pencepay/Request/CreditCardSettings.php');
require_once('Pencepay/Request/EventSearch.php');
require_once('Pencepay/Request/Transaction.php');
require_once('Pencepay/Request/TransactionSearch.php');
require_once('Pencepay/Request/TransactionCreditCard.php');
require_once('Pencepay/Request/TransactionAddress.php');
require_once('Pencepay/Request/TransactionSettings.php');
require_once('Pencepay/Request/TransactionAction.php');
require_once('Pencepay/Request/LogSearch.php');
require_once('Pencepay/Request/MerchantSearch.php');
require_once('Pencepay/Request/Paycode.php');
require_once('Pencepay/Request/PaycodeSettings.php');
require_once('Pencepay/Request/Tag.php');
require_once('Pencepay/Request/BankAccount.php');
require_once('Pencepay/Request/Merchant.php');
require_once('Pencepay/Request/MerchantAddress.php');
require_once('Pencepay/Request/MerchantSettings.php');
require_once('Pencepay/Request/Callback.php');
require_once('Pencepay/Request/User.php');
require_once('Pencepay/Request/UserSettings.php');
require_once('Pencepay/Request/Role.php');
require_once('Pencepay/Object.php');
require_once('Pencepay/Error.php');
require_once('Pencepay/DeleteResult.php');
require_once('Pencepay/Collection.php');
require_once('Pencepay/Customer.php');
require_once('Pencepay/Address.php');
require_once('Pencepay/CreditCard.php');
require_once('Pencepay/Transaction.php');
require_once('Pencepay/Paycode.php');
require_once('Pencepay/Tag.php');
require_once('Pencepay/Store.php');
require_once('Pencepay/BankAccount.php');
require_once('Pencepay/Merchant.php');
require_once('Pencepay/Callback.php');
require_once('Pencepay/Log.php');
require_once('Pencepay/Event.php');
require_once('Pencepay/User.php');
require_once('Pencepay/Role.php');


if (version_compare(PHP_VERSION, '5.4', '<')) {
	throw new Pencepay_Exception('PHP version >= 5.4 required');
}

function validateDependencies() {
	$requiredExtensions = array('openssl', 'dom', 'hash', 'curl');
	foreach ($requiredExtensions AS $ext) {
		if (!extension_loaded($ext)) {
			throw new Pencepay_Exception("Pencepay Library requires '$ext' extension.");
		}
	}
}

validateDependencies();

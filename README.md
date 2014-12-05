# Pencepay PHP Library

This is a server-side library for Pencepay gateway. You can [signup](https://pencepay.com) to Pencepay at and then use this library to integrate.

## Dependencies

PHP version >= 5.2.1 is required.

The following PHP extensions are required:

* curl
* dom
* hash
* openssl

## Installation

You can install this library via [Composer](http://getcomposer.org), by adding this to your composer.json:

    {
      "require": {
        "pencepay/pencepay-php": "1.*"
      }
    }

To install, run the command:

    composer.phar install

If you wish to use the library without Composer, you can install it manually

    git clone https://github.com/pencepay/pencepay-php


## Using the Pencepay Library

If you are using Composer, include the Library in your project with:

    require_once('vendor/autoload.php');

or if you are not using Composer, just require the library directly:

    require_once('/path/to/pencepay-php/lib/Pencepay.php');


```php
Pencepay_Context::setPublicKey("your-public-key");
Pencepay_Context::setSecretKey("your-secret-key");
Pencepay_Context::setEnvironment(Pencepay_Context::PRODUCTION);

$transaction = Pencepay_Transaction::create(
    Pencepay_Request_Transaction::build()
        ->orderId('123456')
        ->amount(10.99)
        ->currencyCode('EUR')
        ->creditCard()
            ->cardholderName('John Hancock')
            ->number('4350100010001002')
            ->cvv('313')
            ->expiryMonth(12)
            ->expiryYear(2016)
            ->done()
);

print_r($transaction);
```

## Documentation

 * See the [Full Library documentation](https://pencepay.com/docs)

## License

See the LICENSE file.

## TODO

Upload tests.

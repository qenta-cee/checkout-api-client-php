# Checkout Api Client
[![license](https://img.shields.io/badge/license-GPLv2-blue.svg)](https://github.com/wirecard/checkout-api-client-php/blob/master/LICENSE)
[![PHP v5.6](https://img.shields.io/badge/php-5.6-yellow.svg)](http://www.php.net)

Checkout api client specific implementations in PHP. For example communication with rest api.

## Installation:
`composer install` installs all required dependencies

## Coding Standards:
Code in this module should follow the coding standards defined in PSR-1 and PSR-2 (http://www.php-fig.org/psr/)

## Project structure
For the instantiation of objects Zend\ServiceManager is used.
You can replace it with the service manager or dependency injection of your choice.

### PHPCS
`composer cs-check` checks for fulfillment of coding standards
`composer cs-fix` fixed code according to coding standards

## Test suites:
### PHPUnit
`composer test` runs full testsuite
`composer test-reports` runs full testsuite and creates coverage reports

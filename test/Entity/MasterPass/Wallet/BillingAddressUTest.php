<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\AbstractAddress;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\BillingAddress;

class BillingAddressUTest extends \PHPUnit_Framework_TestCase {
    protected $entity;

    public function setUp() {
        $this->entity = new BillingAddress();
    }

    public function testIsSubClassOfAbstractAddress() {
        $this->assertTrue($this->entity instanceof AbstractAddress);
    }
}
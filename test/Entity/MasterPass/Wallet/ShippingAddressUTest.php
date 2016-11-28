<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\ShippingAddress;

class ShippingAddressUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ShippingAddress
     */
    protected $entity;

    public function setUp() {
        $this->entity = new ShippingAddress();
    }

    public function testSetRecipientName() {
        $this->entity->setRecipientName('Jane Doe');
        $this->assertAttributeEquals('Jane Doe', 'recipientName', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetRecipientName
     * @param ShippingAddress $entity
     */
    public function testGetRecipientName($entity) {
        $this->assertEquals('Jane Doe', $entity->getRecipientName());
    }

    public function testSetRecipientPhoneNumber() {
        $this->entity->setRecipientPhoneNumber('US+1123456789');
        $this->assertAttributeEquals('US+1123456789', 'recipientPhoneNumber', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetRecipientPhoneNumber
     * @param ShippingAddress $entity
     */
    public function testGetRecipientPhoneNumber($entity) {
        $this->assertEquals('US+1123456789', $entity->getRecipientPhoneNumber());
    }
}
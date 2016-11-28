<?php
namespace WirecardCheckoutApiClientTest\Entity;

use WirecardCheckoutApiClient\Entity\Amount;

class AmountUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Amount
     */
    protected $entity;

    public function setUp()
    {
        $this->entity = new Amount();
    }

    public function testSetAmount()
    {
        $this->entity->setAmount('42');
        $this->assertAttributeEquals(42, 'amount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAmount
     * @param Amount $entity
     */
    public function testGetAmount(Amount $entity)
    {
        $this->assertEquals('42', $entity->getAmount());
    }

    public function testSetCurrency()
    {
        $this->entity->setCurrency('EUR');
        $this->assertAttributeEquals('EUR', 'currency', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCurrency
     * @param Amount $entity
     */
    public function testGetCurrency(Amount $entity)
    {
        $this->assertEquals('EUR', $entity->getCurrency());
    }
}
<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card;

class WalletUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Wallet
     */
    protected $entity;

    /**
     * @var Basket
     */
    protected $basket;

    public function setUp()
    {
        $this->entity = new Wallet();
        $this->basket = new Basket();
        $this->basket->setTotalAmount(new Amount());
    }

    public function testSetId()
    {
        $this->entity->setId(__METHOD__);
        $this->assertAttributeEquals(__METHOD__, 'id', $this->entity);
        return $this->entity;
    }


    /**
     * @depends testSetId
     * @param Wallet $entity
     */
    public function testGetId($entity)
    {
        $this->assertEquals('WirecardCheckoutApiClient\Entity\MasterPass\WalletUTest::testSetId', $entity->getId());
    }

    public function testSetOriginUrl()
    {
        $this->entity->setOriginUrl('http://www.example.com');
        $this->assertAttributeEquals('http://www.example.com', 'originUrl', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetOriginUrl
     * @param Wallet $entity
     */
    public function testGetOriginUrl($entity)    {
        $this->assertEquals('http://www.example.com', $entity->getOriginUrl());
    }

    public function testSetBasket() {
        $this->entity->setBasket($this->basket);
        $this->assertAttributeEquals($this->basket, 'basket', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetBasket
     * @param Wallet $wallet
     */
    public function testGetBasket(Wallet $wallet) {
        $this->assertEquals($this->basket, $wallet->getBasket());
    }

    public function testSetCard() {
        $this->entity->setCard(new Card());
        $this->assertAttributeEquals(new Card(), 'card', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCard
     * @param Wallet $entity
     */
    public function testGetCard($entity) {
        $this->assertEquals(new Card(), $entity->getCard());
    }

    public function testToString() {
        $this->entity->setId(__METHOD__);
        $this->assertEquals(__METHOD__, (string)$this->entity);
    }
}
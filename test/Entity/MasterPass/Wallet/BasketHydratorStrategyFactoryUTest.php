<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\BasketHydratorStrategyFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

class BasketHydratorStrategyFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BasketHydratorStrategyFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp()
    {
        $this->factory = new BasketHydratorStrategyFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->with($this->equalTo('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BasketHydrator'))->willReturn(new ClassMethods());
    }

    public function testCreateServiceReturnsBasketHydratorStrategy()
    {
        $this->assertEquals('WirecardCheckoutApiClient\Entity\EntityHydratorStrategy', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceSetsBasketHydratorFromServiceManager()
    {
        $this->assertAttributeEquals(new ClassMethods(), 'hydrator', $this->factory->createService($this->serviceLocator));
    }

    public function testCreateServiceSetsPrototype()
    {
        $this->assertAttributeEquals(new Basket(), 'prototype', $this->factory->createService($this->serviceLocator));
    }

}
<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\Item;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\ItemHydratorStrategyFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

class ItemHydratorStrategyFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ItemHydratorStrategyFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp()
    {
        $this->factory = new ItemHydratorStrategyFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->with($this->equalTo('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydrator'))->willReturn(new ClassMethods());
    }

    public function testCreatServiceReturnsItemHydratorStrategy()
    {
        $this->assertEquals('WirecardCheckoutApiClient\Entity\EntityHydratorStrategy', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceSetsPrototype()
    {
        $this->assertAttributeEquals(new Item(), 'prototype', $this->factory->createService($this->serviceLocator));
    }

    public function testCreateServiceSetsHydratorFromServiceManager()
    {
        $this->assertAttributeEquals(new ClassMethods(), 'hydrator', $this->factory->createService($this->serviceLocator));
    }
}
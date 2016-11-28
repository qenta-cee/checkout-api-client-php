<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\Item;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\ItemCollectionFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

class ItemCollectionFactoryUTest extends \PHPUnit_Framework_TestCase
{
    protected $factory;
    protected $serviceLocator;

    public function setUp()
    {
        $this->factory = new ItemCollectionFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->with($this->equalTo('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydrator'))->willReturn(new ClassMethods());
    }

    public function testCreateServiceReturnsItemCollection()
    {
        $this->assertEquals('WirecardCheckoutApiClient\Entity\Collection', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceSetsItemPrototype()
    {
        $this->assertAttributeEquals(new Item(), 'prototype', $this->factory->createService($this->serviceLocator));
    }

    public function testCreateServiceSetsClassMethodHydrator()
    {
        $hydrator = new ClassMethods();
        $this->serviceLocator->expects($this->once())->method('get')->with($this->equalTo('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydrator'))->willReturn(new ClassMethods());
        $this->assertAttributeEquals($hydrator, 'hydrator', $this->factory->createService($this->serviceLocator));
    }
}
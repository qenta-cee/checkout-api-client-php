<?php
namespace WirecardCheckoutApiClientTest\Entity;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\AmountHydratorStrategyFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

class AmountHydratorStrategyFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AmountHydratorStrategyFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp()
    {
        $this->factory = new AmountHydratorStrategyFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->with('WirecardCheckoutApiClient\\Entity\\MasterPass\\AmountHydrator')->willReturn(new ClassMethods());
    }

    public function testCreateServiceReturnsAmountHydratorStrategy()
    {
        $this->assertEquals('WirecardCheckoutApiClient\Entity\EntityHydratorStrategy', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceSetsAmountHydratorFromServiceManager()
    {
        $this->assertAttributeEquals(new ClassMethods(), 'hydrator', $this->factory->createService($this->serviceLocator));
    }

    public function testCreateServiceSetsPrototype()
    {
        $this->assertAttributeEquals(new Amount(), 'prototype', $this->factory->createService($this->serviceLocator));
    }
}
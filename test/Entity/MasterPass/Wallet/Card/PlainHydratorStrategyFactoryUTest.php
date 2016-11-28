<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Card;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card\Plain;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card\PlainHydratorStrategyFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

class PlainHydratorStrategyFactoryUTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var PlainHydratorStrategyFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp() {
        $this->factory = new PlainHydratorStrategyFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->willReturn(new ClassMethods());
    }

    public function testCreateServiceReturnsEntityHydratorStrategy() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertEquals('WirecardCheckoutApiClient\\Entity\\EntityHydratorStrategy', get_class($service));
    }

    public function testCreateServiceSetsHydrator() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals(new ClassMethods(), 'hydrator', $service);
    }

    public function testCreateServiceSetsPrototype() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals(new Plain(), 'prototype', $service);
    }
}
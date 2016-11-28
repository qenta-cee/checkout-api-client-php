<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\CardHydratorStrategyFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

class CardHydratorStrategyFactoryUTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var CardHydratorStrategyFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp() {
        $this->factory = new CardHydratorStrategyFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->with($this->equalTo('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\CardHydrator'))->willReturn(new ClassMethods());
    }

    public function testCreateServiceReturnsCardHydratorStrategy() {
        $this->assertEquals('WirecardCheckoutApiClient\Entity\EntityHydratorStrategy', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceSetsHydrator() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals(new ClassMethods(), 'hydrator', $service);
    }

    public function testCreateServiceSetsPrototype() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals(new Card(), 'prototype', $service);
    }
}
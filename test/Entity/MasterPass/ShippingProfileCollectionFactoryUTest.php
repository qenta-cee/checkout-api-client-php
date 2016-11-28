<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass;

use WirecardCheckoutApiClient\Entity\MasterPass\ShippingProfile;
use WirecardCheckoutApiClient\Entity\MasterPass\ShippingProfileCollectionFactory;
use WirecardCheckoutApiClient\Service\MasterPass\ShippingProfileResourceService;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\Hydrator\ClassMethods;

class ShippingProfileCollectionFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ShippingProfileCollectionFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp()
    {
        $this->factory = new ShippingProfileCollectionFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->willReturn(new ClassMethods());
    }

    public function testCreateServiceReturnsCollection()
    {
        $this->assertEquals('WirecardCheckoutApiClient\Entity\Collection', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceReturnedCollectionHasShippingProfilePrototype()
    {
        $this->assertAttributeEquals(new ShippingProfile(), 'prototype', $this->factory->createService($this->serviceLocator));
    }

    public function testCreateServiceReturnedCollectionHasClassMethodHydrator() {
        $this->assertAttributeEquals(new ClassMethods(), 'hydrator', $this->factory->createService($this->serviceLocator));
    }
}
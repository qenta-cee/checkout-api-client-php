<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\Collection;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\ItemCollectionHydratorStrategyFactory;
use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class ItemCollectionHydratorStrategyFactoryUTest extends \PHPUnit_Framework_TestCase
{
    protected $factory;

    protected $serviceLocator;

    public function setUp()
    {
        $this->factory = new ItemCollectionHydratorStrategyFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $collection = $this->getMockBuilder('WirecardCheckoutApiClient\Entity\Collection')->disableOriginalConstructor()->getMock();
        $this->serviceLocator->method('get')->with($this->equalTo('WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\ItemCollection'))->willReturn($collection);
    }

    public function testCreateServiceReturnsItemCollectionHydratorStrategy()
    {
        $this->assertEquals('WirecardCheckoutApiClient\Entity\CollectionHydratorStrategy', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceSetsItemCollectionFromServiceManager()
    {
        $collection = $this->getMockBuilder('WirecardCheckoutApiClient\Entity\Collection')->disableOriginalConstructor()->getMock();
        $this->serviceLocator->expects($this->once())->method('get')->with($this->equalTo('WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\ItemCollection'))->willReturn($collection);
        $this->assertAttributeEquals($collection, 'collection', $this->factory->createService($this->serviceLocator));
    }
}
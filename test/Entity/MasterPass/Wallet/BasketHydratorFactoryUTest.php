<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\BasketHydratorFactory;
use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class BasketHydratorFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BasketHydratorFactory
     */
    protected $factory;

    protected $serviceLocator;

    protected $hydratorStrategy;

    protected $itemCollectionHydratorStrategy;

    public function setUp()
    {
        $this->factory = new BasketHydratorFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->hydratorStrategy = new DefaultStrategy();

        $this->serviceLocator->method('get')->withConsecutive(
            array($this->equalTo('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy')),
            array($this->equalTo('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemCollectionHydratorStrategy'))
        )->willReturn($this->hydratorStrategy);

    }

    public function testCreateServiceReturnsBasketHydrator()
    {
        $this->assertEquals('Zend\Stdlib\Hydrator\ClassMethods', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateSetsTotalAmountHydratorStrategyFromServiceManager()
    {
        $this->assertEquals('Zend\Stdlib\Hydrator\Strategy\DefaultStrategy', get_class($this->factory->createService($this->serviceLocator)->getStrategy('totalAmount')));
    }

    public function testCreateSetsItemsHydratorStrategyFromServiceManager()
    {
        $this->assertEquals('Zend\Stdlib\Hydrator\Strategy\DefaultStrategy', get_class($this->factory->createService($this->serviceLocator)->getStrategy('items')));
    }
}
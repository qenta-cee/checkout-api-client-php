<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\CardHydratorFactory;
use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class CardHydratorFactoryUTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var CardHydratorFactory
     */
    protected $factory;

    protected $serviceLocator;

    protected $hydratorStrategy;

    public function setUp() {
        $this->factory = new CardHydratorFactory();
        $this->hydratorStrategy = new DefaultStrategy();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->willReturn($this->hydratorStrategy);
    }

    public function testCreateServiceReturnsCardHydrator() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertEquals('Zend\Stdlib\Hydrator\ClassMethods', get_class($service));
    }

    public function testCreateServiceSetsPlainHydratorStrategy() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertEquals('Zend\Stdlib\Hydrator\Strategy\DefaultStrategy', get_class($service->getStrategy('plainCard')));
    }
}
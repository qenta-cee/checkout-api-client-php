<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass;

use WirecardCheckoutApiClient\Entity\MasterPass\WalletHydratorFactory;
use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class WalletHydratorFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var WalletHydratorFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp()
    {
        $this->factory = new WalletHydratorFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->willReturn(new DefaultStrategy());
    }

    public function testCreateServiceReturnsWalletHydrator()
    {
        $this->assertEquals('Zend\Stdlib\Hydrator\ClassMethods', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceSetsStrategyForBasketFromServiceManager()
    {
        $this->assertEquals(new DefaultStrategy(), $this->factory->createService($this->serviceLocator)->getStrategy('basket'));
    }
}
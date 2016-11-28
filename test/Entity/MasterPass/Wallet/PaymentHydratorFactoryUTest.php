<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\PaymentHydratorFactory;
use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class PaymentHydratorFactoryUTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var PaymentHydratorFactory
     */
    protected $factory;

    protected $serviceLocator;

    protected $hydratorStrategy;

    public function setUp() {
        $this->factory = new PaymentHydratorFactory();
        $this->hydratorStrategy = new DefaultStrategy();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->willReturn($this->hydratorStrategy);
    }

    public function testCreateServiceReturnsPaymentHydrator() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertEquals('Zend\Stdlib\Hydrator\ClassMethods', get_class($service));
    }

    public function testCreateServiceSetsAmountHydratorStrategyForTotalAmount() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertEquals('Zend\Stdlib\Hydrator\Strategy\DefaultStrategy', get_class($service->getStrategy('totalAmount')));
    }
}
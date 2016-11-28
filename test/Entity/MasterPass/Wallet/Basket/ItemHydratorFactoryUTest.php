<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\ItemHydratorFactory;
use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class ItemHydratorFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ItemHydratorFactory
     */
    protected $factory;

    protected $serviceLocator;

    protected $amountHydratorStrategy;

    public function setUp()
    {
        $this->factory = new ItemHydratorFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->amountHydratorStrategy = new DefaultStrategy();
        $this->serviceLocator->method('get')->with($this->equalTo('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy'))->willReturn($this->amountHydratorStrategy);
    }

    public function testCreateServiceReturnsClassMethodsHydrator()
    {
        $this->assertEquals('Zend\Stdlib\Hydrator\ClassMethods', get_class($this->factory->createService($this->serviceLocator)));
    }

    public function testCreateServiceSetsUnderscoreSeparatedKeysToFalse()
    {
        $this->assertAttributeEquals(false, 'underscoreSeparatedKeys', $this->factory->createService($this->serviceLocator));
    }

    /**
     * @param $fieldName
     *
     * @dataProvider validFieldNameProvider
     */
    public function testCreateServiceSetsAmountHydratorStrategyFromServiceManager($fieldName)
    {
        $this->assertEquals($this->amountHydratorStrategy, $this->factory->createService($this->serviceLocator)->getStrategy($fieldName));
    }

    public function validFieldNameProvider()
    {
        return array(
            array('unitGrossAmount'),
            array('unitNetAmount'),
            array('unitTaxAmount'),
        );
    }
}
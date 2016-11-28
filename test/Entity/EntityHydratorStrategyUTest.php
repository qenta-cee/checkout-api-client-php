<?php
namespace WirecardCheckoutApiClientTest\Entity;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;
use Zend\Stdlib\Hydrator\ClassMethods;

class EntityHydratorStrategyUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EntityHydratorStrategy
     */
    protected $strategy;

    public function setUp()
    {
        $this->strategy = new EntityHydratorStrategy(new ClassMethods(), new Amount());
    }

    public function testExtractEntity()
    {
        $amount = new Amount();
        $amount->setAmount(1)->setCurrency('EUR');
        $this->assertEquals(Array('amount' => 1, 'currency' => 'EUR'), $this->strategy->extract($amount));
    }

    public function testHydrateArray()
    {
        $amount = new Amount();
        $amount->setAmount(1)->setCurrency('EUR');
        $this->assertEquals($amount, $this->strategy->hydrate(Array('amount' => 1, 'currency' => 'EUR')));
    }

    public function testHydrateClonesPrototype()
    {
        $amount = new Amount();
        $this->strategy = new EntityHydratorStrategy(new ClassMethods(), $amount);
        $amount->setAmount(1)->setCurrency('EUR');
        $this->assertNotSame($amount, $this->strategy->hydrate(Array('amount' => 1, 'currency' => 'EUR')));
    }

    public function testExtractNoneObject()
    {
        $dummyData = Array('test' => 'data');
        $this->assertEquals($dummyData, $this->strategy->extract($dummyData));
    }
}
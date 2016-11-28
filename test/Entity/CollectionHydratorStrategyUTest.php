<?php
namespace WirecardCheckoutApiClientTest\Entity;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\Collection;
use WirecardCheckoutApiClient\Entity\CollectionHydratorStrategy;
use Zend\Stdlib\Hydrator\ClassMethods;

class CollectionHydratorStrategyUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CollectionHydratorStrategy
     */
    protected $strategy;

    public function setUp()
    {
        $amount = new Amount();
        $this->strategy = new CollectionHydratorStrategy(new Collection($amount, new ClassMethods()));
    }

    public function testExtractWithEmptyCollection()
    {
        $this->assertEquals(Array(), $this->strategy->extract(new Collection(new Amount(), new ClassMethods())));
    }

    public function testHydrateWithEmptyArray()
    {
        $this->assertEquals(new Collection(new Amount(), new ClassMethods()), $this->strategy->hydrate(Array()));
    }

    public function testExtractWithCollection()
    {
        $collection = new Collection(new Amount());
        $amount = new Amount();
        $amount->setAmount(1)->setCurrency('EUR');
        $collection->addItem($amount);
        $this->assertEquals(Array(Array('amount' => 1, 'currency' => 'EUR')), $this->strategy->extract($collection));
    }

    public function testHydrateWithArray()
    {
        $collection = new Collection(new Amount());
        $amount = new Amount();
        $amount->setAmount(1)->setCurrency('EUR');
        $collection->addItem($amount);
        $this->assertEquals($collection->getItems(), $this->strategy->hydrate(Array(Array('amount' => 1, 'currency' => 'EUR')))->getItems());
    }
}
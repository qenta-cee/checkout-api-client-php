<?php
namespace WirecardCheckoutApiClientTest\Entity;

use WirecardCheckoutApiClient\Entity\Collection;
use WirecardCheckoutApiClient\Entity\EntityInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class CollectionUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EntityInterface
     */
    protected $dummyPrototype;

    protected $dummyHydrator;


    /**
     * @var Collection
     */
    protected $collection;

    public function setUp()
    {
        $this->dummyPrototype = $this->createMock('WirecardCheckoutApiClient\\Entity\\EntityInterface');
        $this->dummyHydrator = $this->createMock('Zend\\Stdlib\\Hydrator\\HydratorInterface');

        $this->collection = new Collection($this->dummyPrototype);
    }

    public function testConstructorSetsPrototype()
    {
        $this->assertAttributeEquals($this->dummyPrototype, 'prototype', $this->collection);
    }

    public function testConstructorSetsHydrator()
    {
        $dummyHydrator = $this->dummyHydrator;
        $collection = new Collection($this->dummyPrototype, $dummyHydrator);
        $this->assertAttributeEquals($dummyHydrator, 'hydrator', $collection);
    }

    public function testSetPrototype()
    {
        $prototype = $this->dummyPrototype;
        $this->collection->setPrototype($prototype);
        $this->assertAttributeEquals($prototype, 'prototype', $this->collection);
    }

    public function testSetHydrator()
    {
        $dummyHydrator = $this->dummyHydrator;
        $this->collection->setHydrator($dummyHydrator);
        $this->assertAttributeEquals($dummyHydrator, 'hydrator', $this->collection);
        return $this->collection;
    }

    /**
     * @depends testSetHydrator
     * @param Collection $collection
     */
    public function testGetHydrator($collection)
    {
        $dummyHydrator = $this->dummyHydrator;
        $this->assertEquals($dummyHydrator, $collection->getHydrator());
    }

    public function testAddItemWithEntityInterface()
    {
        $dummyEntity = clone $this->dummyPrototype;
        $dummyEntity->method('__toString')->willReturn(__METHOD__);
        $this->collection->addItem($dummyEntity);
        $this->assertAttributeEquals(Array(__METHOD__ => $dummyEntity), 'items', $this->collection);
        return Array('collection' => $this->collection, 'entity' => $dummyEntity);
    }

    public function testAddItemWithHydrator()
    {
        $dummyData = Array('id' => 'WDCEDACH');
        $dummyEntity = $this->dummyPrototype;
        $dummyEntity->method('__toString')->willReturn(__METHOD__);
        $mockHydrator = $this->getMockHydrator($dummyData, $dummyEntity);
        $this->collection->setHydrator($mockHydrator);
        $this->collection->addItem($dummyData);
        $this->assertAttributeEquals(Array(__METHOD__ => $dummyEntity), 'items', $this->collection);
    }

    public function testAddItemWithHydratorClonesPrototype()
    {
        $dummyData = Array('id' => 'WDCEDACH');
        $dummyEntity = $this->dummyPrototype;
        $dummyEntity->method('__toString')->willReturn(__METHOD__);
        $this->collection->setHydrator(new ClassMethods());
        $this->collection->addItem($dummyData);
        $this->assertAttributeNotSame(Array(__METHOD__ => $dummyEntity), 'items', $this->collection);
    }

    /**
     * @depends testAddItemWithEntityInterface
     * @param mixed[] $provided
     */
    public function testGetItem($provided)
    {
        $this->assertEquals(
            $provided['entity'],
            $provided['collection']->getItem('WirecardCheckoutApiClientTest\Entity\CollectionUTest::testAddItemWithEntityInterface')
        );
    }

    public function testAddMixedItems()
    {
        $dummyEntity0 = clone $this->dummyPrototype;
        $dummyEntity0->method('__toString')->willReturn(__METHOD__ . '_0');
        $dummyData = Array('id' => __METHOD__ . '_0');
        $dummyEntity1 = clone $this->dummyPrototype;
        $dummyEntity1->method('__toString')->willReturn(__METHOD__ . '_1');
        $items = Array(
            $dummyData,
            $dummyEntity0
        );
        $mockHydrator = $this->getMockHydrator($dummyData, $dummyEntity1);
        $this->collection->setHydrator($mockHydrator);
        $this->collection->addItems($items);
        $this->assertAttributeEquals(Array(
            __METHOD__ . '_0' => $dummyEntity0,
            __METHOD__ . '_1' => $dummyEntity1
        ), 'items', $this->collection);
        return Array(
            'collection' => $this->collection,
            'items' => Array($dummyEntity0, $dummyEntity1)
        );
    }

    /**
     * @depends testAddMixedItems
     * @param mixed[] $provided
     */
    public function testGetMultipleItems($provided)
    {
        $this->assertEquals(
            $provided['items'],
            $provided['collection']->getItems()
        );
    }

    /**
     * @depends testAddItemWithEntityInterface
     * @param mixed[]
     */
    public function testCollectionHasItem($provided)
    {
        $this->assertTrue($provided['collection']->hasItem('WirecardCheckoutApiClientTest\Entity\CollectionUTest::testAddItemWithEntityInterface'));
    }

    public function testCollectionDoesntHaveItem()
    {
        $this->assertFalse($this->collection->hasItem(__METHOD__));
    }

    protected function getMockHydrator($dummyData, $entity)
    {
        $mockHydrator = $this->dummyHydrator;
        $mockHydrator->method('hydrate')->with(
            $this->equalTo($dummyData),
            $this->equalTo($this->dummyPrototype)
        )->willReturn($entity);
        return $mockHydrator;
    }
}
<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\Collection;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\Item;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;

class BasketUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Basket
     */
    protected  $entity;

    /**
     * @var Amount
     */
    protected $amount;

    /**
     * @var Collection
     */
    protected $collection;

    public function setUp()
    {
        $this->entity = new Basket();
        $this->amount = new Amount();
        $this->collection = new Collection(new Item());
    }

    public function testSetAmount()
    {
        $this->entity->setTotalAmount($this->amount);
        $this->assertAttributeEquals($this->amount, 'totalAmount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAmount
     * @param Basket $entity
     */
    public function testGetAmount(Basket $entity)
    {
        $this->assertEquals($this->amount, $entity->getTotalAmount());
    }

    public function testSetItems()
    {
        $this->entity->setItems($this->collection);
        $this->assertAttributeEquals($this->collection, 'items', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetItems
     * @param Basket $entity
     */
    public function testGetItems(Basket $entity)
    {
        $this->assertEquals($this->collection, $entity->getItems());
    }

    /**
     * @depends testSetItems
     * @param Basket $entity
     */
    public function testToString(Basket $entity) {
        $item = new Item();
        $item->setDescription('Test-Item');
        $collection = $entity->getItems();
        $collection->addItem($item);
        $entity->setItems($collection);
        $this->assertEquals('448c4c695d9d9768148b8e44d86f34a9', (string)$entity);
    }
}
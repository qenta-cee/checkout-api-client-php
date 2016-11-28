<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\Item;

class ItemUTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket\Item */
    protected $entity;
    /** @var  \WirecardCheckoutApiClient\Entity\Amount */
    private static $unitGrossAmount;
    /** @var  \WirecardCheckoutApiClient\Entity\Amount */
    private static $unitNetAmount;
    /** @var  \WirecardCheckoutApiClient\Entity\Amount */
    private static $unitTaxAmount;

    public static function setUpBeforeClass()
    {
        self::$unitGrossAmount = new Amount();
        self::$unitGrossAmount->setAmount(11)->setCurrency('EUR');

        self::$unitNetAmount = new Amount();
        self::$unitNetAmount->setAmount(10)->setCurrency('EUR');

        self::$unitTaxAmount = new Amount();
        self::$unitTaxAmount->setAmount(1)->setCurrency('EUR');
    }

    public function setUp()
    {
        $this->entity = new Item();
    }

    public function testSetName()
    {
        $this->entity->setName(__METHOD__);
        $this->assertAttributeEquals(__METHOD__, 'name', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetName
     * @param $entity
     */
    public function testGetName(Item $entity)
    {
        $this->assertEquals('WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Basket\ItemUTest::testSetName', $entity->getName());
    }

    public function testSetDescription()
    {
        $this->entity->setDescription(__METHOD__);
        $this->assertAttributeEquals(__METHOD__, 'description', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetDescription
     * @param $entity
     */
    public function testGetDescription(Item $entity)
    {
        $this->assertEquals('WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Basket\ItemUTest::testSetDescription', $entity->getDescription());
    }

    public function testSetArticleNumber()
    {
        $this->entity->setArticleNumber(__METHOD__);
        $this->assertAttributeEquals(__METHOD__, 'articleNumber', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetArticleNumber
     * @param $entity
     */
    public function testGetArticleNumber(Item $entity)
    {
        $this->assertEquals('WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Basket\ItemUTest::testSetArticleNumber', $entity->getArticleNumber());
    }

    public function testSetQuantity()
    {
        $this->entity->setQuantity('11');
        $this->assertAttributeEquals(11, 'quantity', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetQuantity
     * @param Item $entity
     */
    public function testGetQuantity(Item $entity)
    {
        $this->assertEquals(11, $entity->getQuantity());
    }

    public function testSetUnitGrossAmount()
    {
        $this->entity->setUnitGrossAmount(self::$unitGrossAmount);
        $this->assertAttributeEquals(self::$unitGrossAmount, 'unitGrossAmount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetUnitGrossAmount
     * @param Item $entity
     */
    public function testGetUnitGrossAmount(Item $entity)
    {
        $this->assertEquals(self::$unitGrossAmount, $entity->getUnitGrossAmount());
    }

    public function testSetUnitNetAmount()
    {
        $this->entity->setUnitNetAmount(self::$unitNetAmount);
        $this->assertAttributeEquals(self::$unitNetAmount, 'unitNetAmount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetUnitNetAmount
     * @param Item $entity
     */
    public function testGetUnitNetAmount(Item $entity)
    {
        $this->assertEquals(self::$unitNetAmount, $entity->getUnitNetAmount());
    }

    public function testSetUnitTaxAmount()
    {
        $this->entity->setUnitTaxAmount(self::$unitTaxAmount);
        $this->assertAttributeEquals(self::$unitTaxAmount, 'unitTaxAmount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetUnitTaxAmount
     * @param Item $entity
     */
    public function testGetUnitTaxAmount(Item $entity)
    {
        $this->assertEquals(self::$unitTaxAmount, $entity->getUnitTaxAmount());
    }

    public function testSetUnitTaxRate()
    {
        $taxRate = '20.0';
        $this->entity->setUnitTaxRate($taxRate);
        $this->assertAttributeEquals($taxRate, 'unitTaxRate', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetUnitTaxRate
     * @param Item $entity
     */
    public function testGetUnitTaxRate(Item $entity)
    {
        $this->assertEquals('20.0', $entity->getUnitTaxRate());
    }

    public function testSetImageUrl()
    {
        $imageUrl = 'https://www.example.com/image.png';
        $this->entity->setImageUrl($imageUrl);
        $this->assertAttributeEquals($imageUrl, 'imageUrl', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetImageUrl
     * @param Item $entity
     */
    public function testGetImageUrl(Item $entity)
    {
        $imageUrl = 'https://www.example.com/image.png';
        $this->assertEquals($imageUrl, $entity->getImageUrl());
    }

    public function testToStringInterpretation()
    {
        $entity = $this->entity;
        $entity->setDescription(__METHOD__);
        $entity->setImageUrl('http://www.example.com/image.url');
        $entity->setUnitGrossAmount(self::$unitGrossAmount);
        $entity->setUnitNetAmount(self::$unitNetAmount);
        $entity->setUnitTaxAmount(self::$unitTaxAmount);
        $entity->setUnitTaxRate('10.0');
        $entity->setQuantity(42);
        $this->assertEquals(
            '32b6fd75e1ae13140db47c84ed51cad0',
            (string)$this->entity
        );
    }
}
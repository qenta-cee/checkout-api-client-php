<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card;

class CardUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Card
     */
    protected $entity;

    public function setUp() {
        $this->entity = new Card();
    }

    public function testSetTransactionId() {
        $this->entity->setTransactionId(42);
        $this->assertAttributeEquals(42, 'transactionId', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetTransactionId
     * @param Card $entity
     */
    public function testGetTransactionId($entity) {
        $this->assertEquals(42, $entity->getTransactionId());
    }

    public function testSetExpiryMonth() {
        $this->entity->setExpiryMonth(12);
        $this->assertAttributeEquals(12, 'expiryMonth', $this->entity);
        return $this->entity;
    }

    /**
     * @param Card $entity
     * @depends testSetExpiryMonth
     */
    public function testGetExpiryMonth($entity) {
        $this->assertEquals(12, $entity->getExpiryMonth());
    }

    public function testSetExpiryYear() {
        $this->entity->setExpiryYear(2015);
        $this->assertAttributeEquals(2015, 'expiryYear', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetExpiryYear
     * @param Card $entity
     */
    public function testGetExpiryYear($entity) {
        $this->assertEquals(2015, $entity->getExpiryYear());
    }

    public function testSetCardHolderName() {
        $this->entity->setCardHolderName('DUMMY');
        $this->assertAttributeEquals('DUMMY', 'cardHolderName', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCardHolderName
     * @param Card $entity
     */
    public function testGetCardHolderName($entity) {
        $this->assertEquals('DUMMY', $entity->getCardHolderName());
    }

    public function testSetAnonymousPan() {
        $this->entity->setAnonymousPan('0007');
        $this->assertAttributeEquals('0007', 'anonymousPan', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAnonymousPan
     * @param Card $entity
     */
    public function testGetAnonymousPan($entity) {
        $this->assertEquals('0007', $entity->getAnonymousPan());
    }

    public function testSetHashedPan() {
        $this->entity->setHashedPan(__METHOD__);
        $this->assertAttributeEquals(__METHOD__, 'hashedPan', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetHashedPan
     * @param Card $entity
     */
    public function testGetHashedPan($entity) {
        $this->assertEquals(str_replace('Get', 'Set', __METHOD__), $entity->getHashedPan());
    }

    public function testSetMaskedPan() {
        $this->entity->setMaskedPan('9500********0001');
        $this->assertAttributeEquals('9500********0001', 'maskedPan', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetMaskedPan
     * @param Card $entity
     */
    public function testGetMaskedPan($entity) {
        $this->assertEquals('9500********0001', $entity->getMaskedPan());
    }

    public function testSetMasterpassWalletId() {
        $this->entity->setMasterpassWalletId(101);
        $this->assertAttributeEquals(101, 'masterpassWalletId', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetMasterpassWalletId
     * @param Card $entity
     */
    public function testGetMasterpassWalletId($entity) {
        $this->assertEquals(101, $entity->getMasterpassWalletId());
    }

    public function testSetCreated() {
        $this->entity->setCreated(new \DateTime('1970-01-01'));
        $this->assertAttributeEquals(new \DateTime('1970-01-01'), 'created', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCreated
     * @param Card $entity
     */
    public function testGetCreated($entity) {
        $this->assertEquals(new \DateTime('1970-01-01'), $entity->getCreated());
    }

    public function testSetFirstName() {
        $this->entity->setFirstName('Jane');
        $this->assertAttributeEquals('Jane', 'firstName', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetFirstName
     * @param Card $entity
     */
    public function testGetFirstName($entity) {
        $this->assertEquals('Jane', $entity->getFirstName());
    }

    public function testSetLastName() {
        $this->entity->setLastName('Doe');
        $this->assertAttributeEquals('Doe', 'lastName', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetLastName
     * @param Card $entity
     */
    public function testGetLastName($entity) {
        $this->assertEquals('Doe', $entity->getLastName());
    }

    public function testSetCountry() {
        $this->entity->setCountry('AT');
        $this->assertAttributeEquals('AT', 'country', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCountry
     * @param Card $entity
     */
    public function testGetCountry($entity) {
        $this->assertEquals('AT', $entity->getCountry());
    }

    public function testSetEmailAddress() {
        $this->entity->setEmailAddress('jane.doe@example.com');
        $this->assertAttributeEquals('jane.doe@example.com', 'emailAddress', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetEmailAddress
     * @param Card $entity
     */
    public function testGetEmailAddress($entity) {
        $this->assertEquals('jane.doe@example.com', $entity->getEmailAddress());
    }

    public function testSetPhoneNumber() {
        $this->entity->setPhoneNumber('0123456789');
        $this->assertAttributeEquals('0123456789', 'phoneNumber', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetPhoneNumber
     * @param Card $entity
     */
    public function testGetPhoneNumber($entity) {
        $this->assertEquals('0123456789', $entity->getPhoneNumber());
    }

    public function testSetPlainCard() {
        $this->entity->setPlainCard(new Card\Plain());
        $this->assertAttributeEquals(new Card\Plain(), 'plainCard', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetPlainCard
     * @param Card $entity
     */
    public function testGetPlainCard($entity) {
        $this->assertEquals(new Card\Plain(), $entity->getPlainCard());
    }

    /**
     * @depends testSetTransactionId
     * @param Card $entity
     */
    public function testToString($entity) {
        $this->assertEquals(42, (string)$entity);
    }
}
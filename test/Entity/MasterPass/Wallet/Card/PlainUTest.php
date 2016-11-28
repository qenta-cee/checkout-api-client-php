<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet\Card;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card\Plain;

class PlainUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Plain
     */
    protected $entity;

    public function setUp() {
        $this->entity = new Plain();
    }

    public function testSetCardId() {
        $this->entity->setCardId('9500000000000001');
        $this->assertAttributeEquals('9500000000000001', 'cardId', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCardId
     * @param Plain $entity
     */
    public function testGetCardId($entity) {
        $this->assertEquals('9500000000000001', $entity->getCardId());
    }

    public function testSetBrandId() {
        $this->entity->setBrandId('42');
        $this->assertAttributeEquals('42', 'brandId', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetBrandId
     * @param Plain $entity
     */
    public function testGetBrandId($entity) {
        $this->assertEquals(42, $entity->getBrandId());
    }

    public function testSetBrandName() {
        $this->entity->setBrandName('MasterCard');
        $this->assertAttributeEquals('MasterCard', 'brandName', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetBrandName
     * @param Plain $entity
     */
    public function testGetBrandName($entity) {
        $this->assertEquals('MasterCard', $entity->getBrandName());
    }

    public function testSetCavv() {
        $this->entity->setCavv('1234');
        $this->assertAttributeEquals('1234', 'cavv', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCavv
     * @param Plain $entity
     */
    public function testGetCavv($entity) {
        $this->assertEquals('1234', $entity->getCavv());
    }

    public function testSetEciFlag() {
        $this->entity->setEciFlag('jMKEKlqlJGiJARAbxMDZ5+fnFeg=');
        $this->assertAttributeEquals('jMKEKlqlJGiJARAbxMDZ5+fnFeg=', 'eciFlag', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetEciFlag
     * @param Plain$entity
     */
    public function testGetEciFlag($entity) {
        $this->assertEquals('jMKEKlqlJGiJARAbxMDZ5+fnFeg=', $entity->getEciFlag());
    }

    public function testSetXid() {
        $this->entity->setXid('TTVmdlFxbERYVXo5R1hrVUY5bjY=');
        $this->assertAttributeEquals('TTVmdlFxbERYVXo5R1hrVUY5bjY=', 'xid', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetXid
     * @param Plain $entity
     */
    public function testGetXid($entity) {
        $this->assertEquals('TTVmdlFxbERYVXo5R1hrVUY5bjY=', $entity->getXid());
    }

    public function testSetMasterCardAssignedId() {
        $this->entity->setMasterCardAssignedId('DUMMY_ID');
        $this->assertAttributeEquals('DUMMY_ID', 'masterCardAssignedId', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetMasterCardAssignedId
     * @param Plain $entity
     */
    public function testGetMasterCardAssignedId($entity) {
        $this->assertEquals('DUMMY_ID', $entity->getMasterCardAssignedId());
    }

    public function testSetParesStatus() {
        $this->entity->setParesStatus('U');
        $this->assertAttributeEquals('U', 'paresStatus', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetParesStatus
     * @param Plain $entity
     */
    public function testGetParesStatus($entity) {
        $this->assertEquals('U', $entity->getParesStatus());
    }

    public function testSetSignatureVerification() {
        $this->entity->setSignatureVerification('Y');
        $this->assertAttributeEquals('Y', 'signatureVerification', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetSignatureVerification
     * @param Plain $entity
     */
    public function testGetSignatureVerification($entity) {
        $this->assertEquals('Y', $entity->getSignatureVerification());
    }

    public function testToString() {
        $this->entity->setCardId('9500000000000002')
                     ->setBrandId('23')
                     ->setBrandName('Visa')
                     ->setCavv('123')
                     ->setEciFlag('Flag')
                     ->setXid('Y')
                     ->setMasterCardAssignedId('666')
                     ->setParesStatus('A')
                     ->setSignatureVerification('N');
        $this->assertEquals('caba3dfda70886832fc8a1d177dd8283', (string)$this->entity);
    }
}
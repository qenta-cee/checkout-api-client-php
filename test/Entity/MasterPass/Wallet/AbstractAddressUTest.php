<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\AbstractAddress;

class AbstractAddressUTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AbstractAddress
     */
    protected  $entity;

    public function setUp() {
        $this->entity = $this->getMockForAbstractClass('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\AbstractAddress');
    }

    public function testSetCity() {
        $this->entity->setCity('Graz');
        $this->assertAttributeEquals('Graz', 'city', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCity
     * @param AbstractAddress $entity
     */
    public function testGetCity($entity) {
        $this->assertEquals('Graz', $entity->getCity());
    }

    public function testSetCountry() {
        $this->entity->setCountry('Austria');
        $this->assertAttributeEquals('Austria', 'country', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCountry
     * @param AbstractAddress $entity
     */
    public function testGetCountry($entity) {
        $this->assertEquals('Austria', $entity->getCountry());
    }

    public function testSetCountrySubdivision() {
        $this->entity->setCountrySubdivision('Styria');
        $this->assertAttributeEquals('Styria', 'countrySubdivision', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCountrySubdivision
     * @param AbstractAddress $entity
     */
    public function testGetCountrySubdivision($entity) {
        $this->assertEquals('Styria', $entity->getCountrySubdivision());
    }

    public function testSetPostalCode() {
        $this->entity->setPostalCode(8020);
        $this->assertAttributeEquals('8020', 'postalCode', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetPostalCode
     * @param AbstractAddress $entity
     */
    public function testGetPostalCode($entity) {
        $this->assertEquals('8020', $entity->getPostalCode());
    }
    
    public function testSetAddressLine1() {
        $this->entity->setAddressLine1('Reininghausstrasse');
        $this->assertAttributeEquals('Reininghausstrasse', 'addressLine1', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAddressLine1
     * @param AbstractAddress $entity
     */
    public function testGetAddressLine1($entity) {
        $this->assertEquals('Reininghausstrasse', $entity->getAddressLine1());
    }

    public function testSetAddressLine2() {
        $this->entity->setAddressLine2('13a');
        $this->assertAttributeEquals('13a', 'addressLine2', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAddressLine2
     * @param AbstractAddress $entity
     */
    public function testGetAddressLine2($entity) {
        $this->assertEquals('13a', $entity->getAddressLine2());
    }

    public function testSetAddressLine3() {
        $this->entity->setAddressLine3('Wirecard CEE');
        $this->assertAttributeEquals('Wirecard CEE', 'addressLine3', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAddressLine3
     * @param AbstractAddress $entity
     */
    public function testGetAddressLine3($entity) {
        $this->assertEquals('Wirecard CEE', $entity->getAddressLine3());
    }

    public function testToString() {
        $this->entity->setCity('Graz')
                     ->setCountry('Austria')
                     ->setCountrySubdivision('Styria')
                     ->setPostalCode(8020)
                     ->setAddressLine1('Reininghausstrasse')
                     ->setAddressLine2('13a')
                     ->setAddressLine3('Wirecard CEE');
        $this->assertEquals('bda6b90a51fea35b6583703d39ccabba', (string)$this->entity);
    }
}
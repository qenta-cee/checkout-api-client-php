<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass;

use WirecardCheckoutApiClient\Entity\MasterPass\ShippingProfile;

class ShippingProfileUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ShippingProfile
     */
    protected $entity;

    public function setUp() {
        $this->entity = new ShippingProfile('WDCEDACH');
    }

    public function testSetId() {
        $dummyId = 'DUMMY_ID';
        $this->entity->setId($dummyId);
        $this->assertAttributeEquals($dummyId, 'id', $this->entity);
    }

    public function testGetId() {
        $this->assertEquals('WDCEDACH', $this->entity->getId());
    }

    public function testSetDescription() {
        $dummyDescription = 'DUMMY DESCRIPTION';
        $this->entity->setDescription($dummyDescription);
        $this->assertAttributeEquals($dummyDescription, 'description', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetDescription
     * @param ShippingProfile $entity
     */
    public function testGetDescription($entity) {
        $this->assertEquals('DUMMY DESCRIPTION', $entity->getDescription());
    }

    public function testToString() {
        $this->assertEquals('WDCEDACH', (string)$this->entity);
    }
}
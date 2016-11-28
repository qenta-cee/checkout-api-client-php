<?php
namespace WirecardCheckoutApiClientTest;

use WirecardCheckoutApiClient\Module;

class ModuleTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Module
     */
    protected $module;

    public function setUp() {
        $this->module = new Module();
    }

    public function testGetConfigShouldReturnArray() {
        $this->assertInternalType('array', $this->module->getConfig());
    }
}
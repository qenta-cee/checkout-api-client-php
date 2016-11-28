<?php
namespace WirecardCheckoutApiClientTest\Service\MasterPass;

use WirecardCheckoutApiClient\Service\MasterPass\ShippingProfileResourceServiceFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

class ShippingProfileResourceServiceFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ShippingProfileResourceServiceFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp()
    {
        $this->factory = new ShippingProfileResourceServiceFactory();

        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->willReturnCallback(Array($this, 'serviceLocatorCallback'));
    }

    public function testCreateServiceReturnsShippingProfileResourceService()
    {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertEquals('WirecardCheckoutApiClient\Service\MasterPass\ShippingProfileResourceService', get_class($service));
    }

    public function testCreateServiceSetsOAuth2Service()
    {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals($this->serviceLocatorCallback('WirecardCheckoutApiClient\\Service\\OAuth2Service'), 'oAuth2Service', $service);
    }

    public function testCreatServiceSetsHttpClient()
    {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals($this->serviceLocatorCallback('WirecardCheckoutApiClient\\Http\\Client'), 'httpClient', $service);
    }

    public function testCreateServiceSetsHydrator()
    {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals($this->serviceLocatorCallback('WirecardCheckoutApiClient\\Entity\\MasterPass\\ShippingProfileHydrator'),
            'hydrator', $service);
    }

    public function testCreateServiceSetsRequestUri()
    {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals('http://www.example.com/masterpass/merchants/{merchant_id}/shipping-profiles', 'requestUri', $service);
    }

    public function serviceLocatorCallback($service)
    {
        switch ($service) {
            case 'WirecardCheckoutApiClient\\Service\\OAuth2Service':
                return $this->getMockBuilder('WirecardCheckoutApiClient\\Service\\OAuth2Service')->disableOriginalConstructor()->getMock();
                break;
            case 'WirecardCheckoutApiClient\\Http\\Client':
                return $this->createMock('Zend\\Http\\Client');
                break;
            case 'WirecardCheckoutApiClient\\Entity\\MasterPass\\ShippingProfileHydrator':
                return new ClassMethods();
                break;
            case 'Config':
                return Array(
                    'rest_api' => Array(
                        'base_uri' => 'http://www.example.com',
                    ),
                );
                break;
            default:
                throw new \Exception(sprintf('Service %s not found', $service));
        }
    }
}
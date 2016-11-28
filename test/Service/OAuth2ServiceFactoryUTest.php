<?php
namespace WirecardCheckoutApiClientTest\Service;

use WirecardCheckoutApiClient\Service\OAuth2ServiceFactory;

class OAuth2ServiceFactoryUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OAuth2ServiceFactory
     */
    protected $factory;

    protected $serviceLocator;

    public function setUp() {
        $this->factory = new OAuth2ServiceFactory();
        $this->serviceLocator = $this->createMock('Zend\\ServiceManager\\ServiceManager');
        $this->serviceLocator->method('get')->willReturnCallback(Array($this, 'serviceLocatorCallback'));
    }

    public function testCreateServiceReturnsOAuth2Service() {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertEquals('WirecardCheckoutApiClient\Service\OAuth2Service', get_class($service));
    }

    public function testCreateServiceSetsRequestUri()
    {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals('http://www.example.com/oauth/token', 'requestUri', $service);
    }

    public function testCreateServiceSetsHttpClient()
    {
        $service = $this->factory->createService($this->serviceLocator);
        $this->assertAttributeEquals($this->serviceLocatorCallback('WirecardCheckoutApiClient\\Http\\Client'), 'httpClient', $service);
    }

    public function serviceLocatorCallback($service) {
        switch($service) {
            case 'WirecardCheckoutApiClient\\Http\\Client':
                return $this->createMock('Zend\\Http\\Client');
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
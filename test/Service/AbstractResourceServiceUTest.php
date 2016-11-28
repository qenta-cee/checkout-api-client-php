<?php
namespace WirecardCheckoutApiClientTest\Service;

use WirecardCheckoutApiClient\Exception\RuntimeException;
use WirecardCheckoutApiClient\Exception\UnsupportedFeatureException;
use WirecardCheckoutApiClient\Service\AbstractResourceService;
use WirecardCheckoutApiClient\Service\OAuth2Service;
use WirecardCheckoutApiClient\Service\ResourceServiceInterface;
use Zend\Http\Client;
use Zend\Http\Response;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Reflection;

/**
 * Class AbstractResourceServiceUTest
 * @package WirecardCheckoutApiClientTest\Service
 */
class AbstractResourceServiceUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractResourceService
     */
    protected $resourceService;

    public function setUp()
    {
        $this->resourceService = $this->getMockForAbstractClass(
            'WirecardCheckoutApiClient\\Service\\AbstractResourceService',
            array(
                new OAuth2Service('http://www.example.com'),
                new Client(),
            )
        );
    }

    public function testConstructorSetsOAuth2Service()
    {
        $this->assertAttributeEquals(new OAuth2Service('http://www.example.com'), 'oAuth2Service',
            $this->resourceService);
    }

    public function testConstructorSetsDefaultHydrator()
    {
        $this->assertAttributeEquals(new ClassMethods(), 'hydrator', $this->resourceService);
    }

    public function testSetHydrator()
    {
        $hydrator = new Reflection();
        $this->resourceService->setHydrator($hydrator);
        $this->assertAttributeEquals($hydrator, 'hydrator', $this->resourceService);
    }

    public function testGetHydrator()
    {
        $this->assertEquals(new ClassMethods(), $this->resourceService->getHydrator());
    }

    public function testSetOAuth2Service()
    {
        $oAuth2Service = new OAuth2Service('https://www.example.com/');
        $this->resourceService->setOAuth2Service($oAuth2Service);
        $this->assertAttributeEquals($oAuth2Service, 'oAuth2Service', $this->resourceService);
        return $this->resourceService;
    }

    /**
     * @depends testSetOAuth2Service
     * @param $resourceService
     */
    public function testGetOAuth2Service($resourceService)
    {
        $oAuth2Service = new OAuth2Service('https://www.example.com/');
        $this->assertEquals($oAuth2Service, $resourceService->getOAuth2Service());
    }

    public function testSetAuthenticationCredentials()
    {
        $dummyClientId = 'DUMMY_CLIENT_ID';
        $dummyClientSecret = 'DUMMY_CLIENT_SECRET';
        $this->resourceService->setAuthenticationCredentials($dummyClientId, $dummyClientSecret);
        $this->assertAttributeEquals($dummyClientId, 'clientId', $this->resourceService);
        $this->assertAttributeEquals($dummyClientSecret, 'clientSecret', $this->resourceService);
    }

    public function testSetHttpClient()
    {
        $dummyClient = new Client('http://www.example.com');
        $this->resourceService->setHttpClient($dummyClient);
        $this->assertAttributeEquals($dummyClient, 'httpClient', $this->resourceService);
        return $this->resourceService;
    }

    /**
     * @depends testSetHttpClient
     * @param AbstractResourceService $resourceService
     */
    public function testGetHttpClient($resourceService)
    {
        $dummyClient = new Client('http://www.example.com');
        $this->assertEquals($dummyClient, $resourceService->getHttpClient());
    }

    public function testSetRequestUri()
    {
        $dummyRequestUri = 'http://www.example.com/dummy/resource';
        $this->resourceService->setRequestUri($dummyRequestUri);
        $this->assertAttributeEquals($dummyRequestUri, 'requestUri', $this->resourceService);
        return $this->resourceService;
    }

    /**
     * @depends testSetRequestUri
     * @param AbstractResourceService $resourceService
     */
    public function testGetRequestUri($resourceService)
    {
        $dummyRequestUri = 'http://www.example.com/dummy/resource';
        $this->assertEquals($dummyRequestUri, $resourceService->getRequestUri());
    }

    public function testGetRequestUriWithReplacement()
    {
        $dummyRequestUri = sprintf(
            'http://www.example.com/dummy/merchant/%s/uniqueId/%s',
            ResourceServiceInterface::REPLACEMENT_MERCHANT_ID, ResourceServiceInterface::REPLACEMENT_ID
        );

        $replacements = Array(
            ResourceServiceInterface::REPLACEMENT_MERCHANT_ID => 'D200001',
            ResourceServiceInterface::REPLACEMENT_ID => 'DUMMY_RESOURCE_ID',
        );

        $this->resourceService->setRequestUri($dummyRequestUri);
        $this->assertEquals(
            sprintf('http://www.example.com/dummy/merchant/%s/uniqueId/%s',
                $replacements[ResourceServiceInterface::REPLACEMENT_MERCHANT_ID],
                $replacements[ResourceServiceInterface::REPLACEMENT_ID]
            ), $this->resourceService->getRequestUri($replacements));

    }

    /**
     * @expectedException RuntimeException
     */
    public function testSendRequestWithConnectionErrorWillThrowRuntimeException()
    {
        $client = $this->createMock('Zend\Http\Client');
        $client->method('send')->willThrowException(new \Zend\Http\Client\Exception\RuntimeException('RUNTIME EX'));
        try {
            $this->callProtectedMethod($this->resourceService, 'sendRequest', Array($client));
        } catch (RuntimeException $e) {
            $this->assertEquals('RUNTIME EX', $e->getMessage());
            throw $e;
        }
    }

    /**
     * @expectedException RuntimeException
     */
    public function testSendRequestWithStatusCode403WillThrowRuntimeException()
    {
        $mockResponse = new Response();
        $mockResponse->setStatusCode(403);
        $mockResponse->setContent('{"error": "DUMMY", "message": "MESSAGE"}');
        $client = $this->createMock('Zend\Http\Client');
        $client->method('send')->willReturn($mockResponse);
        try {
            $this->callProtectedMethod($this->resourceService, 'sendRequest', Array($client));
        } catch (RuntimeException $e) {
            $this->assertEquals(403, $e->getCode());
            $this->assertEquals('MESSAGE', $e->getMessage());
            throw $e;
        }
    }

    /**
     * @expectedException \WirecardCheckoutApiClient\Exception\UnsupportedFeatureException
     */
    public function testCreateThrowsUnsupportedFeatureException()
    {
        $dummyEntity = $this->createMock('WirecardCheckoutApiClient\\Entity\\EntityInterface');
        try {
            $this->resourceService->create($dummyEntity);
        } catch (UnsupportedFeatureException $e) {
            $this->assertEquals(sprintf('Method create has not been implemented by %s.',
                get_class($this->resourceService)), $e->getMessage());
            throw $e;
        }
    }

    /**
     * @expectedException \WirecardCheckoutApiClient\Exception\UnsupportedFeatureException
     */
    public function testGetThrowsUnsupportedFeatureException()
    {
        $dummyEntity = $this->createMock('WirecardCheckoutApiClient\\Entity\\EntityInterface');
        try {
            $this->resourceService->get($dummyEntity);
        } catch (UnsupportedFeatureException $e) {
            $this->assertEquals(sprintf('Method get has not been implemented by %s.',
                get_class($this->resourceService)), $e->getMessage());
            throw $e;
        }
    }

    /**
     * @expectedException \WirecardCheckoutApiClient\Exception\UnsupportedFeatureException
     */
    public function testDeleteThrowsUnsupportedFeatureException()
    {
        $dummyEntity = $this->createMock('WirecardCheckoutApiClient\\Entity\\EntityInterface');
        try {
            $this->resourceService->delete($dummyEntity);
        } catch (UnsupportedFeatureException $e) {
            $this->assertEquals(sprintf('Method delete has not been implemented by %s.',
                get_class($this->resourceService)), $e->getMessage());
            throw $e;
        }
    }

    /**
     * @expectedException \WirecardCheckoutApiClient\Exception\UnsupportedFeatureException
     */
    public function testGetListThrowsUnsupportedFeatureException()
    {
        $dummyEntity = $this->createMock('WirecardCheckoutApiClient\\Entity\\EntityInterface');
        $dummyCollection = $this->getMockBuilder('WirecardCheckoutApiClient\\Entity\\Collection')
            ->setConstructorArgs(Array($dummyEntity))
            ->getMock();
        try {
            $this->resourceService->getList($dummyCollection, $dummyEntity);
        } catch (UnsupportedFeatureException $e) {
            $this->assertEquals(sprintf('Method getList has not been implemented by %s.',
                get_class($this->resourceService)), $e->getMessage());
            throw $e;
        }
    }

    protected function callProtectedMethod($object, $method, $args = Array()) {
        $class = new \ReflectionClass(get_class($object));
        $method = $class->getMethod($method);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $args);
    }
}
<?php
namespace WirecardCheckoutApiClientTest\Service;

use WirecardCheckoutApiClient\Exception\InvalidArgumentException;
use WirecardCheckoutApiClient\Exception\RuntimeException;
use WirecardCheckoutApiClient\Service\OAuth2Service;
use Zend\Http\Client;
use Zend\Http\Response;
use Zend\Http\Exception\InvalidArgumentException AS ZendHttpInvalidArgumentException;

/**
 * Class OAuth2UTest
 * @package WirecardCheckoutApiClientTest\Service
 */
class OAuth2ServiceUTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var string
     */
    protected $dummyUri = 'http://www.example.com';

    protected $dummyClientId = 'clientId';

    protected $dummyClientSecret = 'clientSecret';

    /**
     * @var OAuth2Service
     */
    protected $oAuthService;

    public function setUp()
    {
        $this->oAuthService = new OAuth2Service('initial');
    }

    public function testConstructorShouldSetDummyUri()
    {
        $this->assertAttributeEquals('initial', 'requestUri', $this->oAuthService);
    }

    public function testConstructorShouldSetNewHttpClient()
    {
        $this->assertAttributeEquals(new Client(), 'httpClient', $this->oAuthService);
    }

    public function testConstructorShouldSetGivenHttpClient()
    {
        $client = new Client();
        $client->setUri($this->dummyUri);
        $oAuthService = new OAuth2Service('initial', $client);
        $this->assertAttributeEquals($client, 'httpClient', $oAuthService);
    }

    public function testSetHttpClient()
    {
        $client = new Client();
        $client->setUri($this->dummyUri); //to check if it's realy not the same http client
        $this->oAuthService->setHttpClient($client);
        $this->assertAttributeEquals($client, 'httpClient', $this->oAuthService);
        return $this->oAuthService;
    }

    /**
     * @depends testSetHttpClient
     */
    public function testGetHttpClient($oAuthService)
    {
        $client = new Client();
        $client->setUri($this->dummyUri); //to check if it's realy not the same http client
        $this->assertEquals($client, $oAuthService->getHttpClient());
    }

    public function testSetRequestUri()
    {
        $uri = $this->dummyUri;
        $this->oAuthService->setRequestUri($uri);
        $this->assertAttributeEquals($uri, 'requestUri', $this->oAuthService);
        return $this->oAuthService;
    }

    /**
     * @depends testSetRequestUri
     */
    public function testGetRequestUri($oAuthService)
    {
        $uri = $this->dummyUri;
        $this->assertEquals($uri, $oAuthService->getRequestUri());
    }

    public function testGrantTypeConstant()
    {
        $this->assertEquals('client_credentials', OAuth2Service::GRANT_TYPE_CLIENT_CREDENTIALS);
    }

    public function testGetAccessTokenShouldResetClientParameters()
    {
        $client = $this->getSuccessMockClient();
        $client->expects($this->once())->method('resetParameters')->with($this->equalTo(true))->willReturnSelf();
        $this->oAuthService->setHttpClient($client);
        $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
    }

    public function testGetAccessTokenShouldSetPostMethod()
    {
        $client = $this->getSuccessMockClient();
        $client->expects($this->once())->method('setMethod')->with($this->equalTo('POST'))->willReturnSelf();
        $this->oAuthService->setHttpClient($client);
        $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
    }

    public function testGetAccessTokenShouldSetAuthenticationHeader()
    {
        $client = $this->getSuccessMockClient();
        $client->expects($this->once())->method('setAuth')->willReturnSelf();
        $this->oAuthService->setHttpClient($client);
        $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
    }

    /**
     * @expectedException \WirecardCheckoutApiClient\Exception\InvalidArgumentException
     */
    public function testGetAccessTokenWithInvalidAuthenticationHeaderWillThrowInvalidArgumentException()
    {
        $dummyException = new ZendHttpInvalidArgumentException('dummyMessage', 42);
        $client = $this->getMockClient();
        $client->expects($this->once())->method('setAuth')->willThrowException($dummyException);

        $this->oAuthService->setHttpClient($client);
        try {
            $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($dummyException->getMessage(), $e->getMessage());
            $this->assertEquals($dummyException->getCode(), $e->getCode());
            $this->assertEquals($dummyException, $e->getPrevious());
            throw $e;
        }

    }

    public function testGetAccessTokenSetsGrantTypeClientCredentialsAsParameterPost()
    {
        $client = $this->getSuccessMockClient();
        $client->expects($this->once())->method('setParameterPost')->with($this->equalTo(Array('grant_type' => 'client_credentials')))->willReturnSelf();
        $this->oAuthService->setHttpClient($client);
        $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
    }

    public function testGetAccessTokenSetsRequestUriAsUri()
    {
        $client = $this->getSuccessMockClient();
        $client->expects($this->once())->method('setUri')->with($this->equalTo($this->dummyUri))->willReturnSelf();
        $this->oAuthService->setHttpClient($client);
        $this->oAuthService->setRequestUri($this->dummyUri);
        $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
    }

    public function testGetAccessTokenUsesHttpClientSend()
    {
        $client = $this->getSuccessMockClient();
        $client->expects($this->once())->method('send');
        $this->oAuthService->setHttpClient($client);
        $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
    }

    public function testGetAccessTokenShouldReturnToken()
    {
        $client = $this->getSuccessMockClient();
        $this->oAuthService->setHttpClient($client);
        $token = $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
        $this->assertEquals('db4f71db-99c6-49bc-8085-b335df9825d9', $token);
    }

    /**
     * @expectedException RuntimeException
     */
    public function testGetAccessTokenWithInvalidResponseThrowsRuntimeException()
    {
        $client = $this->getMockClient();
        $mockResponse = new Response();
        $mockResponse->setStatusCode(Response::STATUS_CODE_200);
        $mockResponse->setContent('{invalidJSONString[}');
        $client->expects($this->once())->method('send')->willReturn($mockResponse);
        $this->oAuthService->setHttpClient($client);
        $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
    }

    /**
     * @expectedException RuntimeException
     */
    public function testGetAccessTokenWithStatusCode400ThrowsRuntimeException()
    {
        $client = $this->getMockClient();
        $mockResponse = new Response();
        $mockResponse->setStatusCode(Response::STATUS_CODE_400);
        $mockResponse->setContent('{"error": "MOCK_ERROR", "message": "DETAIL MESSAGE"}');
        $client->expects($this->once())->method('send')->willReturn($mockResponse);
        $this->oAuthService->setHttpClient($client);
        try {
            $this->oAuthService->getAccessToken($this->dummyClientId, $this->dummyClientSecret);
        } catch (RuntimeException $e) {
            $this->assertEquals(400, $e->getCode());
            $this->assertEquals('MOCK_ERROR: DETAIL MESSAGE', $e->getMessage());
            throw $e;
        }
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getSuccessMockClient()
    {
        $mockResponse = new Response();
        $mockResponse->setStatusCode(Response::STATUS_CODE_200);
        $mockResponse->setContent('{"access_token":"db4f71db-99c6-49bc-8085-b335df9825d9","token_type":"bearer","expires_in":18023,"scope":"masterpass"}');
        $client = $this->getMockClient();
        $client->expects($this->once())->method('send')->willReturn($mockResponse);
        return $client;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockClient()
    {
        $client = $this->getMockBuilder('Zend\\Http\\Client')->getMock();
        return $client;
    }
}
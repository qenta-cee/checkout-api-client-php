<?php
namespace WirecardCheckoutApiClientTest\Service\MasterPass;

use WirecardCheckoutApiClient\Service\MasterPass\PaymentResourceService;
use WirecardCheckoutApiClient\Service\OAuth2Service;
use WirecardCheckoutApiClient\Entity\Collection;
use Zend\Http\Client;
use Zend\Json\Json;

class PaymentResourceServiceUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OAuth2Service
     */
    protected $dummyOAuth2Service;

    /**
     * @var Collection
     */
    protected $dummyCollection;

    /**
     * @var Client
     */
    protected $dummyHttpClient;

    /**
     * @var PaymentResourceService
     */
    protected $resourceService;

    protected $dummyEntity;

    public function setUp()
    {
        $dummyResponse = $this->createMock('Zend\\Http\\Response');
        $dummyResponse->method('getBody')->willReturn(Json::encode(
            Array(
                Array('mock' => 'DATA', 'description' => 'DUMMY_DESC'),
            )
        ));
        $this->dummyOAuth2Service = $this->getMockBuilder('WirecardCheckoutApiClient\\Service\\OAuth2Service')
            ->setConstructorArgs(Array('http://www.example.com/service'))
            ->getMock();
        $this->dummyEntity = $this->createMock('WirecardCheckoutApiClient\\Entity\\EntityInterface');

        $this->dummyHttpClient = $this->createMock('Zend\\Http\\Client');
        $this->dummyHttpClient->method('send')->willReturn($dummyResponse);
        $this->resourceService = new PaymentResourceService($this->dummyOAuth2Service, $this->dummyHttpClient);
    }

    public function testCreateShouldCallGetAccessTokenFromOAuth2Service()
    {
        $dummyClientId = 'DUMMY_CLIENT_ID';
        $dummyClientSecret = 'DUMMY_CLIENT_SECRET';
        $this->resourceService->setAuthenticationCredentials($dummyClientId, $dummyClientSecret);
        $oAuth2Service = $this->getSuccessOAuth2Service();
        $oAuth2Service->expects($this->once())
            ->method('getAccessToken')
            ->with(
                $this->equalTo($dummyClientId),
                $this->equalTo($dummyClientSecret)
            )->willReturn('DUMMY-TOKEN');
        $this->resourceService->setOAuth2Service($oAuth2Service);
        $this->resourceService->create($this->dummyEntity);
    }

    public function testGetShouldCallGetAccessTokenFromOAuth2Service()
    {
        $dummyClientId = 'DUMMY_CLIENT_ID';
        $dummyClientSecret = 'DUMMY_CLIENT_SECRET';
        $this->resourceService->setAuthenticationCredentials($dummyClientId, $dummyClientSecret);
        $this->resourceService->setMerchantId('DUMMY_MERCHANT_ID');
        $oAuth2Service = $this->getSuccessOAuth2Service();
        $oAuth2Service->expects($this->once())
            ->method('getAccessToken')
            ->with(
                $this->equalTo($dummyClientId),
                $this->equalTo($dummyClientSecret)
            )->willReturn('DUMMY-TOKEN');
        $this->resourceService->setOAuth2Service($oAuth2Service);
        $this->resourceService->get($this->dummyEntity);
    }

    //TODO: write better tests

    public function testSetMerchantId() {
        $this->resourceService->setMerchantId('DUMMY_MERCHANT_ID');
        $this->assertAttributeEquals('DUMMY_MERCHANT_ID', 'merchantId', $this->resourceService);
        return $this->resourceService;
    }

    /**
     * @depends testSetMerchantId
     * @param PaymentResourceService $resourceService
     */
    public function testGetMerchantId($resourceService) {
        $this->assertEquals('DUMMY_MERCHANT_ID', $resourceService->getMerchantId());
    }

    public function testGetMerchantIdFromClientId() {
        $this->resourceService->setAuthenticationCredentials('DUMMY_CLIENT_ID', 'DUMMY_CLIENT_SECRET');
        $this->assertEquals('DUMMY_CLIENT_ID', $this->resourceService->getMerchantId());
    }

    protected function getSuccessOAuth2Service()
    {
        $oAuth2Service = $this->dummyOAuth2Service;
        $oAuth2Service->expects($this->once())
            ->method('getAccessToken')
            ->willReturn('DUMMY-TOKEN');
        return $oAuth2Service;
    }
}
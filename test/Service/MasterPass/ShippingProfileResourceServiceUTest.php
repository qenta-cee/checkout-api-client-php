<?php
namespace WirecardCheckoutApiClientTest\Service\MasterPass;

use WirecardCheckoutApiClient\Service\MasterPass\ShippingProfileResourceService;
use WirecardCheckoutApiClient\Service\OAuth2Service;
use WirecardCheckoutApiClient\Entity\Collection;
use Zend\Http\Client;
use Zend\Json\Json;

/**
 * Class ShippingProfileResourceServiceUTest
 * @package WirecardCheckoutApiClientTest\Service\MasterPass
 */
class ShippingProfileResourceServiceUTest extends \PHPUnit_Framework_TestCase
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
     * @var ShippingProfileResourceService
     */
    protected $resourceService;

    public function setUp()
    {
        $dummyResponse = $this->createMock('Zend\\Http\\Response');
        $dummyResponse->method('getBody')->willReturn(Json::encode(
            Array(
                Array('id' => 'WDCEDACH', 'description' => 'DUMMY_DESC'),
            )
        ));
        $this->dummyOAuth2Service = $this->getMockBuilder('WirecardCheckoutApiClient\\Service\\OAuth2Service')
            ->setConstructorArgs(Array('http://www.example.com/service'))
            ->getMock();
        $dummyEntity = $this->createMock('WirecardCheckoutApiClient\\Entity\\EntityInterface');
        $this->dummyCollection = $this->getMockBuilder('WirecardCheckoutApiClient\\Entity\\Collection')->setConstructorArgs(Array($dummyEntity))->getMock();

        $this->dummyHttpClient = $this->createMock('Zend\\Http\\Client');
        $this->dummyHttpClient->method('send')->willReturn($dummyResponse);
        $this->resourceService = new ShippingProfileResourceService($this->dummyOAuth2Service, $this->dummyHttpClient);
    }

    public function testGetListShouldCallGetAccessTokenFormOAuth2Service()
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
        $this->resourceService->getList($this->dummyCollection);
    }

    //TODO: write better tests

    protected function getSuccessOAuth2Service()
    {
        $oAuth2Service = $this->dummyOAuth2Service;
        $oAuth2Service->expects($this->once())
            ->method('getAccessToken')
            ->willReturn('DUMMY-TOKEN');
        return $oAuth2Service;
    }
}
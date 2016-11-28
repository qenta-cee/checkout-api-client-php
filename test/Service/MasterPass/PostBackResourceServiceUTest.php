<?php
/**
 * Created by IntelliJ IDEA.
 * User: reka.horvath
 * Date: 12.01.2016
 * Time: 08:26
 */

namespace WirecardCheckoutApiClientTest\Service\MasterPass;

use WirecardCheckoutApiClient\Service\MasterPass\PostBackResourceService;
use WirecardCheckoutApiClient\Service\OAuth2Service;
use Zend\Http\Client;
use Zend\Json\Json;

class PostBackResourceServiceUTest extends \PHPUnit_Framework_TestCase
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
     * @var PostBackResourceService
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
        $this->resourceService = new PostBackResourceService($this->dummyOAuth2Service, $this->dummyHttpClient);
    }

    public function testCreateShouldCallGetAccessTokenFormOAuth2Service()
    {
        $dummyClientId = 'DUMMY_CLIENT_ID';
        $dummyClientSecret = 'DUMMY_CLIENT_SECRET';
        $this->resourceService->setAuthenticationCredentials($dummyClientId, $dummyClientSecret);
        $oAuth2Service = $this->getSuccessOAuth2Service();
        $this->resourceService->setOAuth2Service($oAuth2Service);
        $oAuth2Service->expects($this->once())
            ->method('getAccessToken')
            ->with(
                $this->equalTo($dummyClientId),
                $this->equalTo($dummyClientSecret)
            )->willReturn('DUMMY-TOKEN');

        $transaction = $this->createDummyTransaction();
        $this->resourceService->create($transaction);
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

    protected function createDummyTransaction(){
        $transaction = new \WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Transaction();
        $transaction->setTransactionStatus("SUCCESS");
        $amount = new \WirecardCheckoutApiClient\Entity\Amount();
        $amount->setAmount(42.00);
        $amount->setCurrency("EUR");
        $transaction->setAmount($amount);
        $transaction->setPurchaseDateFromDateTime(new \DateTime());
        $transaction->setApprovalCode("xx-approval-code-18");
        return $transaction;
    }

}

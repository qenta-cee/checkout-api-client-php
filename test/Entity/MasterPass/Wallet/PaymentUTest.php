<?php
namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Payment;

class PaymentUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Payment
     */
    protected $entity;

    /**
     * @var Amount
     */
    protected $totalAmount;

    /**
     * @var Amount
     */
    protected $depositAmount;

    /**
     * @var Amount
     */
    protected $approveAmount;

    /**
     * @var \DateTime
     */
    protected $processingDate;

    /**
     * @var String
     */
    protected $processingDateAsString;

    public function setUp() {
        $this->entity = new Payment();
        $this->totalAmount = new Amount();
        $this->depositAmount = new Amount();
        $this->approveAmount = new Amount();
        $this->processingDate = new \DateTime();
        $this->processingDateAsString = gmdate("Y-m-d\TH:i:s\Z", $this->processingDate->getTimestamp());
    }

    public function testSetOrderNumber() {
        $this->entity->setOrderNumber(42);
        $this->assertAttributeEquals(42, 'orderNumber', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetOrderNumber
     * @param Payment $entity
     */
    public function testGetOrderNumber($entity) {
        $this->assertEquals(42, $entity->getOrderNumber());
    }

    public function testSetOrderDescription() {
        $this->entity->setOrderDescription('My order description');
        $this->assertAttributeEquals('My order description', 'orderDescription', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetOrderDescription
     * @param Payment $entity
     */
    public function testGetOrderDescription($entity) {
        $this->assertEquals('My order description', $entity->getOrderDescription());
    }

    public function testSetTotalAmount() {
        $this->entity->setTotalAmount($this->totalAmount);
        $this->assertAttributeEquals($this->totalAmount, 'totalAmount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetTotalAmount
     * @param Payment $entity
     */
    public function testGetTotalAmount($entity) {
        $this->assertEquals($this->totalAmount, $entity->getTotalAmount());
    }

    public function testSetCustomerStatement() {
        $this->entity->setCustomerStatement('My custom statement');
        $this->assertAttributeEquals('My custom statement', 'customerStatement', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetCustomerStatement
     * @param Payment $entity
     */
    public function testGetCustomerStatement($entity) {
        $this->assertEquals('My custom statement', $entity->getCustomerStatement());
    }

    public function testSetOrderReference() {
        $this->entity->setOrderReference('My order reference');
        $this->assertAttributeEquals('My order reference', 'orderReference', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetOrderReference
     * @param Payment $entity
     */
    public function testGetOrderReference($entity) {
        $this->assertEquals('My order reference', $entity->getOrderReference());
    }

    public function testSetDeposit() {
        $this->entity->setDeposit(true);
        $this->assertAttributeEquals(true, 'deposit', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetDeposit
     * @param Payment $entity
     */
    public function testGetDeposit($entity) {
        $this->assertEquals(true, $entity->isDeposit());
    }

    public function testSetProcessingState() {
        $this->entity->setProcessingState('processing state');
        $this->assertAttributeEquals('processing state', 'processingState', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetProcessingState
     * @param Payment $entity
     */
    public function testGetProcessingState($entity) {
        $this->assertEquals('processing state', $entity->getProcessingState());
    }

    public function testSetApprovalCode() {
        $this->entity->setApprovalCode('approval code');
        $this->assertAttributeEquals('approval code', 'approvalCode', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetApprovalCode
     * @param Payment $entity
     */
    public function testGetApprovalCode($entity) {
        $this->assertEquals('approval code', $entity->getApprovalCode());
    }

    public function testSetApproveAmount() {
        $this->entity->setApproveAmount($this->approveAmount);
        $this->assertAttributeEquals($this->approveAmount, 'approveAmount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetApproveAmount
     * @param Payment $entity
     */
    public function testGetApproveAmount($entity) {
        $this->assertEquals($this->approveAmount, $entity->getApproveAmount());
    }

    public function testSetDepositAmount() {
        $this->entity->setDepositAmount($this->depositAmount);
        $this->assertAttributeEquals($this->depositAmount, 'depositAmount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetDepositAmount
     * @param Payment $entity
     */
    public function testGetDepositAmount($entity) {
        $this->assertEquals($this->depositAmount, $entity->getDepositAmount());
    }

    public function testSetInstrumentCountry() {
        $this->entity->setInstrumentCountry('instrument country');
        $this->assertAttributeEquals('instrument country', 'instrumentCountry', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetInstrumentCountry
     * @param Payment $entity
     */
    public function testGetInstrumentCountry($entity) {
        $this->assertEquals('instrument country', $entity->getInstrumentCountry());
    }

    public function testSetMerchantReference() {
        $this->entity->setMerchantReference('merchant reference');
        $this->assertAttributeEquals('merchant reference', 'merchantReference', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetMerchantReference
     * @param Payment $entity
     */
    public function testGetMerchantReference($entity) {
        $this->assertEquals('merchant reference', $entity->getMerchantReference());
    }

    public function testSetPaymentNumber() {
        $this->entity->setPaymentNumber(666);
        $this->assertAttributeEquals(666, 'paymentNumber', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetPaymentNumber
     * @param Payment $entity
     */
    public function testGetPaymentNumber($entity) {
        $this->assertEquals(666, $entity->getPaymentNumber());
    }

    public function testSetPaymentState() {
        $this->entity->setPaymentState('payment state');
        $this->assertAttributeEquals('payment state', 'paymentState', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetPaymentState
     * @param Payment $entity
     */
    public function testGetPaymentState($entity) {
        $this->assertEquals('payment state', $entity->getPaymentState());
    }

    public function testSetProviderReferenceNumber() {
        $this->entity->setProviderReferenceNumber('provider reference number');
        $this->assertAttributeEquals('provider reference number', 'providerReferenceNumber', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetProviderReferenceNumber
     * @param Payment $entity
     */
    public function testGetProviderReferenceNumber($entity) {
        $this->assertEquals('provider reference number', $entity->getProviderReferenceNumber());
    }

    public function testSetGatewayReferenceNumber() {
        $this->entity->setGatewayReferenceNumber('gateway reference number');
        $this->assertAttributeEquals('gateway reference number', 'gatewayReferenceNumber', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetGatewayReferenceNumber
     * @param Payment $entity
     */
    public function testGetGatewayReferenceNumber($entity) {
        $this->assertEquals('gateway reference number', $entity->getGatewayReferenceNumber());
    }

    public function testSetProcessingDate() {
        $this->entity->setProcessingDateFromObject($this->processingDate);
        $this->assertAttributeEquals($this->processingDateAsString, 'processingDate', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetProcessingDate
     * @param Payment $entity
     */
    public function testGetProcessingDate($entity) {
        $this->assertEquals($this->processingDateAsString, $entity->getProcessingDate());
    }

    public function testSetNotificationUrl() {
        $this->entity->setNotificationUrl('http://www.example.com/notify');
        $this->assertAttributeEquals('http://www.example.com/notify', 'notificationUrl', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetNotificationUrl
     * @param Payment $entity
     */
    public function testGetNotificationUrl($entity) {
        $this->assertEquals('http://www.example.com/notify', $entity->getNotificationUrl());
    }

    public function testSetErrorCode() {
        $this->entity->setErrorCode(30000);
        $this->assertAttributeEquals(30000, 'errorCode', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetErrorCode
     * @param Payment $entity
     */
    public function testGetErrorCode($entity) {
        $this->assertEquals(30000, $entity->getErrorCode());
    }

    public function testSetErrorMessage() {
        $this->entity->setErrorMessage('my error message');
        $this->assertAttributeEquals('my error message', 'errorMessage', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetErrorMessage
     * @param Payment $entity
     */
    public function testGetErrorMessage($entity) {
        $this->assertEquals('my error message', $entity->getErrorMessage());
    }

    public function testSetPaySysMessage() {
        $this->entity->setPaySysMessage('my paysys message');
        $this->assertAttributeEquals('my paysys message', 'paySysMessage', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetPaySysMessage
     * @param Payment $entity
     */
    public function testGetPaySysMessage($entity) {
        $this->assertEquals('my paysys message', $entity->getPaySysMessage());
    }

    public function testSetRiskSupress() {
        $this->entity->setRiskSupress(true);
        $this->assertAttributeEquals(true, 'riskSupress', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetRiskSupress
     * @param Payment $entity
     */
    public function testGetRiskSupress($entity) {
        $this->assertEquals(true, $entity->isRiskSupress());
    }

    public function testSetRiskConfig() {
        $this->entity->setRiskConfigAlias('my risk config');
        $this->assertAttributeEquals('my risk config', 'riskConfigAlias', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetRiskConfig
     * @param Payment $entity
     */
    public function testGetRiskConfig($entity) {
        $this->assertEquals('my risk config', $entity->getRiskConfigAlias());
    }

    public function testSetSubMerchantId() {
        $this->entity->setSubMerchantId('my sub merchant id');
        $this->assertAttributeEquals('my sub merchant id', 'subMerchantId', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetSubMerchantId
     * @param Payment $entity
     */
    public function testGetSubMerchantId($entity) {
        $this->assertEquals('my sub merchant id', $entity->getSubMerchantId());
    }

    public function testSetSubMerchantName() {
        $this->entity->setSubMerchantName('my sub merchant name');
        $this->assertAttributeEquals('my sub merchant name', 'subMerchantName', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetSubMerchantName
     * @param Payment $entity
     */
    public function testGetSubMerchantName($entity) {
        $this->assertEquals('my sub merchant name', $entity->getSubMerchantName());
    }

    public function testSetSubMerchantCountry() {
        $this->entity->setSubMerchantCountry('AT');
        $this->assertAttributeEquals('AT', 'subMerchantCountry', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetSubMerchantCountry
     * @param Payment $entity
     */
    public function testGetSubMerchantCountry($entity) {
        $this->assertEquals('AT', $entity->getSubMerchantCountry());
    }

    public function testSetSubMerchantState() {
        $this->entity->setSubMerchantState('my sub merchant state');
        $this->assertAttributeEquals('my sub merchant state', 'subMerchantState', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetSubMerchantState
     * @param Payment $entity
     */
    public function testGetSubMerchantState($entity) {
        $this->assertEquals('my sub merchant state', $entity->getSubMerchantState());
    }

    public function testSetSubMerchantCity() {
        $this->entity->setSubMerchantCity('my sub merchant city');
        $this->assertAttributeEquals('my sub merchant city', 'subMerchantCity', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetSubMerchantCity
     * @param Payment $entity
     */
    public function testGetSubMerchantCity($entity) {
        $this->assertEquals('my sub merchant city', $entity->getSubMerchantCity());
    }

    public function testSetSubMerchantStreet() {
        $this->entity->setSubMerchantStreet('my sub merchant street');
        $this->assertAttributeEquals('my sub merchant street', 'subMerchantStreet', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetSubMerchantStreet
     * @param Payment $entity
     */
    public function testGetSubMerchantStreet($entity) {
        $this->assertEquals('my sub merchant street', $entity->getSubMerchantStreet());
    }

    public function testSetSubMerchantZipCode() {
        $this->entity->setSubMerchantZipCode('my sub merchant zip code');
        $this->assertAttributeEquals('my sub merchant zip code', 'subMerchantZipCode', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetSubMerchantZipCode
     * @param Payment $entity
     */
    public function testGetSubMerchantZipCode($entity) {
        $this->assertEquals('my sub merchant zip code', $entity->getSubMerchantZipCode());
    }

    public function testSetGatewayContractNumber() {
        $this->entity->setGatewayContractNumber('my contract number');
        $this->assertAttributeEquals('my contract number', 'gatewayContractNumber', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetGatewayContractNumber
     * @param Payment $entity
     */
    public function testGetGatewayContractNumber($entity) {
        $this->assertEquals('my contract number', $entity->getGatewayContractNumber());
    }

    public function testSetAvsResultCode() {
        $this->entity->setAvsResultCode('avs result code');
        $this->assertAttributeEquals('avs result code', 'avsResultCode', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAvsResultCode
     * @param Payment $entity
     */
    public function testGetAvsResultCode($entity) {
        $this->assertEquals('avs result code', $entity->getAvsResultCode());
    }

    public function testSetAvsResultMessage() {
        $this->entity->setAvsResultMessage('avs result msg');
        $this->assertAttributeEquals('avs result msg', 'avsResultMessage', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAvsResultMessage
     * @param Payment $entity
     */
    public function testGetAvsResultMessage($entity) {
        $this->assertEquals('avs result msg', $entity->getAvsResultMessage());
    }

    public function testSetAvsProviderResultCode() {
        $this->entity->setAvsProviderResultCode('avs provider result code');
        $this->assertAttributeEquals('avs provider result code', 'avsProviderResultCode', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAvsProviderResultCode
     * @param Payment $entity
     */
    public function testGetAvsProviderResultCode($entity) {
        $this->assertEquals('avs provider result code', $entity->getAvsProviderResultCode());
    }

    public function testSetAvsProviderResultMessage() {
        $this->entity->setAvsProviderResultMessage('avs provider result msg');
        $this->assertAttributeEquals('avs provider result msg', 'avsProviderResultMessage', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAvsProviderResultMessage
     * @param Payment $entity
     */
    public function testGetAvsProviderResultMessage($entity) {
        $this->assertEquals('avs provider result msg', $entity->getAvsProviderResultMessage());
    }

    /**
     * @depends testSetOrderNumber
     */
    public function test__toString($entity)
    {
        $this->assertEquals(42, $entity->__toString());
    }
}
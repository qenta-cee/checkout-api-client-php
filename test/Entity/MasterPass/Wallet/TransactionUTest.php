<?php

namespace WirecardCheckoutApiClientTest\Entity\MasterPass\Wallet;

use  WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Transaction;
use WirecardCheckoutApiClient\Entity\Amount;

class TransactionUTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Transaction
     */
    protected $entity;

    /**
     * @var Amount
     */
    protected $amount;

    protected $dummyApprovalCode;

    public function setUp()
    {
        $this->entity = new Transaction();
        $this->amount = new Amount();
        $this->dummyApprovalCode = "55";
    }

    public function testSetApprovalCode()
    {
        $this->entity->setApprovalCode($this->dummyApprovalCode);
        $this->assertAttributeEquals($this->dummyApprovalCode, 'approvalCode', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetApprovalCode
     */
    public function testGetApprovalCode(Transaction $entity)
    {
        $this->assertEquals($this->dummyApprovalCode, $entity->getApprovalCode());
    }

    /**
     * @depends testSetApprovalCode
     */
    public function test__toString(Transaction $entity)
    {
        $this->assertEquals($this->dummyApprovalCode, $entity->__toString());
    }

    public function testSetAmount()
    {
        $this->entity->setAmount($this->amount);
        $this->assertAttributeEquals($this->amount, 'amount', $this->entity);
        return $this->entity;
    }

    /**
     * @depends testSetAmount
     * @param Basket $entity
     */
    public function testGetAmount(Transaction $entity)
    {
        $this->assertEquals($this->amount, $entity->getAmount());
    }

}

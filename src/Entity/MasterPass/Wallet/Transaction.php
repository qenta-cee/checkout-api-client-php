<?php

namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use DateTime;
use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\EntityInterface;

class Transaction implements EntityInterface
{
    /**
     * @var String
     */
    protected $transactionStatus;

    /**
     * @var Amount
     */
    protected $amount;

    /**
     * @var String
     * The purchase date converted to UTC as string
     */
    protected $purchaseDate;

    /**
     * @var String
     */
    protected $approvalCode;

    /**
     * @return String
     */
    public function getTransactionStatus()
    {
        return $this->transactionStatus;
    }

    /**
     * @param String $transactionStatus
     * @return Transaction
     */
    public function setTransactionStatus($transactionStatus)
    {
        $this->transactionStatus = $transactionStatus;
        return $this;
    }

    /**
     * @return Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param Amount $amount
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return String
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * @param DateTime $purchaseDate
     * @return Transaction
     */
    public function setPurchaseDateFromDateTime($purchaseDate)
    {
        $purchaseDateAsText = gmdate("Y-m-d\TH:i:s\Z", $purchaseDate->getTimestamp());
        $this->purchaseDate = $purchaseDateAsText;
        return $this;
    }

    /**
     * @return String
     */
    public function getApprovalCode()
    {
        return $this->approvalCode;
    }

    /**
     * @param String $approvalCode
     * @return Transaction
     */
    public function setApprovalCode($approvalCode)
    {
        $this->approvalCode = $approvalCode;
        return $this;
    }


    /**
     * retrieve the string interpretation for this instance
     *
     * @return string
     */
    public function __toString()
    {
        return $this->approvalCode;
    }
}

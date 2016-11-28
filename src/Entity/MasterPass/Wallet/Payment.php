<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\EntityInterface;
use WirecardCheckoutApiClient\Entity\Amount;

class Payment implements EntityInterface {
    /**
     * @var int
     */
    protected $orderNumber;

    /**
     * @var String
     */
    protected $orderDescription;

    /**
     * @var Amount
     */
    protected $totalAmount;

    /**
     * @var String
     */
    protected $customerStatement;

    /**
     * @var String
     */
    protected $orderReference;

    /**
     * @var bool
     */
    protected $deposit = false;

    /**
     * @var String
     */
    protected $processingState;

    /**
     * @var String
     */
    protected $approvalCode;

    /**
     * @var Amount
     */
    protected $approveAmount;

    /**
     * @var Amount
     */
    protected $depositAmount;

    /**
     * @var String
     */
    protected $instrumentCountry;

    /**
     * @var String
     */
    protected $merchantReference;

    /**
     * @var int
     */
    protected $paymentNumber;

    /**
     * @var String
     */
    protected $paymentState;

    /**
     * @var String
     */
    protected $providerReferenceNumber;

    /**
     * @var String
     */
    protected $gatewayReferenceNumber;

    /**
     * @var String
     */
    protected $gatewayContractNumber;

    /**
     * @var String
     * The processing date converted to UTC as string
     */
    protected $processingDate;

    /**
     * @var String
     */
    protected $notificationUrl;

    /**
     * @var bool
     */
    protected $riskSupress;

    /**
     * @var String
     */
    protected $riskConfigAlias;

    /**
     * @var String
     */
    protected $subMerchantId;

    /**
     * @var String
     */
    protected $subMerchantName;

    /**
     * @var String
     */
    protected $subMerchantCountry;

    /**
     * @var String
     */
    protected $subMerchantState;

    /**
     * @var String
     */
    protected $subMerchantCity;

    /**
     * @var String
     */
    protected $subMerchantStreet;

    /**
     * @var String
     */
    protected $subMerchantZipCode;

    /**
     * @var String
     */
    protected $avsResultCode;

    /**
     * @var String
     */
    protected $avsResultMessage;

    /**
     * @var String
     */
    protected $avsProviderResultCode;

    /**
     * @var String
     */
    protected $avsProviderResultMessage;

    /**
     * @var int
     */
    protected $errorCode;

    /**
     * @var String
     */
    protected $errorMessage;

    /**
     * @var String
     */
    protected $paySysMessage;

    /**
     * @return int
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param int $orderNumber
     * @return Payment
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDescription()
    {
        return $this->orderDescription;
    }

    /**
     * @param string $orderDescription
     * @return Payment
     */
    public function setOrderDescription($orderDescription)
    {
        $this->orderDescription = $orderDescription;
        return $this;
    }

    /**
     * @return Amount
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param Amount $totalAmount
     * @return Payment
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerStatement()
    {
        return $this->customerStatement;
    }

    /**
     * @param string $customerStatement
     * @return Payment
     */
    public function setCustomerStatement($customerStatement)
    {
        $this->customerStatement = $customerStatement;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderReference()
    {
        return $this->orderReference;
    }

    /**
     * @param string $orderReference
     * @return Payment
     */
    public function setOrderReference($orderReference)
    {
        $this->orderReference = $orderReference;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDeposit()
    {
        return $this->deposit;
    }

    /**
     * @param boolean $deposit
     * @return Payment
     */
    public function setDeposit($deposit)
    {
        $this->deposit = $deposit;
        return $this;
    }

    /**
     * @return String
     */
    public function getProcessingState()
    {
        return $this->processingState;
    }

    /**
     * @param String $processingState
     * @return Payment
     */
    public function setProcessingState($processingState)
    {
        $this->processingState = $processingState;
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
     * @return Payment
     */
    public function setApprovalCode($approvalCode)
    {
        $this->approvalCode = $approvalCode;
        return $this;
    }

    /**
     * @return Amount
     */
    public function getApproveAmount()
    {
        return $this->approveAmount;
    }

    /**
     * @param Amount $approveAmount
     * @return Payment
     */
    public function setApproveAmount($approveAmount)
    {
        $this->approveAmount = $approveAmount;
        return $this;
    }

    /**
     * @return Amount
     */
    public function getDepositAmount()
    {
        return $this->depositAmount;
    }

    /**
     * @param Amount $depositAmount
     * @return Payment
     */
    public function setDepositAmount($depositAmount)
    {
        $this->depositAmount = $depositAmount;
        return $this;
    }

    /**
     * @return String
     */
    public function getInstrumentCountry()
    {
        return $this->instrumentCountry;
    }

    /**
     * @param String $instrumentCountry
     * @return Payment
     */
    public function setInstrumentCountry($instrumentCountry)
    {
        $this->instrumentCountry = $instrumentCountry;
        return $this;
    }

    /**
     * @return String
     */
    public function getMerchantReference()
    {
        return $this->merchantReference;
    }

    /**
     * @param String $merchantReference
     * @return Payment
     */
    public function setMerchantReference($merchantReference)
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentNumber()
    {
        return $this->paymentNumber;
    }

    /**
     * @param int $paymentNumber
     * @return Payment
     */
    public function setPaymentNumber($paymentNumber)
    {
        $this->paymentNumber = $paymentNumber;
        return $this;
    }

    /**
     * @return String
     */
    public function getProviderReferenceNumber()
    {
        return $this->providerReferenceNumber;
    }

    /**
     * @param String $providerReferenceNumber
     * @return Payment
     */
    public function setProviderReferenceNumber($providerReferenceNumber)
    {
        $this->providerReferenceNumber = $providerReferenceNumber;
        return $this;
    }

    /**
     * @return String
     */
    public function getGatewayReferenceNumber()
    {
        return $this->gatewayReferenceNumber;
    }

    /**
     * @param String $gatewayReferenceNumber
     * @return Payment
     */
    public function setGatewayReferenceNumber($gatewayReferenceNumber)
    {
        $this->gatewayReferenceNumber = $gatewayReferenceNumber;
        return $this;
    }

    /**
     * @return String
     */
    public function getProcessingDate()
    {
        return $this->processingDate;
    }

    /**
     * @param String $processingDate
     * @return Payment
     */
    public function setProcessingDate($processingDate)
    {
        $this->processingDate = $processingDate;
        return $this;
    }

    /**
     * @param \DateTime $processingDate
     * @return Payment
     */
    public function setProcessingDateFromObject($processingDate)
    {
        $processingDateAsText = gmdate("Y-m-d\TH:i:s\Z", $processingDate->getTimestamp());
        $this->processingDate = $processingDateAsText;
        return $this;
    }

    /**
     * @return String
     */
    public function getPaymentState()
    {
        return $this->paymentState;
    }

    /**
     * @param String $paymentState
     * @return Payment
     */
    public function setPaymentState($paymentState)
    {
        $this->paymentState = $paymentState;
        return $this;
    }

    /**
     * @return String
     */
    public function getNotificationUrl()
    {
        return $this->notificationUrl;
    }

    /**
     * @param String $notificationUrl
     * @return Payment
     */
    public function setNotificationUrl($notificationUrl)
    {
        $this->notificationUrl = $notificationUrl;
        return $this;
    }

    /**
     * @return String
     */
    public function getGatewayContractNumber()
    {
        return $this->gatewayContractNumber;
    }

    /**
     * @param String $gatewayContractNumber
     * @return Payment
     */
    public function setGatewayContractNumber($gatewayContractNumber)
    {
        $this->gatewayContractNumber = $gatewayContractNumber;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRiskSupress()
    {
        return $this->riskSupress;
    }

    /**
     * @param boolean $riskSupress
     * @return Payment
     */
    public function setRiskSupress($riskSupress)
    {
        $this->riskSupress = $riskSupress;
        return $this;
    }

    /**
     * @return String
     */
    public function getRiskConfigAlias()
    {
        return $this->riskConfigAlias;
    }

    /**
     * @param String $riskConfigAlias
     * @return Payment
     */
    public function setRiskConfigAlias($riskConfigAlias)
    {
        $this->riskConfigAlias = $riskConfigAlias;
        return $this;
    }

    /**
     * @return String
     */
    public function getSubMerchantId()
    {
        return $this->subMerchantId;
    }

    /**
     * @param String $subMerchantId
     * @return Payment
     */
    public function setSubMerchantId($subMerchantId)
    {
        $this->subMerchantId = $subMerchantId;
        return $this;
    }

    /**
     * @return String
     */
    public function getSubMerchantName()
    {
        return $this->subMerchantName;
    }

    /**
     * @param String $subMerchantName
     * @return Payment
     */
    public function setSubMerchantName($subMerchantName)
    {
        $this->subMerchantName = $subMerchantName;
        return $this;
    }

    /**
     * @return String
     */
    public function getSubMerchantCountry()
    {
        return $this->subMerchantCountry;
    }

    /**
     * @param String $subMerchantCountry
     * @return Payment
     */
    public function setSubMerchantCountry($subMerchantCountry)
    {
        $this->subMerchantCountry = $subMerchantCountry;
        return $this;
    }

    /**
     * @return String
     */
    public function getSubMerchantState()
    {
        return $this->subMerchantState;
    }

    /**
     * @param String $subMerchantState
     * @return Payment
     */
    public function setSubMerchantState($subMerchantState)
    {
        $this->subMerchantState = $subMerchantState;
        return $this;
    }

    /**
     * @return String
     */
    public function getSubMerchantCity()
    {
        return $this->subMerchantCity;
    }

    /**
     * @param String $subMerchantCity
     * @return Payment
     */
    public function setSubMerchantCity($subMerchantCity)
    {
        $this->subMerchantCity = $subMerchantCity;
        return $this;
    }

    /**
     * @return String
     */
    public function getSubMerchantStreet()
    {
        return $this->subMerchantStreet;
    }

    /**
     * @param String $subMerchantStreet
     * @return Payment
     */
    public function setSubMerchantStreet($subMerchantStreet)
    {
        $this->subMerchantStreet = $subMerchantStreet;
        return $this;
    }

    /**
     * @return String
     */
    public function getSubMerchantZipCode()
    {
        return $this->subMerchantZipCode;
    }

    /**
     * @param String $subMerchantZipCode
     * @return Payment
     */
    public function setSubMerchantZipCode($subMerchantZipCode)
    {
        $this->subMerchantZipCode = $subMerchantZipCode;
        return $this;
    }

    /**
     * @return String
     */
    public function getAvsResultCode()
    {
        return $this->avsResultCode;
    }

    /**
     * @param String $avsResultCode
     * @return Payment
     */
    public function setAvsResultCode($avsResultCode)
    {
        $this->avsResultCode = $avsResultCode;
        return $this;
    }

    /**
     * @return String
     */
    public function getAvsResultMessage()
    {
        return $this->avsResultMessage;
    }

    /**
     * @param String $avsResultMessage
     * @return Payment
     */
    public function setAvsResultMessage($avsResultMessage)
    {
        $this->avsResultMessage = $avsResultMessage;
        return $this;
    }

    /**
     * @return String
     */
    public function getAvsProviderResultCode()
    {
        return $this->avsProviderResultCode;
    }

    /**
     * @param String $avsProviderResultCode
     * @return Payment
     */
    public function setAvsProviderResultCode($avsProviderResultCode)
    {
        $this->avsProviderResultCode = $avsProviderResultCode;
        return $this;
    }

    /**
     * @return String
     */
    public function getAvsProviderResultMessage()
    {
        return $this->avsProviderResultMessage;
    }

    /**
     * @param String $avsProviderResultMessage
     * @return Payment
     */
    public function setAvsProviderResultMessage($avsProviderResultMessage)
    {
        $this->avsProviderResultMessage = $avsProviderResultMessage;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param String $errorCode
     * @return Payment
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return String
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param String $errorMessage
     * @return Payment
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @return String
     */
    public function getPaySysMessage()
    {
        return $this->paySysMessage;
    }

    /**
     * @param String $paySysMessage
     * @return Payment
     */
    public function setPaySysMessage($paySysMessage)
    {
        $this->paySysMessage = $paySysMessage;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->orderNumber;
    }
}
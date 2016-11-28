<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\EntityInterface;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card\Plain;

class Card implements EntityInterface {

    /**
     * @var string
     */
    protected $transactionId;

    /**
     * @var integer
     */
    protected $expiryMonth;

    /**
     * @var integer
     */
    protected $expiryYear;

    /**
     * @var string
     */
    protected $cardHolderName;

    /**
     * @var string
     */
    protected $anonymousPan;

    /**
     * @var string
     */
    protected $hashedPan;

    /**
     * @var string
     */
    protected $maskedPan;

    /**
     * @var integer
     */
    protected $masterpassWalletId;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var Plain
     */
    protected $plainCard;

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return int
     */
    public function getExpiryMonth()
    {
        return $this->expiryMonth;
    }

    /**
     * @param int $expiryMonth
     */
    public function setExpiryMonth($expiryMonth)
    {
        $this->expiryMonth = $expiryMonth;
    }

    /**
     * @return int
     */
    public function getExpiryYear()
    {
        return $this->expiryYear;
    }

    /**
     * @param int $expiryYear
     */
    public function setExpiryYear($expiryYear)
    {
        $this->expiryYear = $expiryYear;
    }

    /**
     * @return string
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * @param string $cardHolderName
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
    }

    /**
     * @return string
     */
    public function getAnonymousPan()
    {
        return $this->anonymousPan;
    }

    /**
     * @param string $anonymousPan
     */
    public function setAnonymousPan($anonymousPan)
    {
        $this->anonymousPan = $anonymousPan;
    }

    /**
     * @return string
     */
    public function getHashedPan()
    {
        return $this->hashedPan;
    }

    /**
     * @param string $hashedPan
     */
    public function setHashedPan($hashedPan)
    {
        $this->hashedPan = $hashedPan;
    }

    /**
     * @return string
     */
    public function getMaskedPan()
    {
        return $this->maskedPan;
    }

    /**
     * @param string $maskedPan
     */
    public function setMaskedPan($maskedPan)
    {
        $this->maskedPan = $maskedPan;
    }

    /**
     * @return int
     */
    public function getMasterpassWalletId()
    {
        return $this->masterpassWalletId;
    }

    /**
     * @param int $masterpassWalletId
     */
    public function setMasterpassWalletId($masterpassWalletId)
    {
        $this->masterpassWalletId = $masterpassWalletId;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return Plain
     */
    public function getPlainCard()
    {
        return $this->plainCard;
    }

    /**
     * @param Plain $plainCard
     * @return Card $this
     */
    public function setPlainCard(Plain $plainCard)
    {
        $this->plainCard = $plainCard;
        return $this;
    }



    /**
     * retrieve the string interpretation for this instance
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getTransactionId();
    }


}
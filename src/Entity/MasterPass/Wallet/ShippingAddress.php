<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

/**
 * Class ShippingAddress
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet
 */
class ShippingAddress extends AbstractAddress {

    protected $recipientName;

    protected $recipientPhoneNumber;

    /**
     * @return mixed
     */
    public function getRecipientName()
    {
        return $this->recipientName;
    }

    /**
     * @param mixed $recipientName
     */
    public function setRecipientName($recipientName)
    {
        $this->recipientName = $recipientName;
    }

    /**
     * @return mixed
     */
    public function getRecipientPhoneNumber()
    {
        return $this->recipientPhoneNumber;
    }

    /**
     * @param mixed $recipientPhoneNumber
     */
    public function setRecipientPhoneNumber($recipientPhoneNumber)
    {
        $this->recipientPhoneNumber = $recipientPhoneNumber;
    }


}
<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass;

use WirecardCheckoutApiClient\Entity\EntityInterface;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\ShippingAddress;
use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\BillingAddress;

/**
 * Class Wallet
 * @package WirecardCheckoutApiClient\Entity\MasterPass
 */
class Wallet implements EntityInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $originUrl;

    /**
     * @var Basket
     */
    protected $basket;

    /**
     * @var Card
     */
    protected $card;

    /**
     * @var ShippingAddress
     */
    protected $shippingAddress;

    /**
     * @var BillingAddress
     */
    protected $billingAddress;

    /**
     * set the unique identifier for this resource
     *
     * @param $id
     * @return Wallet $this
     */
    public function setId($id)
    {
        $this->id = (string)$id;
        return $this;
    }

    /**
     * get the unique identifier for this resource
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set the originUrl for this wallet resource
     *
     * @param string $originUrl
     * @return Wallet $this
     */
    public function setOriginUrl($originUrl)
    {
        $this->originUrl = (string)$originUrl;
        return $this;
    }

    /**
     * get the originUrl for this wallet resource
     *
     * @return string
     */
    public function getOriginUrl()
    {
        return $this->originUrl;
    }

    /**
     * @param Basket $basket
     * @return Wallet $this
     */
    public function setBasket(Basket $basket)
    {
        $this->basket = $basket;
        return $this;
    }

    /**
     * @return Basket
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @return Card
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param Card $card
     */
    public function setCard(Card $card)
    {
        $this->card = $card;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     * @return Wallet
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    /**
     * @return BillingAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param BillingAddress $billingAddress
     * @return Wallet
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    /**
     * retrieve the string interpretation for this instance
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getId();
    }


}

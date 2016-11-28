<?php
namespace WirecardCheckoutApiClient\Entity;

/**
 * Class Amount
 * @package WirecardCheckoutApiClient\Entity
 */
class Amount implements EntityInterface
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @param float $amount
     * @return Amount $this
     */
    public function setAmount($amount)
    {
        $this->amount = (float)$amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $currency
     * @return Amount $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * retrieve the string interpretation for this instance
     *
     * @return mixed
     */
    public function __toString()
    {
        return md5(json_encode(get_object_vars($this)));
    }


}
<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\EntityInterface;

class Item implements EntityInterface
{
    /**
     * @var String
     */
    protected $name;

    /**
     * @var String
     */
    protected $description;

    /**
     * @var String
     */
    protected $articleNumber;

    /**
     * @var Integer
     */
    protected $quantity;

    /**
     * @var Amount
     */
    protected $unitGrossAmount;

    /**
     * @var Amount
     */
    protected $unitNetAmount;

    /**
     * @var Amount
     */
    protected $unitTaxAmount;

    /**
     * @var String
     */
    protected $unitTaxRate;

    /**
     * @var String
     */
    protected $imageUrl;

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param String $name
     * @return Item $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param String $description
     * @return Item $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return String
     */
    public function getArticleNumber()
    {
        return $this->articleNumber;
    }

    /**
     * @param String $articleNumber
     * @return Item $this
     */
    public function setArticleNumber($articleNumber)
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Item $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = (int)$quantity;
        return $this;
    }

    /**
     * @return Amount
     */
    public function getUnitGrossAmount()
    {
        return $this->unitGrossAmount;
    }

    /**
     * @param Amount $unitGrossAmount
     * @return Item $this
     */
    public function setUnitGrossAmount($unitGrossAmount)
    {
        $this->unitGrossAmount = $unitGrossAmount;
        return $this;
    }

    /**
     * @return Amount
     */
    public function getUnitNetAmount()
    {
        return $this->unitNetAmount;
    }

    /**
     * @param Amount $unitNetAmount
     * @return Item $this
     */
    public function setUnitNetAmount($unitNetAmount)
    {
        $this->unitNetAmount = $unitNetAmount;
        return $this;
    }

    /**
     * @return Amount
     */
    public function getUnitTaxAmount()
    {
        return $this->unitTaxAmount;
    }

    /**
     * @param Amount $unitTaxAmount
     * @return Item $this
     */
    public function setUnitTaxAmount($unitTaxAmount)
    {
        $this->unitTaxAmount = $unitTaxAmount;
        return $this;
    }

    /**
     * @return String
     */
    public function getUnitTaxRate()
    {
        return $this->unitTaxRate;
    }

    /**
     * @param String $unitTaxRate
     * @return Item $this
     */
    public function setUnitTaxRate($unitTaxRate)
    {
        $this->unitTaxRate = $unitTaxRate;
        return $this;
    }

    /**
     * @return String
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param String $imageUrl
     * @return Item $this
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * retrieve the string interpretation for this instance
     *
     * @return mixed
     */
    public function __toString()
    {
        //a normal json_encode keeps object values empty so we have to array_map them
        $vars = array_map(function($value) {
            return (string)$value;
        }, get_object_vars($this));

        return md5(json_encode($vars));
    }
}
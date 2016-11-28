<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\Amount;
use WirecardCheckoutApiClient\Entity\Collection;
use WirecardCheckoutApiClient\Entity\EntityInterface;

class Basket implements EntityInterface
{
    /**
     * @var Amount
     */
    protected $totalAmount;

    /**
     * @var Collection
     */
    protected $items;

    /**
     * @return Amount
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param Amount $totalAmount
     * @return Basket $this;
     */
    public function setTotalAmount(Amount $totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Collection $items
     * @return Basket $this;
     */
    public function setItems(Collection $items)
    {
        $this->items = $items;
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
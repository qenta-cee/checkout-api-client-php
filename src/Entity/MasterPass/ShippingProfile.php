<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass;

use WirecardCheckoutApiClient\Entity\EntityInterface;

/**
 * Class ShippingProfile
 * @package WirecardCheckoutApiClient\Entity\MasterPass
 */
class ShippingProfile implements EntityInterface {

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;

    public function __construct($id = null)
    {
        $this->setId($id ?: null);
    }

    /**
     * set the unique identifier for this resource
     *
     * @param string $id
     * @return ShippingProfile $this
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
     * set the description for this resource
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;
        return $this;
    }

    /**
     * get the description for this resource
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * retrieve the string interpretation for this instance
     *
     * @return mixed
     */
    public function __toString()
    {
        return $this->getId();
    }


}
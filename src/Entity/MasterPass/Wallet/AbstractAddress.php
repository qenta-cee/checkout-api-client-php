<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\EntityInterface;

abstract class AbstractAddress implements EntityInterface {

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $countrySubdivision;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $addressLine1;

    /**
     * @var string
     */
    protected $addressLine2;

    /**
     * @var string
     */
    protected $addressLine3;

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return AbstractAddress $this
     */
    public function setCity($city)
    {
        $this->city = (string)$city;
        return $this;
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
     * @return AbstractAddress $this
     */
    public function setCountry($country)
    {
        $this->country = (string)$country;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountrySubdivision()
    {
        return $this->countrySubdivision;
    }

    /**
     * @param string $countrySubdivision
     * @return AbstractAddress $this
     */
    public function setCountrySubdivision($countrySubdivision)
    {
        $this->countrySubdivision = (string)$countrySubdivision;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return AbstractAddress $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = (string)$postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine1
     * @return AbstractAddress $this
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = (string)$addressLine1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param string $addressLine2
     * @return AbstractAddress $this
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = (string)$addressLine2;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @param string $addressLine3
     * @return AbstractAddress $this
     */
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = (string)$addressLine3;
        return $this;
    }

    /**
     * retrieve the string interpretation for this instance
     *
     * @return string
     */
    public function __toString()
    {
        return md5(json_encode(get_object_vars($this)));
    }


}
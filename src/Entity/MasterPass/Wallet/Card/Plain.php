<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card;

use WirecardCheckoutApiClient\Entity\EntityInterface;

class Plain implements EntityInterface
{
    /**
     * @var string
     */
    protected $cardId;

    /**
     * @var string
     */
    protected $brandId;

    /**
     * @var string
     */
    protected $brandName;

    /**
     * @var string
     */
    protected $cavv;

    /**
     * @var string
     */
    protected $eciFlag;

    /**
     * @var string
     */
    protected $xid;

    /**
     * @var string
     */
    protected $masterCardAssignedId;

    /**
     * @var string
     */
    protected $paresStatus;

    /**
     * @var string
     */
    protected $signatureVerification;

    /**
     * @return string
     */
    public function getCardId()
    {
        return $this->cardId;
    }

    /**
     * @param string $cardId
     * @return Plain $this
     */
    public function setCardId($cardId)
    {
        $this->cardId = (string)$cardId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @param string $brandId
     * @return Plain $this
     */
    public function setBrandId($brandId)
    {
        $this->brandId = (string)$brandId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * @param string $brandName
     * @return Plain $this
     */
    public function setBrandName($brandName)
    {
        $this->brandName = (string)$brandName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCavv()
    {
        return $this->cavv;
    }

    /**
     * @param string $cavv
     * @return Plain $this
     */
    public function setCavv($cavv)
    {
        $this->cavv = (string)$cavv;
        return $this;
    }

    /**
     * @return string
     */
    public function getEciFlag()
    {
        return $this->eciFlag;
    }

    /**
     * @param string $eciFlag
     * @return Plain $this
     */
    public function setEciFlag($eciFlag)
    {
        $this->eciFlag = (string)$eciFlag;
        return $this;
    }

    /**
     * @return string
     */
    public function getXid()
    {
        return $this->xid;
    }

    /**
     * @param string $xid
     * @return Plain $this
     */
    public function setXid($xid)
    {
        $this->xid = (string)$xid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMasterCardAssignedId()
    {
        return $this->masterCardAssignedId;
    }

    /**
     * @param string $masterCardAssignedId
     * @return Plain $this
     */
    public function setMasterCardAssignedId($masterCardAssignedId)
    {
        $this->masterCardAssignedId = (string)$masterCardAssignedId;
        return $this;
    }

    /**
     * @return string
     */
    public function getParesStatus()
    {
        return $this->paresStatus;
    }

    /**
     * @param string $paresStatus
     * @return Plain $this
     */
    public function setParesStatus($paresStatus)
    {
        $this->paresStatus = (string)$paresStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignatureVerification()
    {
        return $this->signatureVerification;
    }

    /**
     * @param string $signatureVerification
     * @return Plain $this
     */
    public function setSignatureVerification($signatureVerification)
    {
        $this->signatureVerification = (string)$signatureVerification;
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
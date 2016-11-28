<?php
namespace WirecardCheckoutApiClient\Service\MasterPass;

use WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Payment;
use WirecardCheckoutApiClient\Service\AbstractResourceService;
use WirecardCheckoutApiClient\Entity\EntityInterface;
use WirecardCheckoutApiClient\Exception\RuntimeException;
use Zend\Http\Request;
use Zend\Json\Json;

class PaymentResourceService extends AbstractResourceService
{
    /**
     * @var string
     */
    protected $walletId;

    /**
     * @var string
     */
    protected $merchantId;

    /**
     * @param string $walletId
     * @return PaymentResourceService $this
     */
    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;
        return $this;
    }

    /**
     * @return string
     */
    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * @param EntityInterface $entity
     * @return Payment
     * @throws RuntimeException
     */
    public function create(EntityInterface $entity)
    {
        $replacements = Array(
            self::REPLACEMENT_MERCHANT_ID => $this->getMerchantId(),
            self::REPLACEMENT_ID => $this->getWalletId(),
        );
        $clientOptions = Array(
            self::OPTIONS_METHOD => Request::METHOD_POST,
            self::OPTIONS_REQUEST_URI => $this->getRequestUri($replacements),
            self::OPTIONS_ACCESS_TOKEN => $this->getAccessToken(),
            self::OPTIONS_REQUEST_BODY => Json::encode($this->getHydrator()->extract($entity))
        );

        $httpClient = $this->getPreparedHttpClient($clientOptions);
        $response = $this->sendRequest($httpClient);
        $entity = $this->getHydrator()->hydrate($response, $entity);
        return $entity;
    }

    /**
     * call resource endpoint GET to get the given Payment instances latest data
     *
     * @param EntityInterface $entity
     * @return Payment
     * @throws RuntimeException
     */
    public function get(EntityInterface $entity)
    {
        $replacements = Array(
            self::REPLACEMENT_MERCHANT_ID => $this->getMerchantId(),
            self::REPLACEMENT_ID => $this->getWalletId(),
        );
        $clientOptions = Array(
            self::OPTIONS_METHOD => Request::METHOD_GET,
            self::OPTIONS_REQUEST_URI => $this->getRequestUri($replacements),
            self::OPTIONS_ACCESS_TOKEN => $this->getAccessToken(),
        );

        $httpClient = $this->getPreparedHttpClient($clientOptions);
        $response = $this->sendRequest($httpClient);
        $entity = $this->getHydrator()->hydrate($response, $entity);
        return $entity;
    }

    /**
     * @param $merchantId
     * @return PaymentResourceService $this
     */
    public function setMerchantId($merchantId) {
        $this->merchantId = (string)$merchantId;
        return $this;
    }

    public function getMerchantId() {
        return ($this->merchantId) ? $this->merchantId : $this->clientId;
    }
}

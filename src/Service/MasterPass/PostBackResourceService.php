<?php
namespace WirecardCheckoutApiClient\Service\MasterPass;

use WirecardCheckoutApiClient\Service\AbstractResourceService;
use WirecardCheckoutApiClient\Entity\EntityInterface;
use WirecardCheckoutApiClient\Exception\RuntimeException;
use Zend\Http\Request;
use Zend\Json\Json;

class PostBackResourceService extends AbstractResourceService
{

    const REPLACEMENT_WALLET_ID = '{wallet_id}';

    /**
     * @var string
     */
    protected $walletId;

    /**
     * @param string $walletId
     * @return PostBackResourceService the actual object
     */
    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;
        return $this;
    }

    /**
     * @param EntityInterface $entity
     * @return EntityInterface
     * @throws RuntimeException
     */
    public function create(EntityInterface $entity)
    {
        $replacements = Array(
            self::REPLACEMENT_MERCHANT_ID => $this->clientId,
            self::REPLACEMENT_WALLET_ID => $this->walletId,
        );
        $clientOptions = Array(
            self::OPTIONS_METHOD => Request::METHOD_POST,
            self::OPTIONS_REQUEST_URI => $this->getRequestUri($replacements),
            self::OPTIONS_ACCESS_TOKEN => $this->getAccessToken(),
            self::OPTIONS_REQUEST_BODY => Json::encode($this->getHydrator()->extract($entity))
        );

        $httpClient = $this->getPreparedHttpClient($clientOptions);
        $this->sendRequest($httpClient);
    }
}

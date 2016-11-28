<?php
namespace WirecardCheckoutApiClient\Service\MasterPass;

use WirecardCheckoutApiClient\Entity\Collection;
use WirecardCheckoutApiClient\Entity\MasterPass\ShippingProfile;
use WirecardCheckoutApiClient\Service\AbstractResourceService;
use WirecardCheckoutApiClient\Exception\ExceptionInterface;
use Zend\Http\Request;

/**
 * Class ShippingProfileResourceService
 * @package WirecardCheckoutApiClient\Service\MasterPass
 */
class ShippingProfileResourceService extends AbstractResourceService
{
    /**
     * @param Collection $collection
     * @return Collection
     * @throws ExceptionInterface
     */
    public function getList(Collection $collection)
    {
        $replacements = Array(
            self::REPLACEMENT_MERCHANT_ID => $this->clientId,
        );
        $clientOptions = Array(
            self::OPTIONS_METHOD => Request::METHOD_GET,
            self::OPTIONS_REQUEST_URI => $this->getRequestUri($replacements),
            self::OPTIONS_ACCESS_TOKEN => $this->getAccessToken(),
        );
        $httpClient = $this->getPreparedHttpClient($clientOptions);
        $response = $this->sendRequest($httpClient);
        $collection = $collection->addItems($response);
        return $collection;
    }
}
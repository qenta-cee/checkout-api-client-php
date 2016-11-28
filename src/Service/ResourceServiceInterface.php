<?php
namespace WirecardCheckoutApiClient\Service;

use WirecardCheckoutApiClient\Entity\Collection;
use WirecardCheckoutApiClient\Entity\EntityInterface;
use Zend\Http\Client;
use Zend\Stdlib\Hydrator\HydratorAwareInterface;

interface ResourceServiceInterface extends HydratorAwareInterface, HttpServiceInterface
{
    const OPTIONS_ACCESS_TOKEN = 'accessToken';

    const REPLACEMENT_ID = '{resource_id}';

    const REPLACEMENT_MERCHANT_ID = '{merchant_id}';

    /**
     * @param OAuth2Service $oAuth2Service
     * @return ResourceServiceInterface
     */
    public function setOAuth2Service(OAuth2Service $oAuth2Service);

    /**
     * @return OAuth2Service
     */
    public function getOAuth2Service();

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @return ResourceServiceInterface
     */
    public function setAuthenticationCredentials($clientId, $clientSecret);

    /**
     * call endpoint POST to create a new Resource instance
     *
     * @param EntityInterface $entity
     * @return EntityInterface
     */
    public function create(EntityInterface $entity);

    /**
     * call endpoint GET to get a collection of Resources
     *
     * @param Collection $collection
     * @return mixed
     */
    public function getList(Collection $collection);

    /**
     * call resource endpoint GET to get the given Resource instances latest data
     *
     * @param EntityInterface $entity
     * @return mixed
     */
    public function get(EntityInterface $entity);

    /**
     * call resource endpoint DELETE to remove the given Resource
     *
     * @param EntityInterface $entity
     * @return mixed
     */
    public function delete(EntityInterface $entity);
}

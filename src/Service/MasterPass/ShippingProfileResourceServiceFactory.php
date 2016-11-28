<?php
namespace WirecardCheckoutApiClient\Service\MasterPass;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use WirecardCheckoutApiClient\Service\OAuth2Service;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Http\Client;

/**
 * Class ShippingProfileResourceServiceFactory
 * @package WirecardCheckoutApiClient\Service\MasterPass
 */
class ShippingProfileResourceServiceFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     * @throws ServiceNotFoundException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var $oAuth2Service OAuth2Service
         */
        $oAuth2Service = $serviceLocator->get('WirecardCheckoutApiClient\\Service\\OAuth2Service');
        /**
         * @var $httpClient Client
         */
        $httpClient = $serviceLocator->get('WirecardCheckoutApiClient\\Http\\Client');
        $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\ShippingProfileHydrator');
        /**
         * @var $config mixed[]
         */
        $config = $serviceLocator->get('Config');
        $baseUri = $config['rest_api']['base_uri'];

        $resourceService = new ShippingProfileResourceService($oAuth2Service, $httpClient, $hydrator);
        $resourceService->setRequestUri(sprintf('%s/masterpass/merchants/%s/shipping-profiles', $baseUri, ShippingProfileResourceService::REPLACEMENT_MERCHANT_ID));
        return $resourceService;
    }

}
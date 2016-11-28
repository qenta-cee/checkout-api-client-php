<?php
namespace WirecardCheckoutApiClient\Service\MasterPass;

use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class WalletResourceServiceFactory
 * @package WirecardCheckoutApiClient\Service\MasterPass
 */
class WalletResourceServiceFactory implements FactoryInterface
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
        $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\WalletHydrator');
        /**
         * @var $config mixed[]
         */
        $config = $serviceLocator->get('Config');
        $baseUri = $config['rest_api']['base_uri'];

        $resourceService = new WalletResourceService($oAuth2Service, $httpClient, $hydrator);
        $resourceService->setRequestUri(sprintf('%s/masterpass/merchants/%s/wallets/%s', $baseUri, WalletResourceService::REPLACEMENT_MERCHANT_ID, WalletResourceService::REPLACEMENT_ID));

        return $resourceService;
    }

}
<?php

namespace WirecardCheckoutApiClient\Service\MasterPass;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PaymentResourceServiceFactory implements FactoryInterface
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
        $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\PaymentHydrator');
        /**
         * @var $config mixed[]
         */
        $config = $serviceLocator->get('Config');
        $baseUri = $config['rest_api']['base_uri'];

        $resourceService = new PaymentResourceService($oAuth2Service, $httpClient, $hydrator);
        $resourceService->setRequestUri(sprintf('%s/masterpass/merchants/%s/wallets/%s/payment', $baseUri, PaymentResourceService::REPLACEMENT_MERCHANT_ID, PaymentResourceService::REPLACEMENT_ID));
        
        return $resourceService;
    }

}
